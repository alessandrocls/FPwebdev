@extends('template/admintemplate')
@section('container')

<div class="checkout_area">
        <div class="container">
            <div class="row">
                <!-- <img class="col-md-5 img-fluid" style="width:100%; max-height: 600px; margin-bottom: 100px" src="/img/product-img/2077.jpg" alt=""> -->
                <div class="col-12 col-md-12 col-lg-12 ml-lg-auto">
                    <div class="order-details-confirmation" style="margin:30px">

                        <div class="cart-page-heading">
                            <a href="/adminhome"><h5>Back</h5></a>
                            <h5>All Purchases</h5>
                        </div>

      
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Bill ID</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">User Email</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Confirm Purchase</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $data)
                                <tr>
                                    <td style="text-align:center"><a href="/orderdetails/{{$data["billID"]}}" target='_blank'>{{$data["billID"]}}</a></td>
                                    <td>{{$data["fullName"]}}</td>
                                    <td>{{$data["email"]}}</td>
                                    <td>{{$data["status"]}}</td>
                                    <form method="post" action="confirmorder/{{$data["billID"]}}">
                                    @method('patch')
                                    @csrf
                                    <td style="text-align:center"><button type="submit" class="btn btn-success">Confirm</button></td>
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection