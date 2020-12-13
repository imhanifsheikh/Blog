<template>
			
		<section class="nav">
			<div class="container">
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
   <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <router-link :to="`/`" class="navbar-item">
        Home
      </router-link>     

      <div class="navbar-item is-togglable">
        <a class="navbar-item">
          Categories
         <i class="fas fa-sort-down"></i>
        </a>

        <div class="navbar-dropdown">
          <router-link :to="`/category/`+category.slug" class="navbar-item category_item" v-for="category in categories" :key="category.id">
            {{category.name}} {{category.posts.length != 0 ? '('+ categoryCount(category.posts.length) + 'টি)':''}}
          </router-link>  
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
       <div class="field">
		<p class="control has-icons-left">
			<input class="input search has-text-white" @keyup.enter="searchit" v-model="search" type="text" placeholder="Search">
			<span class="icon is-small is-left">
				<i class="fas fa-search"></i>
			</span>
		</p>
	</div>
      </div>
    </div>
  </div>
</nav>
</div>
		</section>
</template>

<script>
import Axios from 'axios';
import config from '../config';

export default {
  mounted() {
    this.getCategories()
  },
  data() {
    return {
      categories: {},
      search:'',
    }
  },
  methods: {
    getCategories() {
      Axios.get(`${config.apiUrl}/getCategories/`).then(response => {      
        this.categories = response.data;
      })
    },
    searchit(){
      const check = this.search.trim().length;
      if( check >= 3 ){
  Fire.$emit('searching', this.search);
        this.$router.push('/search/'+this.search)
      }     
    },
    categoryCount(param){
      let string = param.toString();
      return string.replace(/0|1|2|3|4|5|6|7|8|9/g, function (x) {
   
   switch (x) {
  case '0':
    return "০";
    break;
  case '1':
    return "১";
    break;
  case '2':
     return "২";
    break;
  case '3':
     return "৩";
    break;
  case '4':
     return "৪";
    break;
  case '5':
     return "৫";
    break;
  case '6':
     return "৬";
    break;
  case '7':
     return "৭";
    break;
  case '8':
     return "৮";
    break;
  case '9':
     return "৯";
    break;
   
   }
    });
}
}
}
</script>