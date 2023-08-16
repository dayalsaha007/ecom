@extends('frontend.master_frontend')


@section('page_header')
    Ecommerce | Order
@endsection



@section('content')
    <div class="body-container">

        <div class="container" style="padding: 50px 25px;">
            <div class="row">


         @include('frontend.common.frontend_dashboard_sidebar')

                <div class="col-md-1">

                </div>


                @php
                    $user = App\Models\User::find(Auth::user()->id);
                @endphp

                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hovered" >
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Payment</th>
                                        <th>Invoice</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_date }}</td>
                                            <td>{{ $order->amount }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ $order->invoice_no }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>

                                        <span  class="badge badge-pill "> {{ $order->status }}</span>


                                            </td>
                                            <td>
                            <a href="{{ route('order_details', $order->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>

                                                <a href="{{ route('invoice_download', $order->id) }}" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-download" ></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>

        </div>

    </div>
@endsection


@section('footer_script')
    <script>

        @if (Session::has('up_w_n'))
            toastr.success("{{ Session::get('up_w_n') }}")
        @endif

    </script>
@endsection
