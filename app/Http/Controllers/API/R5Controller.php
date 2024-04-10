<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OnlineOrderingCart;
use Illuminate\Http\Request;

class R5Controller extends Controller
{
    public function getCartAccounts(){
        $cart_orders = OnlineOrderingCart::all();

        return response()->json([
            'cart' => $cart_orders
        ]);
    }
}
