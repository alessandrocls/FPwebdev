@extends('template/home')

@section('container')
<div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">
                <img class="col-md-5 img-fluid" style="width:100%; max-height: 600px; margin-bottom: 100px" src="/img/product-img/ghost.jpg" alt="">
                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation" style="margin:30px">

                        <div class="cart-page-heading">
                            <h5>Payment Information</h5>
                        </div>

                        <ul class="order-details-form mb-4">
                        <?php
                        $totalprice = 0
                        ?>
							@foreach($details as $details)
							
							<?php
    
                                    $subt = $details["productPrice"];
                                    $totalprice += $subt;
                                    $paymentType = $details["paymentType"]

                            ?>

                            @endforeach                         
                            <h6>Please send the following amount:</h6> <br><h6>${{$totalprice}}</h6> <br>  <h6>to our {{$details["paymentType"]}} number at <span style="font-weight:bold;">08385509996</span></h6> 


                            <a href="/history" class="btn essence-btn" style="margin-top:25px">Done</a>
                        </ul>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection