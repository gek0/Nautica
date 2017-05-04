<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Nautica Adventure :: {{ $page_title or 'Welcome' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="hvar, boat, renting, nautica">
    <meta name="description" content="A boat charter company located on the island of Hvar">
    <meta name="author" content="Matija Buriša">
    <!-- Facebook integration -->
    <meta property="og:title" content="Nautica Adventure" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ Request::url('en') }}" />
    <meta property="og:site_name" content="Nautica Adventure" />
    <meta property="og:description" content="A boat charter company located on the island of Hvar" />

    <!-- favicons and apple icon -->
    <!--[if IE]><link rel="shortcut icon" href="{{ asset('favicon.ico') }}"><![endif]-->
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('touch-icon-iphone.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('touch-icon-ipad.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('touch-icon-iphone-retina.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('touch-icon-ipad-retina.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('touch-icon-iphone-6-plus.png') }}">
    <link rel="canonical" href="{{ Request::url() }}" />

    <!-- scripts -->
    {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/modernizr.custom.public.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/jquery.lazyload.min.js', ['charset' => 'utf-8']) }}

    <!--[if lt IE 9]>
    {{ HTML::script('js/html5shiv.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/respond.min.js', ['charset' => 'utf-8']) }}
    <![endif]-->

    <!-- stylesheets -->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/main.css') }}
    {{ HTML::style('css/jquery.fancybox.css') }}

    {{ HTML::style('http://fonts.googleapis.com/css?family=Nunito:400,300,700') }}
    {{ HTML::style('css/flickity.css') }}
    {{ HTML::style('css/styles.css') }}
    {{ HTML::style('css/queries.css') }}
</head>
<body>

<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- facebook SDK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- end facebook SDK -->

<!-- notifications -->
<div class="notificationOutput" id="outputMsg">
   <div class="notificationTools" id="notifTool">
       <span class="fa fa-times fa-med" id="notificationRemove"></span>
       <span id="notificationTimer"></span>
   </div>
</div>

<header>
    <section class="hero" style="background: url('{{ url('/cover_image/cover_image_nautica.jpg') }}') no-repeat center center fixed; background-color: #FFFFFF; background-size: cover;">
        <div class="texture-overlay"></div>
        <div class="container">
            <div class="row nav-wrapper">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                    <a href="{{ url('en') }}">{{ HTML::image('css/assets/images/logo_main_nav.png', 'Nautica Adventure logo', ['title' => 'Nautica Adventure']) }}</a>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-5 text-right navicon">
                    <p>MENU</p><a id="trigger-overlay" class="nav_slide_button nav-toggle pulseAnim" href="#"><span></span></a>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-1 text-left navicon-2">
                    <a href="{{ url('/') }}" title="Prebaci na hrvatski" alt="Prebaci na hrvatski"><span class="lang_hr"></span></a>
                </div>
            </div>
            <div class="row hero-content">
                <div class="col-md-12">
                    <h1 class="animated fadeInDown">Nautica Adventure</h1>
                    <a href="#info" class="learn-btn animated fadeInUp">Start the adventure <i class="fa fa-arrow-down"></i></a>
                </div>
            </div>
        </div>
    </section>
</header>
