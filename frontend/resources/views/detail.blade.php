@extends('template/details')
@section('checkimage')
@foreach ($data as $data)
    <img class="img-fluid" src="/img/product-img/{{$data["cover"]}}" alt="">
             
@endsection

@section('checkname')
    <h2>{{$data["productName"]}}</h2>
    <p>{{$data["productDescription"]}}</p>
           
            <p class="product-price">${{$data["productPrice"]}}</p>

                <form class="cart-form clearfix" action="/addToCart/{{$data["productID"]}}" method="post">
                @csrf
                <!-- Select Box -->
              
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    
                    <button style="margin-top:50px" type="submit" name="addtocart" class="btn essence-btn">Add to cart</button>
                    <!-- Favourite -->
                </div>
            </form>
@endforeach
@endsection