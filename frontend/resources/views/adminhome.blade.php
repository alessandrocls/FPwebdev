@extends('template/admintemplate')
@section('container')

<div class="jumbotron col-md-8 col-lg-8" style="margin:100px;" >
    <h1 class="display-4">Welcome Admin!</h1>
    <button type="button" class="btn btn-primary" style="margin:100px; height: 100px; width: 350px;">Manage Products</button>
    <a href="/orders"><button type="button" class="btn btn-success" style="margin:100px; height: 100px; width: 350px;">Manage Active Orders</button></a>
    <a href="/ordershistory"><button type="button" class="btn btn-secondary" style="margin:100px; height: 100px; width: 350px;">View Completed Orders</button></a>
    <a href="/adminlogout"><button type="button" class="btn btn-danger" style="margin:100px; height: 100px; width: 350px;">Log Out</button></a>
</div>


@endsection