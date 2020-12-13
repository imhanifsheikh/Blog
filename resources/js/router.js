import Vue from 'vue'
import VueRouter from 'vue-router'

import Homepage from './views/Homepage.vue'
import Post from './views/Post.vue'
import Category from './views/Category.vue'
import SinglePostComponent from './components/SinglePostComponent.vue'
import Search from './components/Search.vue'

Vue.use(VueRouter)


const router = new VueRouter({	
	routes:[
	{
		path: '/',
		component: Homepage,
		children: [
			{
				path: '/',
				component: SinglePostComponent,
			},
			{
				path: '/search/:request',
				component: Search,
			}
		]
	},
	{
		path: '/post/:slug',
		component: Post
	},
	{
		path: '/category/:slug',
		component: Category
	}

	]
})

export default router;