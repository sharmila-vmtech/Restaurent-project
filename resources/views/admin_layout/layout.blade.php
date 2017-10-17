<!doctype HTML>

<html>

<head>

 <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include("admin_layout.libraries2")

    <title>Admin Panel</title>

    @section('meta_keywords')

        <meta name="keywords" content="your, awesome, keywords, here"/>

    @show @section('meta_author')

        <meta name="author" content="Sathya Moorthy"/>

    @show @section('meta_description')

        <meta name="description" content=""/>

    @show

    

</head>

<!-- <title>Address Book</title> -->

<body class="hold-transition skin-blue sidebar-mini">



@include("admin_layout.navheader")

@include("admin_layout.sidenav")

	

<div class="wrapper">

		@yield("content")

	</div>



@include("admin_layout.footer")

</html>

