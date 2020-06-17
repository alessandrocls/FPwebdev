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

    public function login(Request $request) {
       

        $users = Admin::all()->where('username',  $request->username);
        $count = $users->count();
        if (!$count) {
            return response()->json(['message' => 'Incorrect Email/Password']);
            }
            else{
            $data = DB::table('admins')
                    ->where('username',$request->username)
                        -> get();
                foreach ($data as $data) {
                    $hashed_pw = $data->password;
                }
          
            if(Hash::check($request->password, $hashed_pw)){
                $data = DB::table('admins')
                ->where('username',$request->username)
                -> get();
    
                foreach ($data as $dat) {
                    $username = $dat->username;
                    $password = $dat->password;
                    $adminID = $dat->adminID;
                    $api_token = $dat->api_token;
                }
                // $cart = DB::table('bill_details')
                //     -> join('bills','bills.billID','=','bill_details.billID')
                //     ->where('bills.userID', $userID)
                //     ->where('bills.statusID',1)
                //     ->get();
                // $count = $cart->count();
                $admin = DB::table('admins')
                ->where('username',$request->username)
                -> get();
                
                // Session::put('fullname',$fullname);
                // Session::put('userID',$userID);
                // Session::put('email',$email);
                // Session::put('phonenumber',$phonenumber);
                // Session::put('count',$count);
                // // dump($fullname, $cart);
                // return view('mainpage');
                return response()->json(['admin' =>$admin, 'message' => 'Login Sucessful']);
            }
            else{
                return response()->json(['message' => 'Incorrect Email/Password']);
            }
        }
    }

    public function getOrders()
    {
        $data = DB::table('bills')
                        ->join('status','status.statusID','=','bills.statusID')
                        ->join('users',"users.userID",'=','bills.userID')
                        // -> join('status','status.statusID','=','bills.statusID')
                        ->where('bills.statusID', '=', 2)
                        ->orderBy('bills.billID','DESC')
                        ->get();
        return response()->json($data);
    }
    public function getOrdersHistory()
    {
        $data = DB::table('bills')
                        ->join('status','status.statusID','=','bills.statusID')
                        ->join('users',"users.userID",'=','bills.userID')
                        // -> join('status','status.statusID','=','bills.statusID')
                        ->where('bills.statusID', '=', 3)
                        ->orderBy('bills.billID','DESC')
                        ->get();
        return response()->json($data);
    }

    public function getDetails( Request $request )
    {
        $data = DB::table('bill_details')
            ->join('bills','bills.billID', '=', 'bill_details.billID')
            ->join('products','products.productID','=','bill_details.productID')
            ->join('paymenttype','paymenttype.paymentTypeID','=','bills.paymentTypeID')
            ->where('bill_details.billID', '=', $request->billID)
            ->orderBy('bill_details.billdetailID','DESC')
            ->get();

        return response()->json($data);
    }
    public function confirmOrder1( Request $request )
    {

        Bill::where('billID', $request->billID)->update($request->data);

        return response()->json(['message' => 'Order Confirmed']);
    }
    public function confirmOrder2( Request $request )
    {
        BillDetail::where('billDetailID',$request->billDetailID)->update($request->gamekey);
        return response()->json(['message' => 'Gamekey Generated']);
    }
}
