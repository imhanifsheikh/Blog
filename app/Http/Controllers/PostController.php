<?php
namespace App\Http\Controllers;
use App\Post;
use App\Category;
use DB;
use Ausi\SlugGenerator\SlugGenerator;
use Illuminate\Http\Request;
class PostController extends Controller
{

    public function __construct(){
        /**the authentication middleware here applies to all functions but
         viewForums() and viewForumDetails() and the opposite of this happens
         when you use only()
         */
          $this->middleware('auth')->except(['index', 'show', 'similar', 'search']);
      }
  
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {      
        return Post::latest()->paginate(15, ['title','image','created_at','slug', 'tags']);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
    //
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
    //
    $post = new Post;
    $generator = new SlugGenerator;
        $this->validate($request, [
        'content' => 'required',
        ]);
        $photo_validate = $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    if ($photo_validate) {        
        $post_image =  $request->file('image');
        $new_name = rand(). '.'.$post_image->getClientOriginalExtension();
        $post_image->move(public_path("/upload"), $new_name);
        $post->image = '/upload/'.$new_name;
    }
    else  {
        $post->image = "/upload/default_post.png";
    }

        $content=$request->input('content');

        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml('<?xml encoding="UTF-8">'.$content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
        libxml_use_internal_errors(false);
        $images = $dom->getElementsByTagName('img');  

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');    
            if(strpos($data, 'base64,') !== false ){    
                    
                list($type, $data) = explode(';', $data.';');
                list(, $data) = explode(',', $data.',');
                

                $data = base64_decode($data);         

                $image_name= '/upload/' . time().$k.'.jpg';
                $path = public_path() . $image_name;

                file_put_contents($path, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }        

        

        $content = $dom->saveHTML();
       
        $post->title = $request->title;
        $post->slug = $generator->generate($request->title, ['locale' => 'en_US']).'-'.str_random(10).time();
        $post->content = $content;
        $post->tags = $request->tags;
        $post->save();
        $post = Post::find($post->id)->categories()->sync($request->category);
        return redirect('/admin');
    }



    /**
    * Display the specified resource.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function show(Post $post, $slug)
    {
        //
        $posts = Post::where('slug', $slug)->get();
        return $posts;
    }
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function edit(Post $post)
    {
    //
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Post $post)
    {
    //
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function destroy(Post $post)
    {
    //
    }
    public function similar($category_id, $post_id){
        $posts = DB::table('post_category')
        ->join('posts', 'post_category.post_id', '=', 'posts.id')
        ->where('post_category.category_id', '=', $category_id)
        ->where('post_category.post_id' , '!=' , $post_id)
        ->paginate(6);
        return $posts;
    }
    public function search($request){
        $posts = Post::where('title', 'like', '%'. $request. '%')
        ->orWhere('tags', 'like', '%'. $request. '%')
        ->orderBy('created_at', 'DESC')
        ->get();
        return $posts;
        }
}
