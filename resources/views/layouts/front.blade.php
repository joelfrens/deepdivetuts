<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title>DeepDive</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!--- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titan+One" rel="stylesheet">

    <!--- CSS Files here-->
    <link rel="stylesheet" href="../assets/build/css/front.css">

    <!--- JS Files here-->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
    <script src="../assets/build/js/app_head.min.js"></script>
<script src="http://prismjs.com/prism.js"></script>
<link rel="stylesheet" type="text/css" href="http://prismjs.com/themes/prism.css">
</head>

<body>
<div class="page-wrapper">
    <div class="page-header c-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <span class="logo-text">
                        <a href="#" class="no-link c-white" style="font-family: 'Titan One', cursive;">DeepDiveTuts</a>
                    </span>
                </div>
                <div class="col-lg-10">
                    <div class="nav-top-head">
                        <span class="nav-top-item">
                            <a class="no-link nav-item-link" href="/"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</a>
                        </span>
                        @foreach($menus as $key => $value)
                            <span class="nav-top-item">
                                <a class="no-link nav-item-link" href="{{ $settings['site_url'] }}page{{$value->link}}">{{ $value->title }}</a>
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center tag-line">Laravel, PHP and Linux tutorials..plus videos, free CMS, templates and much more...</div>
                </div>
            </div>
        </div>
    </div>  
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="input-group search-box">
                    <form action="/search" method="POST" role="search">
                        {{ csrf_field() }}
                        @if ($keyword)
                            <input type="text" class="form-control search-input" name="keyword" placeholder="Search tutorials..." value="{{$keyword}}">
                        @else
                            <input type="text" class="form-control search-input" name="keyword" placeholder="Search tutorials..." value="">
                        @endif
                        <span class="input-group-btn search-btn-wrap">
                            <button class="btn btn-default search-btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </form>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div>
    </div>   
        
    @yield('content')

    <div class="page-footer">
    </div>
</div>
<script src="../assets/build/js/app_foot_web.min.js"></script>
</body>
</html>