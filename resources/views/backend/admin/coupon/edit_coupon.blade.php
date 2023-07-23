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
                    <form action="{{ route('update_coupon') }}" method="POST">
                        @csrf

                        <input type="hidden" name="coupon_id" value="{{ $coupons->id }}" >

                        <label class="my-1">Coupon Name</label>
                        <input type="text" name="coupon_name" value="{{ $coupons->coupon_name }}" class="form-control">

                        <label class="my-1">Coupon Discount</label>
                        <input type="text" name="coupon_discount" value="{{ $coupons->coupon_discount }}"% class="form-control">

                        <label class="my-1">Coupon Validity</label>
                        <input type="date" name="coupon_validity" value="{{ $coupons->coupon_validity }}" class="form-control">

                        <button type="submit" class="btn btn-sm btn-primary mt-2">update Coupon</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
