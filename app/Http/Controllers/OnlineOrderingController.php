<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\R2Menu;
use Illuminate\Http\Request;
use App\Models\OnlineOrderingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\OnlineOrderingAccounts;
use App\Models\R3Models\CartPaymentInformation;
use App\Models\R3Models\OrderPayments;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\R3Models\PaymentInformation;

class   OnlineOrderingController extends Controller
{
    public function loginIndex(Request $request)
    {
        return view('onlineOrdering.online_ordering_login');
    }

    public function orderIndex(Request $request)
    {
        $user_carts = $request->user()->addCart;
        $user_carts_count = $user_carts->count();
        $menu = R2Menu::when($request['filter'] !== null, function ($q) use ($request) {
            $q->where('category', $request['filter'])
                ->orWhere('category', 'like', '%' . $request['filter'] . '%')
                ->orWhere('title', 'like', '%' . $request['filter'] . '%');
        })->paginate(12);
        $user = Auth::user();
        return view('onlineOrdering.online_ordering_page', compact('menu', 'user', 'user_carts', 'user_carts_count'));
    }

    public function addToOrders(Request $request, $user_id)
    {
        $user = User::find($user_id);

        $existingItem = $user->addCart()->where('category', $request['category'])
            ->where('title', $request['title'])
            ->first();
        if ($existingItem) {
            Alert::info('Menu has been already added');
            return redirect()->back();
        } else {
            $quantity = 1;
            $add_order = $user->addCart()->create([
                'acc_id' => $user->id,
                'email' => $user->email,
                'category' => $request['category'],
                'title' => $request['title'],
                'price' => $request['price'],
                'images' => $request['images'],
                'quantity' => $quantity
            ]);

            //TO R3 PAYMENT
            $response = Http::post('http://192.168.101.75:8000/api/user-carts', [
                'user_id' => $user->id,
                'email' => $user->email,
                'category' => $request['category'],
                'title' => $request['title'],
                'price' => $request['price'],
                'images' => $request['images'],
                'quantity' => $quantity
            ]);

            Alert::success('Menu added to orders');
            return redirect()->back();
        }
    }

    public function deleteItem($id)
    {
        $cart = OnlineOrderingCart::where('id', $id)->first();



        if ($cart) {
            $cart->delete();
            //TO R3 PAYMENT
            Http::post('http://192.168.101.75:8000/api/delete-item-cart', [
                'id' => $id
            ]);
        }


        Alert::success('Item has been remove');
        return redirect()->back();
    }

    public function checkoutCart(Request $request)
    {
        $title = $request['title'];
        $category = $request['category'];
        $images = $request['image'];
        $quantity = $request['quantity'];
        $price = $request['price'];

        //TO R3 PAYMENT
        $response = Http::post('http://192.168.101.75:8000/checkoutCart', [
            'title' => $request['title'],
            'category' => $request['category'],
            'images' => $request['image'],
            'quantity' => $request['quantity'],
            'price' => $request['price'],
        ]);

        if ($response) {
            return redirect('http://192.168.101.75:8000/payment-gateway');
        }
    }


    public function myOrders(Request $request)
    {
        $user_carts = $request->user()->addCart;
        $user_carts_count = $user_carts->count();
        $user = Auth::user();

        //FROM R3 PAYMENT
        $ordersResponse = Http::get('http://192.168.101.75:8000/api/all-orders');
        $orders_result = $ordersResponse->json();

        $email = $user->email;

        $orders = array_filter($orders_result, function ($order) use ($email) {
            return $order['customer_email'] === $email;
        });

        // If you want to include the cart_payments in the filtered result
        $orders = array_map(function ($order) {
            //$filteredCartPayments = array_filter($order['cart_payments'], function ($payment) {
           //     return $payment['status'] === 'Paid'; // Filter by payment status if needed
           // });
            $order['cart_payments'];
            return $order;
        }, $orders);


        return view('orderPayments.orderPaymentIndex', compact(
            'orders',
            'user_carts_count',
            'user_carts'
        ));
    }

    public function reviewOrders($id)
    {
        $cart = OnlineOrderingCart::where('acc_id', $id)->get();
        $user = User::find($id);
        $date = Carbon::now()->toDateString();
        return view('onlineOrdering.review-orders', compact('cart', 'user', 'date'));
    }

    public function updateQuantity(Request $request, $id)
    {
        $quantity = $request['quantity'];

        foreach ($quantity as $id => $quantities) {
            $item = OnlineOrderingCart::find($id);
            if ($item) {
                $item->quantity = $quantities;
                $item->save();
            }
        }

        //TO R3 PAYMENT
        Http::post('http://192.168.101.75:8000/api/update-quantity', [
            'quantity' => $request['quantity'],
            'id' => $id,
        ]);

        return redirect()->back();
    }
}
