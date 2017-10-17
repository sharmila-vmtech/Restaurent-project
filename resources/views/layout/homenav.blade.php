
<link rel="stylesheet" href="{{ asset('public/navbar/css/scrolling-nav.css') }}">

<script type="text/javascript" src="{{ asset('public/navbar/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/navbar/js/jquery.easing.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/navbar/js/scrolling-nav.js') }}"></script>
<!-- Bootstrap Core CSS -->
    <link href="{{ asset('public/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
<style type="text/css">
  @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
body {
  font-family: 'Open Sans', 'sans-serif';
}
.row
{
    margin-right: 0px;
    margin-left: 0px;
}
.mega-dropdown {
  position: static !important;
}
.mega-dropdown-menu {
    padding: 20px 0px;
    width: 100%;
    box-shadow: none;
    -webkit-box-shadow: none;
}
.mega-dropdown-menu > li > ul {
  padding: 0;
  margin: 0;
}
.mega-dropdown-menu > li > ul > li {
  list-style: none;
}
.mega-dropdown-menu > li > ul > li > a {
  display: block;
  color: #222;
  padding: 3px 5px;
}
.mega-dropdown-menu > li ul > li > a:hover,
.mega-dropdown-menu > li ul > li > a:focus {
  text-decoration: none;
  /*color: black;
  background-color: white;*/
}
.mega-dropdown-menu .dropdown-header {
  font-size: 18px;
  color: #ff3546;
  padding: 5px 60px 5px 5px;
  line-height: 30px;
}
/*.navbar-inverse {
    background-color: #F7892A;
    border-bottom: 2px solid #ff;
}
.color {
    color: #fff !important;
    font-size: 18px;
    font-family: initial;
}
.navbar-inverse .navbar-nav > li > a {
    color: #fbe9e9 !important;
}*/

.navbar-inverse .navbar-nav > li > a {
    color: #000;
    font-size: 14px;
    font-family: initial;
    font-weight: 300;
    padding: 22px 26px 13px 0px;
}
.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
    color: #cb2926;
    background-color: transparent;
}
.dropdown-menu > li > a {
    display: block;
    padding: 5px 20px;
    clear: both;
    font-weight: normal;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
    font-size: 14px;
}
.navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus {
    color: #000;
    background-color: #fff;
}
.navbar-inverse {
    background-color: #FFF;
    border-color: #080808;
}
.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
    color: #db1616;
    background-color: transparent;
}
</style>


<div class="row">
  <nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="" href="/"><img class="img-responsive" src="/public/images/logo/50.jpg" alt="" style="padding: 0px 0px 0px 7px;" ></a>
  </div>
  
  <div class="collapse navbar-collapse js-navbar-collapse">
    <ul class="nav navbar-nav clr">
             <li><a href="/">Home</a></li>
             <li><a href="/about_us">About Us</a></li> 
            <li class="dropdown mega-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <span class="caret"></span></a>       
        <ul class="dropdown-menu mega-dropdown-menu">
        
       <?php
        $cat=get_category_nav();
        foreach ($cat as $key => $value) { ?>
        <li class="col-md-3 col-xs-12" style="float:left;display: block"><a href="/category/{{$value->cat_name}}">{{$value->cat_name}}</a></li>
                            
        <?php } ?>
        </ul>       
      </li>
            
    </ul>
        <ul class="nav navbar-nav navbar-right " style="margin-right: 10px">
        <!-- Authentication Links -->
        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/check_user') }}">Register</a></li>
        @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          @if(Auth::user()->id == 1)
          <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-user"></i>&nbsp;&nbsp;My Admin</a></li>
          @endif
            <li><a href="{{ url('/userprofile') }}"><i class="fa fa-btn fa-user"></i>&nbsp;&nbsp;My Profile</a></li>
            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
          </ul>
        </li>
@endif
      </ul>
  </div><!-- /.nav-collapse -->
  </nav>
</div>


<script type="text/javascript">
  
  $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});
</script>


<?php 
function get_category_nav(){
    $shop_count=\DB::table('category')->Orderby('cat_name','asc')->get();
    return $shop_count;
}

?>