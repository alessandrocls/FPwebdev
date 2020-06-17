@extends('template/home')

@section('container')
<div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">
                <img class="col-md-5 img-fluid" style="width:100%; max-height: 600px; margin-bottom: 100px" src="/img/product-img/ghost.jpg" alt="">
                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation" style="margin:30px">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                        <?php
                        $totalprice = 0
                        ?>
                            <li><span>Product</span> <span>Total</span></li>
							@foreach($data as $data)
							
							<?php
                                $subt = $data["productPrice"];
                                $totalprice += $subt;
                                $currentbillid = $data["billID"];
                            ?>
                            <li><img src="/img/product-img/{{$data["cover"]}}" style="text-align:left; max-height:100px"alt=""><span>{{$data["productName"]}}</span> <span>${{$data["productPrice"]}}</span><span><form action="deleteItem/{{$data["billDetailID"]}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger">Delete</button>

                            </form></span></li>                            

					    @endforeach
                            <li><span>Total</span> <span>${{$totalprice}}</span></li>
                        </ul>



                    <?php
                        if(Session::get('count') == !0)
                        {
                            ?>
                            <form method="post" action="payItem/{{$data["billID"]}}">
                                @method('patch')
                                @csrf
                                <div id="accordion" role="tablist" class="mb-4">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                            <h6 class="mb-0">
                                                <input style="margin:15px"type="radio" id="Gopay" name="paymenttype" value="1">Gopay
                                            </h6>
                                        </div>

                                        
                                    </div>
                                    <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h6 class="mb-0">
                                        <input style="margin:15px"type="radio" id="OVO" name="paymenttype" value="2">OVO
                                        </h6>
                                    </div>
                                    
                                </div>                       
                            </form>                            
                            <button type="submit" name="addpayment" class="btn essence-btn">Place Order</a>
                            <?php                            
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection