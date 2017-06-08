<!doctype html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title>DeepDiveTuts - Laravel, PHP and Linux tutorials..plus videos, free CMS, templates and much more...</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Joel Fernandes">
    
    <!--- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titan+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Miriam+Libre" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--- CSS Files here-->
    <link rel="stylesheet" href="../assets/build/css/front.css">

    <!--- JS Files here-->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
    <script src="../assets/build/js/app_head.min.js"></script>
    <script src="../assets/src/js/libs/prism.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/src/css/prism.css">
</head>

<body>
<div class="page-wrapper">
    <div class="page-header c-white" style="position: relative; overflow: hidden;">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <span class="logo-text">
                        <a href="{{ $settings['site_url'] }}" class="no-link c-white">DEEPDIVE<span style="color:#ceaa3d">TUTS</span></a>
                    </span>
                </div>
                <div class="col-xs-10">
                    <div class="nav-top-head" style="float: none;position: absolute; right: 0;">
                        @foreach($categories as $key => $value)
                            <span class="nav-top-item" style="margin-right: 4px">
                                <a class="no-link nav-item-link" href="{{ $settings['site_url'] }}category/{{$value->slug}}" style="color: #333;display: inline-block;padding:10px;">{{ $value->name }}</a>
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        @yield('content')
    </div>
    
    <div class="page-footer">
        <div class="container">
            <div class="row border-bottom">
                <div class="col-xs-12 col-md-4">
                    <div class="nav-footer">
                        <br />
                        <h4 class="footer-link-title">Links</h4>
                        <ul class="footer-links">
                            <li class="nav-footer-item">
                                <a class="nav-item-foot-link footer-link-item" href="/">Home</a>
                            </li>
                            @foreach($menus as $key => $value)
                                <li class="nav-footer-item">
                                    <a class="nav-item-foot-link footer-link-item" href="{{ $settings['site_url'] }}page{{$value->link}}">
                                        {{ $value->title }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-md-4">
                    
                    <div class="nav-footer">
                        <br />
                        <h4 class="footer-link-title">Contact Us</h4>
                        
                        <div class="nav-footer-item footer-link-item">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $settings['contact_email'] }}
                        </div>
                        <div class="nav-footer-item footer-link-item">
                            <i class="fa fa-skype" aria-hidden="true"></i> {{ $settings['skype_id'] }} 
                        </div>
                        <div class="nav-footer-item footer-link-item">
                            <i class="fa fa-phone" aria-hidden="true"></i> {{ $settings['contact_phone'] }}
                        </div>  
                        <div class="nav-footer-item footer-link-item">
                            <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $settings['contact_address_1'] }}
                        </div>
                        <div class="nav-footer-item footer-link-item">
                            <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $settings['contact_address_2'] }}
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-4">
                    
                    <div class="nav-footer">
                        <br />
                        <h4 class="footer-link-title">Social</h4>

                        <span class="fa-stack fa-lg">
                          <i class="fa fa-square-o fa-stack-2x"></i>
                          <i class="fa fa-facebook fa-stack-1x"></i>
                        </span>
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-square-o fa-stack-2x"></i>
                          <i class="fa fa-twitter fa-stack-1x"></i>
                        </span>
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-square-o fa-stack-2x"></i>
                          <i class="fa fa-linkedin fa-stack-1x"></i>
                        </span>
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-square-o fa-stack-2x"></i>
                          <i class="fa fa-google-plus fa-stack-1x"></i>
                        </span>
                        
                    </div>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-xs-12 col-md-4">
                    <h4 class="footer-link-title">Categories</h4>
                    <ul class="footer-links">
                        @foreach($categories as $key => $value)
                            <li class="nav-footer-item">
                                <a class="av-item-foot-link footer-link-item" href="{{ $settings['site_url'] }}category/{{$value->slug}}">{{ $value->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-xs-12 col-md-4">
                    <h4 class="footer-link-title">Tags</h4>
                    <ul class="footer-links">
                        @foreach($tags as $value)
                            <span class="box-foot-tag-footer">
                                <a href="{{ $settings['site_url'] }}tag/{{$value->slug}}">{{ $value->name }}</a>
                            </span>
                        @endforeach
                    </ul>
                </div>
                <div class="col-xs-12 col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 copyright">
                    &copy;deepdivetuts.com. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/build/js/app_foot_web.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90734570-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>