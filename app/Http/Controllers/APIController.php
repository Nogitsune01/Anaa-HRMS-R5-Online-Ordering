<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OnlineOrderingCart;
use App\Models\R3Models\PaymentInformation;
use Illuminate\Support\Facades\File;

class APIController extends Controller
{
    public function userOrder()
    {
        $users = User::all();

        return response()->json($users);
    }

    public function deleteCart(Request $request)
    {
        $cart = OnlineOrderingCart::where('email', $request['email'])->get();

        foreach ($cart as $carts) {


            $carts->delete();
        
        }
        return response()->json([
            'message' => 'success'
        ]);
    }

    public function paymentOrder(Request $request){
        $orders = new PaymentInformation;

        if($orders){
            $submit_order = $orders->create([
                'acc_id' => $request['acc_id'],
                'invoice_no' => $request['invoice_no'],
                'customer_name' => $request['customer_name'],
                'customer_email' => $request['customer_email'],
                'payment_method' => $request['payment_method'],
                'payment_status' => $request['payment_status'],
                'room_no' => $request['room_no'],
                'status' => $request['status'],
            ]);

            $cart = OnlineOrderingCart::where('acc_id', $request['acc_id'])->get();

            if($submit_order){
                foreach($cart as $carts){
                    
                    $submit_order->cartPayments()->create([
                        'payment_id' => $submit_order->id,
                        'account_id' => $request['acc_id'],
                        'item_name' =>  $carts->title,
                        'category' => $carts->category,
                        'status' => $request['status_cart'],
                        'quantity' => $carts->quantity,
                        'total_price' => $carts->price * $carts->quantity
                    ]);
                }
                
            }
            return response()->json([
                'message' => 'success'
            ]);
        }

        
    }

    public function deleteItem(Request $request){
        $cart = OnlineOrderingCart::where('title', $request['item'])->first();

        $cart->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function updateStatus(Request $request){
        $pay_info = PaymentInformation::where('invoice_no', $request['orders'])->first();

        $order_status = 'On Delivery';
        $pay_info->update([
            'status' => $order_status
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }
}
