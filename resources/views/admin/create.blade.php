@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
               <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="input-group input-group-sm mb-3">
                     <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">title</span>
                     </div>
                     <input name="title" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <div class="input-group input-group-sm mb-3">
                     <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">post_image</span>
                     </div>
                     <input name="image" type="file" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Category</label>
                     </div>
                     <select class="custom-select" id="inputGroupSelect01" name="category">
                        @foreach($Categories as $category):
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach                
                     </select>
                  </div>
                  <div class="form-group">
                     <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
                  </div>
                  <div class="input-group input-group-sm mb-3">
                     <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">tags</span>
                     </div>
                     <input name="tags" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <button type="submit" class="btn btn-info">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection