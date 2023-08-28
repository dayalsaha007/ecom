@extends('backend.master_dashboard')



@section('page_header')
    Admin | Report By Search
@endsection

@section('content')



<div class="container">


    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4>Admin Return Orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Invoice</th>
                                <th>Amount</th>
                                <th>Payment</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->invoice_no }}</td>
                                    <td> {{ $order->amount }}</td>
                                    <td> {{ $order->payment_method }} </td>
                                    <td> <span class="badge badge-pill badge-info" >{{ $order->status }} </span></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')
    <script>
        $(document).ready(function(){
            $('#example').DataTable();
        });
    </script>

    <script>
        $(document).ready(function(){
            @if(Session::has('rosc'))
                toastr.success("{{ Session::get('rosc') }}");
            @endif
        });
    </script>

@endsection

