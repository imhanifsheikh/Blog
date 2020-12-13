<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

<meta property="og:title" content="Hanif's Blog | A Blog App Where Hanif Posts.">
<meta property="og:description" content="Hello, I am Hanif. I am a web developer. This is a non profitable blog application build with Laravel and Vue.js.">
<meta property="og:image" content="http://hanifblog.tk/images/logo.png">
<meta property="og:url" content="http://hanifblog.tk/">
<meta property="og:site_name" content="Hanif's Blog | A Blog App Where Hanif Posts.">

<meta name="twitter:title" content="Hanif's Blog | A Blog App Where Hanif Posts.">
<meta name="twitter:description" content="Hello, I am Hanif. I am a web developer. This is a non profitable blog application build with Laravel and Vue.js.">
<meta name="twitter:image" content="http://hanifblog.tk/images/logo.png">
<meta name="twitter:card" content="summary_large_image">

        <title>Hanif's Blog | A Blog App Where Hanif Posts.</title>


<link rel="icon" type="image/png" href="/images/logo.png" />
        <link rel="stylesheet" href="css/vendor/fontawesome/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('css/app.css')}}">		
        </head>
<body>


<style>
    

    html, body {
    background: #fafafa;
    font-family:  "Kohinoor Bangla", sans-serif;
}

*:focus{
    outline: none;
    -webkit-box-shadow: none;
  box-shadow: none;
}
 
