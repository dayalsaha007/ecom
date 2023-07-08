@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - View Product
@endsection

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>All Product</h4></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Image</th>
                                                <th>name</th>
                                                <th>Price</th>
                                                <th>Discount Price</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                                @foreach ($products as $all=>$product)
                                                    <tr>
                                                        <td>{{ $all+1 }}</td>
                                                        <td>
                            <img  width="20" src="{{ asset('uploads/p_image') }}/{{ $product->p_image }}" alt="">
                                                        </td>
                                                        <td>{{ $product->p_name_eng }}</td>
                                                         <td width="10%">{{ $product->selling_price }} ৳</td>
                                                        <td>

                                                            @if ($product->discount_price ==  '')
                                                            <span class="badge badge-pill badge-danger">No discount</span>
                                                            @else
                                                            @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ($amount/$product->selling_price) * 100;
                                                            @endphp
                                                            <span class="badge badge-pill badge-success">{{  round($discount) }}%</span>
                                                            @endif

                                                        </td>
                                                        <td>{{ $product->p_qty }}</td>
                                                        <td>
                                                            @if ($product->status == 1)
                                                            <span class="badge badge-pill badge-success">Active</span>
                                                            @else
                                                            <span class="badge badge-pill badge-danger">InActive</span>
                                                            @endif
                                                        </td>

                                                        <td width="20%">
             <a href="{{ route('edit_product', $product->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i></a>

                <a href="{{ route('delete_p', $product->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-ban" ></i></a>

                                @if ($product->status == 1)
                                <a href="{{ route('deactice_p', $product->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-o-down"></i></a>
                                @else
                                <a href="{{ route('active_p', $product->id) }}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-o-up"></i></a>
                                @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('footer_script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <script>
        @if (Session::has('up'))
            toastr.success("{{ Session::get('up') }}")
        @endif

        @if (Session::has('ap'))
        toastr.success("{{ Session::get('ap') }}")
         @endif
    </script>

@endsection
