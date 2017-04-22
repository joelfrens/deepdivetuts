<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--- CSS Files here-->
    <link rel="stylesheet" href="/assets/build/css/app.css">

    <!--- JS Files here-->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
    <script src="/assets/build/js/app_head.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header">

        <!-- Nav top bar -->
        @if (!Auth::guest())
        <div class="nav-top-wrapper">
            <div class="nav-top-left">
                <span style="color:#00838F;font-size:25px">&nbsp;<i class="fa fa-anchor" aria-hidden="true"></i>&nbsp;DeepDiveCMS</span>
            </div>
            <div class="nav-top-right">
                <div class="dropdown">
                    <a class="btn dropdown-toggle user-drop-link no-link" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fa fa-user btn dropdown-toggle user-drop-icon" aria-hidden="true"></i>
                        {{ Auth::user()->name }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu nav-top-drop" aria-labelledby="dropdownMenu1">
                        <li><a href="/admin/settings"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
        <!-- Nav top bar -->

        <!-- Nav left bar -->
        @if (!Auth::guest())
            @include('common/navleft')
        @endif
        <!-- Nav left bar -->

         @yield('content')

    </div>
    <!-- Page header -->
</div>

<!-- Scripts -->
<script src="/assets/build/js/app_foot.min.js"></script>
</body>
</html>
