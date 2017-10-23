<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Блог</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('js/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}"/>
    <link href="j{{ asset('s/bxslider/jquery.bxslider.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}"/>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('js/owlcarousel/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mixitup.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />


    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>

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
            @yield('contact')
            @yield('registr')
            @yield('login')
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



    <!-- js placed at the end of the document so the pages load faster
        <script src="js/jquery.js"></script> -->
    <script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hover-dropdown.js') }}"></script>
    <script defer src="{{ asset('js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/bxslider/jquery.bxslider.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/mixitup.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/link-hover.js') }}"></script>


    <!--common script for all pages-->
    <script src="{{ asset('js/common-scripts.js') }}"></script>



    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>

    <script type="text/javascript">
        $('.image-caption a').tooltip();

        $(function () {

            var filterList = {

                init: function () {

                    // MixItUp plugin
                    // http://mixitup.io
                    $('#portfoliolist-three').mixitup({
                        targetSelector: '.portfolio',
                        filterSelector: '.filter',
                        effects: ['fade'],
                        easing: 'snap',
                        // call the hover effect
                        onMixEnd: filterList.hoverEffect()
                    });

                },

                hoverEffect: function () {
                    $("[rel='tooltip']").tooltip();
                    // Simple parallax effect
                    $('#portfoliolist-three .portfolio .portfolio-hover').hover(
                            function(){
                                $(this).find('.image-caption').slideDown(250); //.fadeIn(250)
                            },
                            function(){
                                $(this).find('.image-caption').slideUp(250); //.fadeOut(205)
                            }
                    );
                }

            };

            // Run the show!
            filterList.init();


        });

        $( document ).ready(function() {
            $('.magnefig').each(function(){
                $(this).magnificPopup({
                    type:'image',
                    removalDelay: 300,
                    mainClass: 'mfp-fade'
                })
            });
        });
    </script>

    <script>



        $(document).ready(function() {

            $("#owl-demo").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds

                items : 4,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3],
                stopOnHover : true,

            });

        });

        new WOW().init();


    </script>





</body>
</html>