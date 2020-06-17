<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Support\Facades\Http;
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
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->post('http://127.0.0.1:8000/api/signup', [
            "email" => $request->input('email'),
            'password' => $request->input('password'),
            'fullname' => $request->input('fullname'),
            'phonenumber' => $request->input('phonenumber')
        ]);
        // $user = new User;
        // $user->email =  $request->input('email');
        // $user->password =  Hash::make($request->input('password'));
        // $user->fullname=  $request->input('fullname');
        // $user->phonenumber =  $request->input('phonenumber');

        // $user->save();

        // // User::create([
        // //     'email' => $request->input('email'),
        // //     'password' => Hash::make($request->input('password')),
        // //     'fullname' => $request->input('fullname'),
        // //     'phonenumber' => $request->input('phonenumber')
        // // ]);
        // $request->validate([
        //     'email' => 'required|',
        //     'password' => 'required'
        // ]);
        // return view('/login');
        $user = json_decode($response->body(), true);
        return Redirect::to('/login');
    }
    public function login(Request $request) {
        // $email = Str::lower($request->input("email"));
        // $password = $request->input("password");
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',

        ])->post('http://127.0.0.1:8000/api/login', [
            "email" => Str::lower($request->input('email')),
            'password' => $request->input('password'),
        ]);
        $data = json_decode($response->body(), true);
        // dump($data);s

        // dump($data);

        if($data["message"] != "Login Sucessful"){
            return Redirect::to(URL::previous())->with('message', 'Invalid  Username and/or Password');
        }
        else
        {

                // dump($data["fullName"]);
            Session::put('fullname',$data['user'][0]["fullName"]);
            Session::put('userID',$data['user'][0]["userID"]);
            Session::put('email',$data['user'][0]["email"]);
            Session::put('phonenumber',$data['user'][0]["phoneNumber"]);
            $count = Http::withHeaders([
                'Accept' => 'application/json',
    
            ])->get('http://127.0.0.1:8000/api/getCartCount', [
                "userID" => Session::get('userID'),
            ]);
            Session::put('count',$count);
    
            // Session::put('fullname',$fullname);
            // Session::put('userID',$userID);
            // Session::put('email',$email);
            // Session::put('phonenumber',$phonenumber);
            // Session::put('count',$count);
            // // dump($fullname, $cart);
            return view('mainpage');
        }

        
    }
    public function logout(Request $request) {
        Session::flush();
        $request->session()->regenerate();
        // $request->session()->flush();
        return Redirect::to(".");
    }
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
