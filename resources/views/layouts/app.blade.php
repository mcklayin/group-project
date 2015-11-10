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
            <div ng-app="app.sup"  ng-controller="MainCtrl as MCtrl" >
                <div class="hide" ng-init="token = '{{ csrf_token()}}'"></div> 
                token: <%token%>
                <md-sidenav layout="column" class="md-sidenav-left md-whiteframe-z2" md-component-id="leftSlider">
                    <md-toolbar class="md-theme-light">
                         <h1 class="md-toolbar-tools">Навігація</h1>
                    </md-toolbar>
                    <md-button ui-sref="login" class="md-primary" ng-click="MCtrl.closeSlider('leftSlider')">Вхід</md-button>
                    <md-button ui-sref="register" class="md-primary" ng-click="MCtrl.closeSlider('leftSlider')">Реєстрація</md-button>
                    <md-button ui-sref="contacts" class="md-primary" ng-click="MCtrl.closeSlider('leftSlider')">Контакти</md-button>
                </md-sidenav>
                <md-toolbar md-scroll-shrink class="md-whiteframe-z1">
                    <h2 class="md-toolbar-tools">
                        <md-icon md-svg-src="img/icons/bookshelf.svg" style="width:35px;height:35px; margin-right:10px"></md-icon>
                        <span flex ui-sref="index" style="color:#fff; cursor:pointer">Group Share</span>
                        <div layout="row" layout-align="center center " class="hide-sm">
                            <md-button aria-label="comment" class="md-icon-button" ui-sref="contacts">
                                <md-tooltip md-direction="bottom">
                                    Контакти
                                </md-tooltip>
                                <md-icon md-svg-src="img/icons/ic_contacts_24px.svg"></md-icon>
                            </md-button>
                            <md-button ui-sref="login" class="md-primary">Вхід</md-button>
                            <md-button ui-sref="register" class="md-primary">Реєстрація</md-button>
                        </div>
                        <md-button aria-label="comment" class="md-icon-button hide-gt-sm" ng-click="MCtrl.toggleSlider('leftSlider')">
                            <md-icon md-svg-src="img/icons/ic_menu_24px.svg"></md-icon>
                        </md-button>
                    </h2>
                </md-toolbar>
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
