<x-app-layout>
    <div class="panel">
        <form action="" method="GET" class="flex items-center">
            <dd class="font-medium text-gray-800 dark:text-gray-200 mr-2">
                <div x-data="{ isOptionSelected: false }" class="relative dark:bg-form-input">
                    <select name="filter_status" class="form-select text-white-dark w-[25vh]">
                        <option selected disabled>Select Status</option>
                        <option class="text-black dark:text-white-dark" {{Request::get('filter_status')=='Pending' ? 'selected'
                                    :''}}>Pending
                        </option>
                        <option class="text-black dark:text-white-dark" {{Request::get('filter_status')=='On-Delivery'
                                    ? 'selected' :''}} value="On Delivery">On Delivery</option>
                    </select>
                </div>
            </dd>
            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter mr-2" viewBox="0 0 16 16">
                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                </svg>
                Filter
            </button>
        </form>

        <div class="table-responsive mt-6">
            <table>
                <thead>
                    <tr>
                        <th>Invoice Number</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                        <th>Room Number</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($active_orders as $order)
                    <tr>
                        <td>{{$order->invoice_no}}</td>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->customer_email}}</td>
                        <td>{{$order->payment_method}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->room_no}}</td>
                        <td>
                            @if($order->status == 'Pending')
                                <span class="badge bg-danger">{{$order->status}}</span>
                                @else
                                <span class="badge bg-warning">{{$order->status}}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{$active_orders->links()}}
        </div>                    
    </div>
</x-app-layout>