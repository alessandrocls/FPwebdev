<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class BillController extends Controller
{
    //
    public function addToCart(Request $request, $productid )
    {

        if (Session::get('fullname') == ''){
            return view("login");
        }
        else{
            $response1 = Http::withHeaders([
                'Accept' => 'application/json',
    
            ])->patch('http://127.0.0.1:8000/api/addToCart', [
                "userID" => Session::get("userID"),
                "productID" => $productid,
            ]);
            $response2 = Http::withHeaders([
                'Accept' => 'application/json',
    
            ])->get('http://127.0.0.1:8000/api/getCartCount', [
                "userID" => Session::get('userID'),
            ]);
            $response = json_decode($response1->body(), true);
            $count = json_decode($response2->body(), true);
            // dump($response, $count);
            Session::put('count',$count);
            return Redirect::to(".");
        }
    }
    public function getCart(Request $request)
    {
        if (Session::get('fullname') == ''){
            return view("login");
        }
        else
        {
            $response1 = Http::withHeaders([
                'Accept' => 'application/json',
    
            ])->get('http://127.0.0.1:8000/api/getCart', [
                "userID" => Session::get('userID'),
            ]);
            $response2 = Http::withHeaders([
                'Accept' => 'application/json',
    
            ])->get('http://127.0.0.1:8000/api/getBillID', [
                "userID" => Session::get('userID'),
            ]);
            $data = json_decode($response1->body(), true);
            $billID = json_decode($response2->body(), true);
            // dump($data, $billID);
            return view('/checkout', compact('data', 'billID'));
        }
    }

    public function getBills($billID)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get('http://127.0.0.1:8000/api/getBills', [
            "billID" => $billID,
        ]);

        $data = json_decode($response->body(), true);

        // dump($data);

        return $data;
    }
    public function getHistory(Request $request)
    {
        if (Session::get('fullname') == ''){
            return view("login");
        }
        else
        {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
    
            ])->get('http://127.0.0.1:8000/api/getHistory', [
                "userID" => Session::get('userID'),
            ]);

            $data = json_decode($response->body(), true);

            // dump($data);

            return view('/history', compact('data'));
        }
    }

    public function deleteItem( $billDetailID )
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->delete('http://127.0.0.1:8000/api/deleteItem', [
            "billDetailID" => $billDetailID,
        ]);
        $response2 = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get('http://127.0.0.1:8000/api/getCartCount', [
            "userID" => Session::get('userID'),
        ]);
        $count = json_decode($response2->body(), true);
        // dump($response, $count);
        Session::put('count',$count);

        return Redirect::to('/checkout');
    }

    public function addPayment(Request $request, $billID )
    {
        $paymentTypeID = $request->input('paymenttype');
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->patch('http://127.0.0.1:8000/api/addPayment', [
            "billID" => $billID,
            "paymentTypeID" => $paymentTypeID
        ]);

        $details = json_decode($response->body(), true);

        return view('pay', compact('details'));
    }

}
