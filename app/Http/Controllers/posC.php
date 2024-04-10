<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class posC extends Controller
{
    public function pos(){
        return view('loyalty.pointofsale');
    }
}
