<!DOCTYPE html>
<html lang="en" ng-app="app">
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
        
            @include('partials.nav')
            
            <md-toolbar md-scroll-shrink ng-if="true" class="md-whiteframe-z1">
                <div class="md-toolbar-tools">
                    <h3>
                        <md-icon md-svg-src="img/icons/bookshelf.svg" style="width:36px;height:36px; margin:0 10px"></md-icon>
                        <span style="color:#fff">Group Share</span>
                    </h3>
                </div>
            </md-toolbar>
            <md-content flex layout-padding>
                @yield('content')
            </md-content>
            @include('partials.footer')
         
    
    <!-- Scripts -->
   
    @yield('scripts')
        <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    </body>
</html>
