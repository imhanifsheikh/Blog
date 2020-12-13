<template>
			<section class="post">
			<div class="container">
				<div class="columns post-gradient-bg">
					<router-view></router-view>
				</div>
			</div>
		</section>
</template>
<script>

		import Axios from 'axios';
		import config from '../config';
		import Post from '../components/Post.vue'
		import SinglePostComponent from '../components/SinglePostComponent.vue'

	export default {
		name: "Homepage",		
	}
</script>