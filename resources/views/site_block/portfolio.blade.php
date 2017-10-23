
<!--blog start-->

<div class="col-lg-9 "><br>
        <div class="row mar-b-30">
            <div id="portfoliolist-three">
                <div class="col-md-12">
                    @foreach($portfolios as $portfolio)
                    <div class="portfolio logo" data-cat="logo">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-hover">
                                <div class="image-caption">
                                    <a href="data/portfolio/{{$portfolio->img}}" class="magnefig label label-info icon" data-toggle="tooltip" data-placement="left" title="Zoom"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('portfolio_show',['portfolio_alias' => $portfolio->id])}}" class="label label-info icon" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                </div>
                                <img src="data/portfolio/{{$portfolio->img}}" alt="" />

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>


    <!-- js placed at the end of the document so the pages load faster
    <script src="js/jquery.js"></script> -->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>

    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/mixitup.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/link-hover.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>



    <script src="js/jquery.magnific-popup.js"></script>

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

</div>