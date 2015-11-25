<!DOCTYPE html>
<html lang="en" ng-app="app"  ng-controller="MainCtrl as MCtrl" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width">
    
        <title>@section('title') @show</title>
        @section('meta_keywords')
            <meta name="keywords" content="your, awesome, keywords, here"/>
        @show @section('meta_author')
            <meta name="author" content="Jon Doe"/>
        @show @section('meta_description')
            <meta name="description"
                  content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
        @show
        <meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
         <?php /* ?>
            @yield('styles')
            <!--<link href="{{ asset('css/site.css') }}" rel="stylesheet"> -->
            <script src="{{ asset('js/site.js') }}"></script>
            <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
            <script src="{{ asset('js/summernote.min.js') }}"></script>
         <?php */ ?>    
        
         <link href="{{ asset('css/style.css') }}" rel="stylesheet">
         <link rel="shortcut icon" href="{!! asset('favicon.png')  !!} ">
    </head>
    <body style="height:100%;"> 
        <div class="hide" ng-init="token = '{{ csrf_token()}}'"></div> 
        <navigation></navigation>
        <div ui-view id="main"></div>
        <script src="{{ asset('js/app.js') }}"></script>
        
        <?php /* ?>
            <!--@include('partials.nav')-->
            @yield('content')
            @include('partials.footer')
            @yield('scripts')
        <?php */ ?>        
    </body>
</html>
