<template>
<div class="column" v-if="loading">
   <div class="has-text-centered">
   <img src="/images/colorful-loader-gif-transparent-13.gif" alt="Loading..">
    </div>
</div>
<div class="column" v-else>
   <div class="columns is-multiline" v-if="posts.length > 0">
      <!-- Post Loop -->
		
      <router-link  :to="`/post/`+post.slug" class="column is-6 single-post is-one-third-desktop" v-for="post in posts" :key="post.id">
         <Post :post="post"></Post>
      </router-link>
		

      <!-- Post Loop Ends Here -->

									
   </div>
	  <h2 class="nothing_found title has-text-centered" v-else>Nothing Found! :(</h2>
	</div>
</template>
<script>
import Axios from 'axios';
import config from '../config';
import Post from '../components/Post.vue'

export default {
	mounted() {
		this.getPosts()
	},
	components: {
		Post,
	},
	data() {
		return {
			posts: [],
			loading: true
		}
	},
	methods: {
		getPosts() {		
			Axios.get(`${config.apiUrl}/search/${this.$route.params.request}`).then(response => {
				this.loading = false;
				this.posts = response.data;
			})
		}
}
}
</script>