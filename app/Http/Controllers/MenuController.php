<?php

namespace App\Http\Controllers;

use App\Models\R2Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menu = R2Menu::all();

        return view('admin.menu.menu', compact('menu'));
    }
}
