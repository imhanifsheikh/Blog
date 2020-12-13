<template>
    <div>
    <Head></Head>
    <Navbar></Navbar>
      <router-view :key="$route.fullPath"></router-view>
      <Footer></Footer>
    </div>
</template>

<script>


    import Head from './Head.vue'
    import Navbar from './Navbar.vue'
    import Footer from './Footer.vue'

    export default {
        name: 'app',
        components:{
            Head,
            Navbar,
            Footer,
        },  
    }

    // jQuery Code for ToggleClass
    $(document).ready(function() {
            $(".navbar-burger").click(function() {
                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");
            });
            $(".is-togglable").click(function() {
                $(this).toggleClass("is-active");                
            });

        
    });

</script>

