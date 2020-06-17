@extends('template/home')

@section('container')

    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay img-fluid" style="background-image: url(img/bg-img/cyberpunk.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4" >
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/horror.jpg); margin:25px">
                        <div class="catagory-content">
                            <a href="/horror">Horror</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4" >
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/adventure.jpg);margin:25px">
                        <div class="catagory-content">
                            <a href="/adventure">Adventure</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4" >
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/sport.jpg);margin:25px">
                        <div class="catagory-content">
                            <a href="/sport">Sport</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/simulation.jpg);margin:25px">
                        <div class="catagory-content">
                            <a href="simulation">Simulation</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/strategy.jpg);margin:25px">
                        <div class="catagory-content">
                            <a href="/strategy">Strategy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

 
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->

    @endsection