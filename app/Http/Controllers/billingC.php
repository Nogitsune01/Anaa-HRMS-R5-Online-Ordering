<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class billingC extends Controller
{
    public function bill(){
        return view('/loyalty.billing');
    }
}
