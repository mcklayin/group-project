<!DOCTYPE html>
<html lang="en">
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
    
            <!--<link href="{{ asset('css/site.css') }}" rel="stylesheet"> -->
            <script src="{{ asset('js/site.js') }}"></script>
            <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
            <link href="{{ asset('css/style.css') }}" rel="stylesheet">
            <script src="{{ asset('js/summernote.min.js') }}"></script>
            
    
        @yield('styles')
    
        <link rel="shortcut icon" href="{!! asset('favicon.png')  !!} ">
    </head>
    <body style="height:100%;">
            <?php /* ?>
            <!--@include('partials.nav')-->
            <?php */ ?>    
            <div ng-app="app"  ng-controller="MainCtrl as MCtrl" >
                <div class="hide" ng-init="token = '{{ csrf_token()}}'"></div> 
                <navigation></navigation>
                <div ui-view></div>
                <?php /* ?>
                    @yield('content')
                <?php */ ?>        
                
                <?php /* ?>
                    @include('partials.footer')
                <?php */ ?>    
            </div>
            
         
    
    <!-- Scripts -->
   
    @yield('scripts')
       <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
