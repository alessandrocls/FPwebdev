@extends('template/home')
@section('container')
<section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix" style="padding: 300px">
                @yield('checkimage')
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            
            @yield('checkname')
            

            <!-- Form -->

        </div>
    </section>
@endsection