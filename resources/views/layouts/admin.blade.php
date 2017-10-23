<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Блог</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}"/>
    <link href="{{ asset('assets/bxslider/jquery.bxslider.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>



    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>



<!--header start-->
@yield('header')
        <!--header end-->

<!--container start-->
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
<!--container end-->

<!--footer start-->
@yield('footer')
        <!--small footer end-->







<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery.js') }}">
</script>
<script src="{{ asset('js/bootstrap.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('js/hover-dropdown.js') }}">
</script>
<script defer src="{{ asset('js/jquery.flexslider.js') }}">
</script>
<script type="text/javascript" src="{{ asset('js/bxslider/jquery.bxslider.js') }}">
</script>

<script src="{{ asset('js/jquery.easing.min.js') }}">
</script>
<script src="{{ asset('js/link-hover.js') }}">
</script>


<!--common script for all pages-->
<script src="{{ asset('js/common-scripts.js') }}">
</script>


<script src="{{ asset('js/wow.min.js') }}">
</script>
<script>
    wow = new WOW(
            {
                boxClass:     'wow',      // default
                animateClass: 'animated', // default
                offset:       0          // default
            }
    )
    wow.init();
</script>
</body>
</html>