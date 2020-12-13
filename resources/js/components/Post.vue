<template>
<div class="card post-thumb-card"  >
	<div class="card-image">
		<figure class="image is-5by3">
			<img :src="post.image" :alt="post.image">
		</figure>
		<p class="has-text-centered">
			<i class="far fa-clock"></i> <time class="time">{{moment(post.created_at).format('LLLL')}}</time>
		</p>
	</div>
	<div class="card-content">			
		<p class="tags" v-html="refine_tags()"></p>
		<div class="content post-title" v-html="title">
	</div>
	</div>
</div>
						
</template>

<script>
	var moment = require('moment');
export default {
	mounted(){
		
		this.refine_title();
	},
	props:['post'],
	data() {
		return {
			moment:moment,
			title:''
		}
	},
	methods:{
		refine_tags() {
		let post =	this.$props.post ;
		return post.tags.replace(/#/g, `<i class="fas fa-tags"></i>`)
		},
	
		refine_title() {
		let post =	this.$props.post ;
		this.title = post.title.replace(/\s*$/,'').substring(0,50);
		},

		title_mouseover(){
			let post =	this.$props.post ;
			this.title = post.title.replace(/\s*$/,'');
		}
	}

}

</script>

<style scoped="true">
	p.tags{
    font-size: 12px;
    background: #ffffff;
    margin: 0;
	position:relative;
    text-align: center;
    color: #868484;
    display: block;
}

.card-image {
	overflow: hidden
}

.card-image img{
	transition: all ease-in-out 0.5s;
	transform: scale(1)
}
.card:hover > .card-image img{
	transform: scale(1.2)
}
.card-content{
	overflow: hidden
}
.card:hover > .card-content .post-title{
	color:#000000;
}

.card-content .post-title{
	transition: all 0.3s ease-in-out;
}





</style>