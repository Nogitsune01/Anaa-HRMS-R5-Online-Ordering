<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\H1Model\HotelBooking;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;



class PaymentGatewayController extends Controller
{
    public function payment(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $room = $request['room_no'];
        $start = $request['start'];
        $end = $request['end'];
        $fname = $request['firstname'];
        $lname = $request['lastname'];
        $email = $request['email'];

        $name = $fname . ' ' . $lname;
        $duration = $request['duration'];
        $additional = json_encode($request['services']);
        $price = $request['price'];
        $contact = $request['contact'];
        $room_type = $request['room_type'];


        $total_price = $price * 100;

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'php',
                        'product_data' => [
                            'name' => $room_type,
                        ],
                        'unit_amount' => $total_price,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'customer_email' => $email,
            'success_url' => route('success', [
                'room' => $room,
                'start' => $start,
                'end' => $end,
                'name' => $name,
                'email' => $email,
                'duration' =>  $duration,
                'additional' => $additional,
                'price' => $price,
                'contact' => $contact,
                'room_type' => $room_type,

            ]),
            'cancel_url' => route('cancel')
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        $room = $request->query('room');
        $start = $request->query('start');
        $end = $request->query('end');
        $name = $request->query('name');
        $email = $request->query('email');
        $duration =  $request->query('duration');
        $additional = $request->query('additional');
        $price = $request->query('price');
        $contact = $request->query('contact');
        $room_type = $request->query('room_type');

        $booking = new HotelBooking;

        $code = mt_rand(10000, 99999);
        if ($this->randomCode($code)) {
            $code = mt_rand(10000, 99999);
        }

        $status = 'Paid';

        if ($booking) {
            $create = $booking->create([
                'reserve_code' => $code,
                'room_no' => $room,
                'start_date' => $start,
                'end_date' => $end,
                'name' => $name,
                'email' => $email,
                'duration' => $duration,
                'additional' => $additional,
                'price' => $price,
                'contact' => $contact,
                'room_type' => $room_type,
                'status' => $status
            ]);

            if ($create) {
                Http::post('http://192.168.101.85:8000/api/get-booking-data', [
                    'reserve_code' => $code,
                    'room_no' => $room,
                    'start_date' => $start,
                    'end_date' => $end,
                    'name' => $name,
                    'email' => $email,
                    'duration' => $duration,
                    'additional' => $additional,
                    'price' => $price,
                    'contact' => $contact,
                    'room_type' => $room_type,
                    'status' => $status
                ]);
            }

            Alert::success('Success', 'Your booking has been proccessed');
            return redirect('http://192.168.101.85:8000/home');
        } else {
            return redirect()->back();
        }
    }

    public function randomCode($code)
    {
        return HotelBooking::whereRandomCode($code);
    }

    public function cancel()
    {
        return 'cancelled';
    }
}
