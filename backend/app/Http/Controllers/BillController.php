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
    public function addToCart(Request $request)
    {

        $data = DB::table('bills')
                        -> join('users','users.userID','=','bills.userID')
                        -> join('status','status.statusID','=','bills.statusID')
                        ->where('bills.userID',$request->userID)
                        ->where('bills.statusID',1)
                        ->get();
        $count = $data->count();

        if (!$count) {
            Bill::create([
                'userID' => $request->userID,
                'statusID' => 1,
            ]);
            $b_id = DB::table('bills')
                ->where('userID',$request->userID)
                ->get()->last()->billID;

            $billdetail = new BillDetail;
            $billdetail->billID =  $b_id;
            $billdetail->productID = $request->productID;
            $billdetail->save();
            
            }
        else{
            foreach ($data as $data) {
                $currentbillid = $data->billID;
            }
            $billdetail = new Billdetail;
            $billdetail->billID =  $currentbillid;
            $billdetail->productID = $request->productID;
            $billdetail->save();
        }

        return response()->json(['message' => 'Product added to cart']);
        // Session::put('count',$count);
        // return Redirect::to(".");

    }
    public function getBills(Request $request)
    {
        $bills = DB::table('bill_details')
        ->where('billID','=',$request->billID)
        ->get();
        return response()->json($bills);
    }

    public function getCart(Request $request)
    {
        $data = DB::table('bill_details')
                        -> join('bills','bills.billID','=','bill_details.billID')
                        -> join('products','products.productID','=','bill_details.productID')
                        // -> join('status','status.statusID','=','bills.statusID')
                        ->where('bills.userID',$request->userID)
                        ->where('bills.statusID',1)
                        ->get();
        // dump($data);

        return response()->json($data);
        
    }


    public function getBillID(Request $request)
    {
        $billID = DB::table('bills')
        ->where('userID', $request->userID)
        ->where('statusID',1)
        ->get();

        return response()->json($billID);
    }


    public function getHistory(Request $request)
    {
        $data = DB::table('bill_details')
                        -> join('bills','bills.billID','=','bill_details.billID')
                        -> join('products','products.productID','=','bill_details.productID')
                        -> join('status','status.statusID','=','bills.statusID')
                        ->join('paymenttype','paymenttype.paymentTypeID','=','bills.paymentTypeID')
                        // -> join('status','status.statusID','=','bills.statusID')
                        ->where('bills.userID',$request->userID)
                        ->where('bills.statusID', '!=', 1)
                        ->orderBy('bill_details.billdetailID','DESC')
                        ->get();
        return response()->json($data);
        // return view('/history', compact('data'));
    }

    public function deleteItem(Request $request)
    {
        $deletedUser = BillDetail::where('billDetailID', $request->billDetailID)->delete();
        return response()->json(['message' => 'Product deleted from cart']);
    }

    public function addPayment( Request $request  )
    {
        $data = [
            'paymentTypeID' => $request->paymentTypeID,
            'statusID' => 2,
        ];
        Bill::where('billID', $request->billID)->update($data);
        $details = DB::table('bills')
            ->join('bill_details','bill_details.billID','=','bills.billID')
            ->join('products','products.productID','=','bill_details.productID')
            ->join('paymenttype','paymenttype.paymentTypeID','=','bills.paymentTypeID')
            ->where('bills.statusID', '=', 2)
            ->where('bills.billID', '=', $request->billID)
            ->get();

            return response()->json($details);
    }

}
