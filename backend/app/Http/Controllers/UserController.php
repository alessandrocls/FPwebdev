<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function signup(Request $request)
    {
        $user = new User;
        $user->email =  $request->email;
        $user->password =  Hash::make($request->password);
        $user->fullname=  $request->fullname;
        $user->phonenumber =  $request->phonenumber;

        $user->save();

        // User::create([
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('password')),
        //     'fullname' => $request->input('fullname'),
        //     'phonenumber' => $request->input('phonenumber')
        // ]);
        $request->validate([
            'email' => 'required|',
            'password' => 'required'
        ]);
        return response()->json(['message' => 'Signup Success']);
    }
    public function login(Request $request) {
       

        $users = User::all()->where('email',  $request->email);
        $count = $users->count();
        if (!$count) {
            return response()->json(['message' => 'Incorrect Email/Password']);
            }
            else{
            $data = DB::table('users')
                    ->where('email',$request->email)
                        -> get();
                foreach ($data as $data) {
                    $hashed_pw = $data->password;
                }
          
            if(Hash::check($request->password, $hashed_pw)){
                $data = DB::table('users')
                ->where('email',$request->email)
                -> get();
    
                foreach ($data as $dat) {
                    ///$fullname = $dat->fullName;
                    $userID = $dat->userID;
                    //$email = $dat->email;
                    //$phonenumber = $dat->phoneNumber;
                }
                // $cart = DB::table('bill_details')
                //     -> join('bills','bills.billID','=','bill_details.billID')
                //     ->where('bills.userID', $userID)
                //     ->where('bills.statusID',1)
                //     ->get();
                // $count = $cart->count();
                $user = DB::table('users')
                ->where('email',$request->email)
                -> get();
                
                // Session::put('fullname',$fullname);
                // Session::put('userID',$userID);
                // Session::put('email',$email);
                // Session::put('phonenumber',$phonenumber);
                // Session::put('count',$count);
                // // dump($fullname, $cart);
                // return view('mainpage');
                return response()->json(['user' =>$user, 'message' => 'Login Sucessful']);
            }
            else{
                return response()->json(['message' => 'Incorrect Email/Password']);
            }
        }
    }
    public function getCartCount(Request $request){
        $cart = DB::table('bill_details')
        -> join('bills','bills.billID','=','bill_details.billID')
        ->where('bills.userID', $request->userID)
        ->where('bills.statusID',1)
        ->get();
        $count = $cart->count();
        return  $count;

    }

    // public function logout(Request $request) {
    //     Session::flush();
    //     $request->session()->regenerate();
    //     // $request->session()->flush();
    //     return Redirect::to(".");
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
