<!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('title') Laravel 5 Sample Site @show</title>
    @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here"/>
    @show @section('meta_author')
        <meta name="author" content="Jon Doe"/>
    @show @section('meta_description')
        <meta name="description"
              content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
    @show
    <meta name="csrf-token" content="<?php echo csrf_token() ?>"/>

		<link href="{{ asset('css/site.css') }}" rel="stylesheet">
        <script src="{{ asset('js/site.js') }}"></script>
        <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
        <script src="{{ asset('js/summernote.min.js') }}"></script>

    @yield('styles')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="{!! asset('favicon.ico')  !!} ">
</head>
<body style="height:100%;">
<div id="wrapper" style="min-height:100%;position:relative;">
@include('partials.nav')

<div class="container"  style="min-height: 100%;padding-bottom: 90px;">
@yield('content')
</div>
@include('partials.footer')
</div>

<!-- Scripts -->
<script>

$(function () {
            $('textarea').summernote({height: 250});
});
</script>
@yield('scripts')

</body>
</html>
