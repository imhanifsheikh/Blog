<template>
<section class="post">
<div class="container">
   <div class="columns post-gradient-bg">
  <div class="column" v-if="loading">
      <div class="has-text-centered">
  <img src="/images/colorful-loader-gif-transparent-13.gif" alt="Loading..">
    </div>
    </div>
      <div class="column" v-else>     
          <h2 class="nothing_found title has-text-centered" v-if="!posts.data.length">Nothing Found! :(</h2>
<div v-else>
           <div class="subtitle is-6 has-text-muted has-text-centered">
          Showing Posts from <b>{{getCategory[0]}}</b>.
          </div>
         <div class="columns is-multiline">
           <!-- Post Loop -->
            <router-link :to="`/post/`+post.slug" class="column is-4 single-post is-half-tablet is-one-third-desktop" v-for="post in posts.data" :key="post.id">
               <Post :post="post"></Post>
            </router-link>
            <!-- Post Loop Ends Here -->              
         </div>
</div>
         <section class="page_navigation">
            <div class="columns">
               <div class="column has-text-centered">
                  <router-link :to="`/`" class="button is-dark"> <i class="fas fa-home"></i> Back To Home</router-link>
               </div>
            </div>
         </section>
      </div>
   </div>
</div>
</section>
</template>
<script>

		import Axios from 'axios';
		import config from '../config';
	import Post from '../components/Post.vue';

	export default {

    mounted(){
      this.getPost();     
    },
		data(){
			return {
      posts:{},
     getCategory:'',
      loading:true
		}
		},
    components: {
    Post,
  },
		methods:{
		getPost() {
		Axios.get(`${config.apiUrl}/category/${this.$route.params.slug}`)
			.then((response) => {
				this.loading = false;
				this.posts = response.data.data;
				this.getCategory = response.data.getCategory;
			})
      .catch(error => {
        console.log(error.response.data)
      })
		},
	}
}
</script>

<style scoped="true">
.post_head {
    background-size: cover!important;
    background-position: 50%!important;
}
.post_head_content {
  background:  linear-gradient(45deg, rgba(0,0,0,0.8) 49%, rgba(0,0,0,0.1) 50%, rgba(0,0,0,0.6) 90%);
    padding:100px 40px;
}
.post_head_content h1.post_title {
    font-weight: 700;
    font-size: 35px;
    margin-bottom: 0;
    color: #fff;
    line-height: 50px;
}
.post_content{
    font-size: 18px;
    line-height: 30px;
}
.post_content img {
    box-shadow: 0px 5px 9px rgba(0,0,0,0.3);
    border-radius: 3px;
    border: 1px solid #e1e1e1;
    transition: 0.2s ease-in all;   
    margin: 10px;

}
.post_content img:hover {
    box-shadow: 0px 2px 5px rgba(0,0,0,0.2);
    opacity: 0.8;
}

.post_head_content p.post-tags{
    color: #f4a238;
}
.post_title {
	font-family: 'Kohinoor WOO'
}


</style>