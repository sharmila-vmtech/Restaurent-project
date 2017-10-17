<!doctype HTML>

<html>

<head>

 <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include("admin_layout.libraries")

     <title>Namma Krishnagiri - @yield('title')</title>

    @section('meta_keywords')

        <meta name="keywords" content="your, awesome, keywords, here"/>

    @show @section('meta_author')

        <meta name="author" content="Sathya Moorthy"/>

    @show @section('meta_description')

        <meta name="description" content=""/>

    @show

    
    
</head>

<!-- <title>Address Book</title> -->

<body>
@include('admin_layout.homenav')
<?php if(Request::segment(1) == '/' OR Request::segment(1) == '/home') { ?>
@include('admin_layout.homebanner')
<?php  } else { ?>
<br><br><br>
   <?php }?>
		@yield("content")
</body>
</html>

