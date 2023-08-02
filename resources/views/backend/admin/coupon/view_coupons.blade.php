@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - Coupon
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Coupons List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>Coupon Name</th>
                                <th>Discount</th>
                                <th>Validity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->coupon_name }}</td>
                                    <td>{{ $coupon->coupon_discount }}</td>
                                    <td>{{  Carbon\Carbon::parse($coupon->coupon_validity)->format('D, d F y') }} </td>
                                    <td>

                         @if($coupon->coupon_validity >= Carbon\Carbon::now())
                            <span class="badge badge-pill badge-success">Valid</span>
                             @else
                                 <span class="badge badge-pill badge-danger">Invalid</span>
                                @endif

                                    </td>
                                    <td>
                            <a href="{{ route('edit_coupon', $coupon->id) }}" class="btn btn-sm btn-info"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                            <a href="{{ route('del_coupon', $coupon->id) }}" id="delete" class="btn btn-sm btn-danger"><i
                                            class="fa fa-ban" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add Coupon</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('coupon_store') }}" method="POST">
                        @csrf
                        <label class="my-1">Coupon Name</label>
                        <input type="text" name="coupon_name" class="form-control">

                        <label class="my-1">Coupon Discount</label>
                        <input type="text" name="coupon_discount" class="form-control">

                        <label class="my-1">Coupon Validity</label>
                        <input type="date" name="coupon_validity" class="form-control">

                        <button type="submit" class="btn btn-sm btn-primary mt-2">Add Coupon</button>

                    </form>
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

    @if (Session::has('sc'))
    toastr.success("{{ Session::get('sc') }}");
    @endif

    @if (Session::has('cd'))
    toastr.success("{{ Session::get('cd') }}");
    @endif

</script>

@endsection
