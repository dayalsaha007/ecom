@extends('frontend.master_frontend')


@section('page_header')
    Ecommerce | Order
@endsection



@section('content')
    <div class="body-container">

        <div class="container" style="padding: 50px 25px;">
            <div class="row">


         @include('frontend.common.frontend_dashboard_sidebar')

                <div class="col-md-2">

                </div>


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Shipping Details</h4>
                        </div>
                        <div class="card-body">
                            <span><b>Name:</b>  {{ $orders->name }} </span></br></br>
                            <span><b>Shipping Phone:</b>  {{ $orders->phone }} </span></br></br>
                            <span>  <b>Shipping Email:</b>  {{ $orders->email }} </span></br></br>
                        <span><b>Division:</b>  {{ $orders['order_to_division']['division_name'] }} </span></br></br>
                            <span><b>District:</b>  {{ $orders['order_to_district']['district_name'] }} </span></br></br>
                            <span><b>State:</b>  {{ $orders['order_to_state']['state_name'] }} </span></br></br>
                            <span><b>Post code:</b>  {{ $orders->post_code }} </span></br></br>
                            <span><b>Order date:</b>  {{ $orders->order_date }} </span></br></br>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                    <div class="card-header">
                        <h4>Order Details: {{ $orders->invoice_no }}</h4>
                    </div>
                    <div class="card-body">
                        <span><b>Name:</b>  {{ $orders->name }} </span></br></br>
                        <span><b>Shipping Phone:</b>  {{ $orders->phone }} </span></br></br>
                        <span><b>Shipping Phone:</b>  {{ $orders->payment_method }} </span></br></br>
                        <span><b>Tranx Id:</b>  {{ $orders->transaction_id }} </span></br></br>
                        <span><b>Invoice:</b>  {{ $orders->invoice_no }} </span></br></br>
                    </div>

                </div>


        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Items</h4>
                    </div>
                    <div class="card-body">
                            <table class="table table-striped stable-bordered" >
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Product Code </th>
                                        <th>Color </th>
                                        <th>Size</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($order_items as $order_item)
                                      <tr>
                                          <th>
                                        <img width="50px;" src="{{ asset('uploads/p_image') }}/{{ $order_item['order_item_to_product']['p_image'] }}" alt="">
                                          </th>
                                          <th>{{ $order_item['order_item_to_product']['p_name_eng'] }}</th>
                                          <th>{{ $order_item['order_item_to_product']['p_code'] }} </th>
                                          <th>{{ $order_item->color }} </th>
                                          <th>{{ $order_item->size }} </th>
                                          <th>{{ $order_item->qty }}</th>
                                          <th>${{ $order_item->price * $order_item->qty }}</th>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>

                            @if($orders->status !== "delivered")

                            @else

                                    @php
                                        $order = App\Models\Order::where('id', $orders->id)->where('return_reason','=',NULL)->first();
                                        // dd($order);
                                    @endphp

                                @if($order)
                                    <form action="{{ route('return_order', $order->id) }}" method="POST" >
                                        @csrf
                                        <label>Order Return Reasone</label>
                                        <textarea name="return_reason" id="" class="form-control" cols="30" rows="5"></textarea>
                                        <button  type="submit" class="btn btn-info"  style="margin:10px" >Return Order</button>
                                    </form>

                                @else
                                    <span class="badge badge-pill badge-warning" style="background:red">You have send return request For this Product {{ $order }}</span>

                                @endif
                            @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


