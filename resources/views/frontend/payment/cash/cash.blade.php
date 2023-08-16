@extends('frontend.master_frontend')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



@section('page_header')
    Ecommerce | Cash
@endsection


@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Cash</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="container">
        <div class="checkout-box">
            <div class="row">

                <div class="col-md-6">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Total Shopping Payment</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">

                                        <li>

                                            @if (Session::has('coupon'))
                                                <strong> Subtotal: </strong> ${{ $cartTotal }}<br>
                                                <strong> Coupon Name: </strong>
                                                ${{ session()->get('coupon')['coupon_name'] }}<br>
                                                <strong> Discount: </strong>
                                                {{ session()->get('coupon')['coupon_discount'] }}%<br>
                                                <strong> Discount Amount: </strong>
                                                ${{ session()->get('coupon')['discount_amount'] }}<br>
                                                <strong> GrandTotal: </strong>
                                                ${{ session()->get('coupon')['total_amount'] }}<br>
                                            @else
                                                <br><br>
                                                <strong> Subtotal: </strong> ${{ $cartTotal }}<br><br>
                                                <strong> GrandTotal: </strong> ${{ $cartTotal }}<br>
                                            @endif

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Order Now</h4>
                                </div>
                                <div class="">

                                    <form action="{{ route('cash_order') }}" method="post" id="payment-form">
                                        @csrf
                                        <div class="form-row">
                                            <label for="card-element">

                                <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                <input type="hidden" name="phone" value="{{ $data['shipping_mobile'] }}">
                                <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                <input type="hidden" name="notes" value="{{ $data['notes'] }}">

                                            </label>

                                            <h4>Cash On Delivery</h4>
                                        </div>
                                        <br>
                                        <button class="btn btn-primary">Submit Order</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('footer_script')



@endsection
