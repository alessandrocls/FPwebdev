<?php

namespace App\Http\Controllers;

use App\Admin;
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


class AdminController extends Controller
{
    public $chars = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
   
    public function generateString()
    {
      $result = "";
      for ($i = 0; $i < 5; $i++) {
        $result .= $this->chars[rand(0,35)];
      }
      return $result;
    }
    
    public function addRandomStrings()
    {
      $string = "";
      for ($i = 0; $i < 3; $i++) {
        if ($string === "") {
          $string = $string . $this->generateString();
        } else {
          $string = $string . "-" . $this->generateString();
        }
        
      }
      return $string;
    }
    public function generateKey()
    {
       $gamekey = $this->addRandomStrings();
       return $gamekey;
    //    dump($gamekey);
       // return view('test',compact('gamekey'));
     }
    public function login(Request $request) {
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->post('http://127.0.0.1:8000/api/adminlogin', [
            "username" => Str::lower($request->input('username')),
            'password' => $request->input('password'),
        ]);
        $data = json_decode($response->body(), true);
        
        if($data["message"] != "Login Sucessful"){
            return Redirect::to('/admin')->with('message', 'Invalid  Username and/or Password');
        }
        else
        {

            Session::put('username',$data['admin'][0]["username"]);
            Session::put('username',$data['admin'][0]["password"]);
            Session::put('adminID',$data['admin'][0]["adminID"]);
            Session::put('api_token',$data['admin'][0]["api_token"]);
    
            return view('/adminhome');
        }


    }
    public function logout(Request $request) {
        Session::flush();
        $request->session()->regenerate();
        // $request->session()->flush();
        return Redirect::to("/admin");
    }

    public function getOrders()
    {
        $response = Http::get('http://127.0.0.1:8000/api/getOrders');
        $data = json_decode($response->body(), true);
        // dump($data);
        return view('/orders', compact('data'));
    }
    public function getOrdersHistory()
    {
        $response = Http::get('http://127.0.0.1:8000/api/getOrderHistory');
        $data = json_decode($response->body(), true);
        // dump($data);
        return view('/ordershistory', compact('data'));
    }

    public function getDetails( $billID )
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get('http://127.0.0.1:8000/api/getOrderDetails', [
            "billID" => $billID,
        ]);
        $data = json_decode($response->body(), true);
        dump($data);
        return view('/orderdetails', compact('data'));
    }
    public function confirmOrder( $billID )
    {

        $data = [
            "statusID" => 3
        ];
        $patchStatus = Http::withHeaders([
            'Accept' => 'application/json',

        ])->patch('http://127.0.0.1:8000/api/confirmOrder1', [
                'data' => $data,
                'billID' => $billID
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->get('http://127.0.0.1:8000/api/getBills', [
            "billID" => $billID,
        ]);
        $bills = json_decode($response->body(), true);
        foreach($bills as $bills)
        {
            $newGamekey = [
                'gamekey' => $this->generateKey()
            ];
            dump($bills, "This is Bills");
            dump($newGamekey, "This is gamekey");
            $patchGamekey = Http::withHeaders([
                'Accept' => 'application/json',
    
            ])->patch('http://127.0.0.1:8000/api/confirmOrder2', [
                'billDetailID' => $bills['billDetailID'],
                'gamekey' => $newGamekey
            ]);
        }

        return Redirect::to('/orders');

    }
}
