<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="hr" class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7 ]>    <html lang="hr" class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="hr" class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9 ]>    <html lang="hr" class="no-js lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="hr" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>... :: {{ $page_title or 'Dobrodošli' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="...">
    <meta name="description" content="...">
    <meta name="author" content="Matija Buriša">
    <meta property="og:title" content="..." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ Request::url('/') }}" />
    <meta property="og:site_name" content="..." />
    <meta property="og:description" content="..." />

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="canonical" href="{{ Request::url() }}" />

    <!-- scripts -->
    {{ HTML::script('js/jquery.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/bootstrap.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/modernizr.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/classie.min.js', ['charset' => 'utf-8']) }}    
    <!--[if lt IE 9]>
    {{ HTML::script('js/html5shiv.min.js', ['charset' => 'utf-8']) }}
    {{ HTML::script('js/respond.min.js', ['charset' => 'utf-8']) }}
    <![endif]-->

    <!-- stylesheets -->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/main.css') }}
</head>
<body>
<div id="fakeloader"></div>

<!-- notifications -->
<div class="notificationOutput" id="outputMsg">
    <div class="notificationTools" id="notifTool">
        <span class="fa fa-times fa-med" id="notificationRemove"></span>
        <span id="notificationTimer"></span>
    </div>
</div>

<div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home pr-10" aria-hidden="true"></i> Nautica
                </a>
            </li>
            <li>
                <a href="{{ url('info') }}"><i class="fa fa-ship pr-10" aria-hidden="true"></i> Rute-Informacije</a>
            </li>
            <li>
                <a href="{{ url('kontakt') }}"><i class="fa fa-envelope-o pr-10" aria-hidden="true"></i> Kontakt</a>
            </li>
            <li>
                <a href="{{ url('galerija') }}"><i class="fa fa-picture-o pr-10" aria-hidden="true"></i> Galerija</a>
            </li>
            <li>
                <a href="{{ url('o-nama') }}"><i class="fa fa-info pr-20" aria-hidden="true"></i> O nama</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-facebook pr-20" aria-hidden="true"></i> Facebook</a>
            </li>
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" class="container-fluid">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas" title="Navigacija">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>

        <div class="container content-holder">
