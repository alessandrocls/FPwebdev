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
        $data = DB::table('products')
            ->where('categoryID',1)
                -> get();

        return response()->json($data);
    }
    
    public function getAdventure()
    {
        $data = DB::table('products')
        ->where('categoryID',2)
            -> get();

        return response()->json($data);
    }
    
    public function getHorror()
    {
        $data = DB::table('products')
        ->where('categoryID',3)
            -> get();
        return response()->json($data);
    }
    
    public function getStrategy()
    {
        $data = DB::table('products')
        ->where('categoryID',4)
            -> get();
        return response()->json($data);
    }
    
    public function getSimulation()
    {
        $data = DB::table('products')
        ->where('categoryID',5)
            -> get();
        return response()->json($data);
    }
    public function getDetails(Request $request)
    {
        $data = DB::table('products')
            ->where('productID',$request->productID)
                -> get();


        // dump($data,$img);
        return response()->json($data);
    }

}
