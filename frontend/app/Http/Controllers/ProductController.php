<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    //
    public function index()
    {
        //
    }

    public function getSport()
    {
        $response = Http::get(env('API_URL','34.101.151.88').'/api/getSport');
        $data = json_decode($response->body(), true);
        // dump($data);
        // dump($response);

        return view('/sport', compact('data'));
    }
    
    public function getAdventure()
    {
        $response = Http::get(env('API_URL','34.101.151.88').'/api/getAdventure');
        $data = json_decode($response->body(), true);

        return view('/adventure', compact('data'));
    }
    
    public function getHorror()
    {
        $response = Http::get(env('API_URL','34.101.151.88').'/api/getHorror');
        $data = json_decode($response->body(), true);

        return view('/horror', compact('data'));
    }
    
    public function getStrategy()
    {
        $response = Http::get(env('API_URL','34.101.151.88').'/api/getStrategy');
        $data = json_decode($response->body(), true);

        return view('/strategy', compact('data'));
    }
    
    public function getSimulation()
    {
        $response = Http::get(env('API_URL','34.101.151.88').'/api/getSimulation');
        $data = json_decode($response->body(), true);

        return view('/simulation', compact('data'));
    }
    public function getDetails($productID)
    {
        $response = Http::get(env('API_URL','34.101.151.88').'/api/getDetail', [
            "productID" => $productID,
        ]);
        $data = json_decode($response->body(), true);

        // dump($data);
        return view('/detail', compact('data'));
    }

}
