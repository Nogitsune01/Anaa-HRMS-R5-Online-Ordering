<?php

namespace App\Http\Controllers\R3Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class R3Controller extends Controller
{
    public function shareUser(Request $request){
        $users = User::all();

        return response()->json($users);
    }
}
