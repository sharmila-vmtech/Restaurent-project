<!doctype HTML>

<html>

<head>

 <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include("layout.libraries2")

    <title>Admin Panel</title>

    @section('meta_keywords')

        <meta name="keywords" content="your, awesome, keywords, here"/>

    @show @section('meta_author')

        <meta name="author" content=""/>

    @show @section('meta_description')

        <meta name="description" content=""/>

    @show

    

</head>

<!-- <title>Address Book</title> -->

<body class="hold-transition skin-blue sidebar-mini">




	

<div class="wrapper">

		@yield("content")

	</div>



</html>

