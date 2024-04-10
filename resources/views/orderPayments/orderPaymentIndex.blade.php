@extends('layouts.onlineOrderLayout.onlineOrderingIndex')

@section('content')
@section('title', 'My Orders')
<script defer src="/assets/js/apexcharts.js"></script>
<div class="m-20 mt-14">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ url('orders/restaurant-ordering') }}" class="text-primary hover:underline">Anaa Hotel and Restaurant</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>My Orders</span>
        </li>
    </ul>
    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-6 text-white">
        <!-- Users Visit -->
        <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
            <div class="flex justify-between">
                <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Orders</div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> </div>
                <div class="badge bg-white/30">Today's Order </div>
            </div>
            <div class="flex items-center font-semibold mt-5">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                    <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                </svg>
                Total Orders
            </div>
        </div>

        <!-- Sessions -->
        <div class="panel bg-gradient-to-r from-violet-500 to-violet-400">
            <div class="flex justify-between">
                <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Orders Paid</div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> </div>
            </div>
            <div class="flex items-center font-semibold mt-5">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                    <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                </svg>
                Total Orders Paid
            </div>
        </div>

        <!-- Time On-Site -->
        <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
            <div class="flex justify-between">
                <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Total Spend</div>

            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"><i class="fa-solid fa-peso-sign"></i> </div>
                <div class="badge bg-white/30">+ </div>
            </div>

        </div>
        <!-- Time On-Site -->
        <div class="panel bg-gradient-to-r from-red-500 to-red-400">
            <div class="flex justify-between">
                <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Pending Orders</div>

            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> </div>

            </div>
            <div class="flex items-center font-semibold mt-5">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                    <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                </svg>
                Total Completed
            </div>
        </div>
    </div>
    <div class="panel mt-10">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Invoice Number</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name</th>

                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Payment Method</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Payment Status</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Room Number</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($orders as $order)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$order['invoice_no']}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$order['customer_name']}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$order['payment_method']}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        @if($order['payment_status'] == 'Paid')
                                        <span class="badge bg-success">{{$order['payment_status']}}</span>
                                        @else
                                        <span class="badge bg-danger">{{$order['payment_status']}}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$order['room_no']}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        @if($order['status'] == 'Paid')
                                        <span class="badge bg-success">{{$order['status']}}</span>
                                        @elseif($order['status'] == 'On Delivery')
                                        <span class="badge bg-warning">{{$order['status']}}</span>
                                        @else
                                        <span class="badge bg-danger">{{$order['status']}}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">

                                        <div x-data="{ open{{$order['id']}}: false }">
                                            <div class="flex items-center justify-center">
                                                <button type="button" class="btn btn-primary" @click="open{{$order['id']}} = true">View Orders</button>
                                            </div>

                                            <!-- Modal -->
                                            <div x-show="open{{$order['id']}}" class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto">
                                                <div class="flex items-start justify-center min-h-screen px-4" @click.self="open{{$order['id']}} = false">
                                                    <div x-show="open{{$order['id']}}" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden my-8  w-full max-w-5xl">
                                                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                            <div class="font-bold text-lg">Your Orders</div>
                                                            <button type="button" class="text-white-dark hover:text-dark" @click="open{{$order['id']}} = false">Close</button>
                                                        </div>
                                                        <div class="p-5">
                                                            <!-- Modal content here -->
                                                            <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                                                <div class="panel mt-10">
                                                                    <div class="flex flex-col">
                                                                        <div class="-m-1.5 overflow-x-auto">
                                                                            <div class="p-1.5 min-w-full inline-block align-middle">
                                                                                <div class="overflow-hidden">
                                                                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Item</th>
                                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Category</th>
                                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Total Price</th>
                                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Payment Status</th>
                                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Ordered Date</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                                                       
                                                                                            @foreach($order['cart_payments'] as $payment)
                                                                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$payment['item_name']}}</td>
                                                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$payment['category']}}</td>
                                                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$payment['quantity']}}</td>
                                                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><i class="fa-solid fa-peso-sign"></i> {{$payment['total_price']}}</td>
                                                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                                                                    @if($payment['status'] == 'Paid')
                                                                                                    <span class="badge bg-success">{{$payment['status']}}</span>
                                                                                                    @else
                                                                                                    <span class="badge bg-danger">{{$payment['status']}}</span>
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{\Carbon\Carbon::parse($payment['created_at'])->format('m-d-Y H:i:s')}}</td>
                                                                                            </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-6">
                                                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex justify-end items-center mt-8">
                                                                <button type="button" class="btn btn-outline-danger" @click="open{{$order['id']}} = false">Discard</button>
                                                                <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4" @click="open{{$order['id']}} = false">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6">
          
        </div>
    </div>


</div>
</div>

@endsection