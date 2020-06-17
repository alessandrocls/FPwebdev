<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>GameZone - Gaming Shopping Center</title>

    <!-- Favicon  -->
    <link rel="icon" href=" {{ url('img/core-img/favicon.ico') }}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href=" /css/core-style.css">
    @yield('design')
   

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="/"><img style="width:74px" src="/img/core-img/logo.jpg" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Games</a>
                                <div class="megamenu" style='width:50% !important'>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Collection</li>
                                        <li><a href="/sport">Sport</a></li>
                                        <li><a href="/adventure">Adventure</a></li>
                                        <li><a href="/horror">Horror</a></li>
                                        <li><a href="/strategy">Strategy</a></li>
                                        <li><a href="/simulation">Simulation</a></li>
                                    </ul>
                                    
                                    <div class="single-mega cn-col-4">
                                        <img src="/img/bg-img/sidegame.jpg" style='width:300px !important'alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <?php
                    if(Session::get('email')!="") 
                    ?>
                    <div style="padding: 25px">
                        <a href="{{url('/history')}}">{{Session::get('fullname')}}</a>
                    </div>
                    <?php
                ?>

                <!-- Favourite Area -->

                <!-- User Login Info -->
                <?php
                    if(Session::get('email')!=""){
                    ?>
                    <div class="user-login-info">
                        <a href="/logout">Log Out</a>
                    </div>
                    <?php
                    }else{?>
                    <div class="user-login-info">
                        <a href="/login">Login</a>
                    </div>                    
                    <?php
                    }
                ?>

                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="{{ url('/checkout') }}" id="essenceCartBtn"><img src="/img/core-img/bag.svg" alt=""><span>{{Session::get('count')}}</span></a>
                </div>
            </div>

        </div>
    </header>


    @yield('container')
    
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img style="width:74px"src="/img/core-img/logo.jpg" alt=""></a>
                        </div>
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="shop.html">Games</a></li>
                                <li><a href="contact.html">About Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            
                            <li><a href="#">Privacy Policy</a></li>
                           
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row align-items-end">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_heading mb-30">
                            <h6>Subscribe</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your email here">
                                <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

<div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                    
                    </p>
                </div>
            </div>

        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="/js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>
    <script>
        $(document).on('click', '.panel div.clickable', function (e) {
        var $this = $(this); //Heading
        var $panel = $this.parent('.panel');
        var $panel_body = $panel.children('.panel-body');
        var $display = $panel_body.css('display');

        if ($display == 'block') {
            $panel_body.slideUp();
        } else if($display == 'none') {
            $panel_body.slideDown();
        }
        });

        $(document).ready(function(e){
            var $classy = '.panel.autocollapse';

            var $found = $($classy);
            $found.find('.panel-body').hide();
            $found.removeClass($classy);
        });
    </script>

</body>

</html>