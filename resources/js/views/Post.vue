<template>
<section class="post">
   <div class="container">
      <div v-if="!loading" class="post_head" :style="{ backgroundImage: 'url(' + post.image + ')' }">
         <div class="post_head_content">
            <p class="subtitle post-tags is-6 has-text-centered" v-html="refine_tags()"></p>
            <h1 class="post_title title has-text-centered" v-html="post.title"></h1>
          </div>
      </div>
      <div class="columns post-gradient-bg">
		<div class="column" v-if="loading">
			<div class="has-text-centered" >
		  <img src="/images/colorful-loader-gif-transparent-13.gif" alt="Loading..">
    </div>

		</div>
         <div class="column" v-else>
            <div class="post_content content">
               <p v-html="post.content">							
               </p>
            </div>
            <section class="page_navigation">
                <div class="columns">
               <div class="column has-text-centered">
                <router-link :to="`/`" class="button is-dark"> <i class="fas fa-home"></i>  Go To Home</router-link>
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

	export default {
		mounted(){
			this.getPost();			
		},
		data(){
			return {
			post:{},
			loading:true
		}
		},
		methods:{
		getPost() {
		Axios.get(`${config.apiUrl}/post/${this.$route.params.slug}`)
			.then(({data}) => {
				this.loading = false;
				this.post = data[0];
			})
      .catch(error => {
        console.log(error.response.data)

      })
    },
    	refine_tags() {
		return this.post.tags.replace(/#/g, `<i class="fas fa-tags"></i>`)
		}
	}
}
</script>

<style scoped="true">
.post_head {
    background-size: cover!important;
    background-position: 50%!important;
}
.post_head_content {
  background:  linear-gradient(45deg, rgba(0,0,0,0.8) 49%, rgba(0,0,0,0.8) 50%, rgba(0,0,0,0.8) 90%);
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
    font-family:  "Kohinoor Bangla", sans-serif;
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
	font-family: "Kohinoor Bangla", sans-serif;
}

 @media screen and (max-width: 550px){
  .post_content{
    font-size: 14px;
}
}

</style>