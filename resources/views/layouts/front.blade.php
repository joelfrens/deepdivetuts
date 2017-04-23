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
    <div class="page-header no-margin" style="min-height: 30px;background-color: #4bc0c0">
        <div class="container">
            <div class="wrapper" style="padding-top:20px;color:#fff;font-size:20px;">
                <span class="logo-text"><i class="fa fa-life-ring" aria-hidden="true"></i>DeepDiveTuts</span>
                <span style="width:50px;">&nbsp;</span>
                @foreach($menus as $key => $value)
                    <span><a style="color:#fff" href="/{{$value->link}}">{{ $value->title }}</a></span>
                @endforeach
            </div>
            <div class="page-header" style="text-align:center;color:#fff">
                <medium>Laravel, PHP and Linux tutorials</medium>
            </div>
            <div>&nbsp;</div>   
            
        </div>
    </div>
    <div>&nbsp;</div>     
    <div class="container">
        <div class="col-lg-12">
            <div class="input-group" style="-webkit-box-shadow: 0px 5px 16px -8px rgba(75,192,192,1);
-moz-box-shadow: 0px 5px 16px -8px rgba(75,192,192,1);
box-shadow: 0px 5px 16px -8px rgba(75,192,192,1);">
              <input type="text" class="form-control" placeholder="Search for..." style="box-shadow:none;border:0;border-radius: 0">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button" style="box-shadow:none;border:0;border-radius: 0;">Go!</button>
              </span>
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>
    <div>&nbsp;</div>     
        
    @yield('content')

    <div class="page-footer" style="min-height: 30px;background-color: #2e3234">
    </div>
</div>
<script src="../assets/build/js/app_foot_web.min.js"></script>
</body>
</html>