section.hero {
    height: 60px;
    background: linear-gradient(45deg, #00c7d1 25%, #00d1b2 75%);
}
.hero-body {
    padding: 0.8rem;
}
.hero-body h1.title {
 font-family: 'Great Vibes';
 font-weight: 300;
}
section.nav {
    background: linear-gradient(#252525 30%,#363535 80%);
    box-shadow: 0px 5px 14px rgba(0, 0, 0, 0.22);
}
section.post {
    margin-bottom:15px;
}
.navbar{
    background: transparent;
}
input.search{
    border-radius: 2rem;
    border: 1px solid #1d1d1d;
    box-shadow: inset 0 0 10px #2a2929;
    background: #282828;
    width: 100%;
    font-size: 14px;
        font-family: Kohinoor Bangla;
}
input.input.search.has-text-white::placeholder {
    color: #9e9e9e; 
    font-size: 14px;
}
.navbar-item .field {
    margin-top: 5px;
}
a.navbar-item i {
    margin-top: -5px;
}
.input.is-active, .input.is-focused, .input:active, .input:focus, .textarea.is-active, .textarea.is-focused, .textarea:active, .textarea:focus, input.search:hover, input.search:focus{
    border-color: #3a3a3a;
    box-shadow: inset 0px 0px 3px rgba(0,0,0,0.4);
}
input.search .icon {
    font-size: 14px;
}

section.nav{
    position: relative;
    border-bottom: 2px solid #262626;
}
.post-gradient-bg {
    padding: 2rem 2rem 2rem 2rem;
    background:#ffffff;
    margin: 0 auto;
    border: 1px dashed #e1e1e1;
    border-top: none;
    border-bottom-left-radius: 1rem;
    border-bottom-right-radius: 1rem;
    box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
}
.post-title {
 text-align: center;
 font-size: 0.9rem;
 color: #4b4b4b;
}
.card-content {
    padding-top: 1rem;
    padding-bottom: 1rem;
    background: #ffffff;
   
}
.card-image p{
    background: rgba(0, 0, 0, 0.4);
    color: #00d1b2;
    position: relative;
    font-size: 12px;
    margin-top: -28px;
    padding: 5px;
    width: 100%;
    overflow: hidden;
}
.control.has-icons-left .icon {
 height: 2em;
}
.card-image p .time{
    color: #ffffff;
}

.navbar-end .navbar-item {
    display: block;
}
.navbar-item, .navbar-link{
    background: transparent;
    font-size: 14px;
    color: white;
}

.image.is-5by3 img{
    position: relative;
}
.image.is-5by3 {
    padding-top: 0;
}
a.navbar-item{
    transition: all 0.3s ease-in-out;
}
a.navbar-item:hover{
    background: transparent;
    color: #eee;
    text-shadow: 0 0px 10px white;
}
a.navbar-item i {
    margin-left: 5px;
}
.single-post .post-thumb-card {

box-shadow: 8px 14px 38px rgba(39,44,49,.06), 1px 3px 8px rgba(39,44,49,.03);
border:1px solid rgba(0,0,0,0.04);
transition: all 0.2s ease-in-out;
border-radius: 5px;
overflow:hidden;
}
.single-post .post-thumb-card:hover {
 box-shadow: 0 0 1px rgba(39,44,49,.1), 0 3px 16px rgba(39,44,49,.07);
 cursor: pointer;

}

.navbar-dropdown {
    background: linear-gradient(45deg, rgba(0,199,209,0.85) 30%,rgba(0,209,178,0.5) 80%);
    box-shadow: 0px 5px 14px rgba(0, 0, 0, 0.22);
    margin-top:2px;

}
.navbar-dropdown .navbar-item{
  
    width: 100%;
    display:block;
    border-bottom: 1px solid rgba(255,255,255,0.1)
}

.navbar-dropdown a.navbar-item:hover{
        background: linear-gradient(45deg, rgba(255,255,255,0.3) 25%, rgba(0,0,0,0.0) 75%);
        color: white;

    }

    @media screen and (max-width: 550px){
.post-gradient-bg {
    padding: 2rem 0rem;
    }

}
@media screen and (min-width: 1088px)
{

    .navbar-end .navbar-item {
        width: 30rem;
    }
    .navbar-dropdown {
    border-top: none;
    width: 15rem;

    }


}


@media screen and (max-width: 1087px)
{
.navbar-item{
    display: inline;
}
.navbar-dropdown .navbar-item{
    border-bottom: 1px solid rgba(255,255,255,0.1);
}
    .navbar-menu {
        background: linear-gradient(45deg, rgba(0,199,209,0.85) 30%,rgba(0,199,209,0.5) 80%);
    }
    .navbar-dropdown{
        background: linear-gradient(45deg, rgba(0,199,209,0.85) 30%,rgba(0,199,209,0.5) 80%);
        display: none;
    }
    .is-active > .navbar-dropdown{
        display: block;
        position:relative;
        top:10px;
    }
}
.footer{
    background: none;
    padding: 1rem;   
}
.footer p, .footer a, .footer i{
    font-size: 12px;
}
.footer a{
    color: #4b4b4b;

}
.footer i{
    color: red;
    margin-left: 2px;
}

img[alt="www.000webhost.com"]{
    display: none;
}
a.category_item {
    display:inline-block;
}
.navbar-burger {
    color: #00d1b2; 
}
.navbar-burger:hover > span{
    transition: all 0.3s ease-in-out
}
.navbar-burger:hover > span {

    color: #00c7d1;
    box-shadow: 0 0 10px #00c7d1;
}
.post-title::after {
    background: linear-gradient(45deg, rgba(255,255,255,0.0) 20%, rgba(255,255,255,1) 75%);
    height: 18px;
    display: inline-block;
    width: 3rem;
    margin-left: -2.5rem;
    position: absolute;
    content: '';
    margin-top: 1px;
    transition: 0.3s all ease-in-out;
 }

figure.image.is-4by3 img {
    object-fit: cover;
}


section.page_navigation a.button i{
 margin-right: 5px;
}


h2.nothing_found.title.has-text-centered {
    padding: 50px;
    color: #a2a2a2;
    text-shadow: 0px 0px 18px rgba(0,0,0,0.13);
}

.post-thumb-card .card-content{
    text-align: center;
}
.pagination {
    justify-content:center;
}

p.tags i.fas, .post-tags i.fas {
    margin-right: 5px;
    margin-left:5px;
}

p.tags i.fas{
    font-size:10px;
}


.card:hover > .card-content .post-title::after{
	margin-left:0;
}
.button.is-dark {
    background: linear-gradient(45deg, #00c7d1 25%, #00d1b2 75%);
}
</style>

<div id="app">
    {{-- code will inject here --}}
<app></app>

</div>

<script src="{{asset('js/app.js')}}"></script>
    </body>

</html>
