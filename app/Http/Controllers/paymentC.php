<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paymentC extends Controller
{
    public function pay(){
        return view('loyalty.payment');
    }
}
