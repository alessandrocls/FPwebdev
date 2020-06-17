@extends('template/home')

@section('container')




    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Games</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a href="#">Games-Sport</a>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="/sport">Sport</a></li>
                                            <li><a href="/adventure">Adventure</a></li>
                                            <li><a href="/horror">Horror</a></li>
                                            <li><a href="/strategy">Strategy</a></li>
                                            <li><a href="/simulation">Simulation</a></li>
                                            
                                        </ul>
                                    </li>
                                    <!-- Single Item -->
                                    <!-- Single Item -->
                                    
                                </ul>
                            </div>
                        </div>

                       
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        

                        <div class="row">
                        @foreach($data as $data)
                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img" style="height:300px; width: 250px">
                                        <img class="img-fluid" style="width:100%; height:100%" src="img/product-img/{{$data["cover"]}}" alt="">                                        
                                    </div>


                                    <!-- Product Description -->
                                    <div class="product-description">
                                        
                                        <a href="single-product-details.html">
                                            <h6>{{$data["productName"]}}</h6>
                                        </a>
                                        <p class="product-price"> ${{$data["productPrice"]}}</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="/details/{{$data["productID"]}}" class="btn essence-btn">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <!-- Pagination -->
                    <!-- <nav aria-label="navigation"> -->
                        <!-- <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul> -->
                    <!-- </nav> -->
                </div>
            </div>
        </div>
    </section>

@endsection