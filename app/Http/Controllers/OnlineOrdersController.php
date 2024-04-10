<?php

namespace App\Http\Controllers;

use App\Models\R3Models\OrderPayments;
use App\Models\R3Models\PaymentInformation;
use Illuminate\Http\Request;

class OnlineOrdersController extends Controller
{
    public function index(Request $request){

        $active_orders = PaymentInformation::when($request['filter_status'] != null, function($q) use($request){
            return $q->where('status', $request['filter_status'])->orderBy('id','DESC');
        })->orderBy('id', 'DESC')->paginate(10);
        return view('admin.onlineOrders.onlineOrdersIndex', compact('active_orders'));
    }
}
