<?php

namespace App\Http\Controllers;

use App\Models\LoyaltyModel;
use Illuminate\Http\Request;

class LoyaltyCon extends Controller
{

    public function index()
    {
         return view ('loyalty.loyalty');
    }

  
    public function create()
    {
        return view('loyalty.loyalty');
    }


    public function store(Request $request)
    {


        $loyaltypoints= LoyaltyModel::create([
            'name', 
            'points_required'
        ]);

        

        return redirect()->route('loyalty');


    }

    public function show(string $id)
    {
        
    }


    public function edit(string $id)
    {
        
    }


    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
