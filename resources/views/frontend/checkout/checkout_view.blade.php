@extends('frontend.master_frontend')



@section('page_header')
    Admin | Checkout
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection


@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->


    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 guest-login">
                                            <h2 class="checkout-subtitle"><strong>Shipping Address</strong></h2>

                                            <!-- checkout-form  -->
                                     <form class="register-form" role="form" action="{{ route('checkout.store') }}" method="POST">
                                            @csrf
                                        <div class="form-group">
                                            <label class="info-title" >Shipping Name<span>*</span></label>
                                            <input type="text" name="shipping_name" value="{{ Auth::user()->name }}" class="form-control unicase-form-control text-input" placeholder="">
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title" >Shipping Email<span>*</span></label>
                                            <input type="text" name="shipping_email" value="{{ Auth::user()->email }}" class="form-control unicase-form-control text-input" placeholder="">
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title" >Shipping mobile<span>*</span></label>
                                            <input type="text" name="shipping_mobile" class="form-control unicase-form-control text-input" placeholder="">
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title" >Post Code<span>*</span></label>
                                            <input type="text" name="post_code" class="form-control unicase-form-control text-input" placeholder="">
                                        </div>

                                        </div>
                                        <!-- guest-login -->

                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">

                                                    <div class="form-group">
                                                        <label class="info-title" >Select Division<span>*</span></label>
                                                        <select name="division_id" class="form-control" >
                                                            <option value="">-Select Division-</option>
                                                            @foreach ($divisions as $division)
                                                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                                            @endforeach
                                                        </select>
                                                      </div>

                                                      <div class="form-group">
                                                        <label class="info-title" >Select District<span>*</span></label>
                                                        <select name="district_id" id="district_id" class="form-control" >
                                                            <option value="">-Select District-</option>
                                                        </select>
                                                      </div>

                                                      <div class="form-group">
                                                        <label class="info-title" >Select State<span>*</span></label>
                                                        <select name="state_id" id="state_id" class="form-control" >
                                                            <option value="">-Select state-</option>
                                                        </select>
                                                      </div>

                                                      <div class="form-group">
                                                        <label class="info-title" >Notes<span>*</span></label>
                                                        <textarea name="notes" class="form-control" id="" cols="30" rows="5"></textarea>
                                                    </div>
                                        <!-- already-registered-login -->

                                    </div>
                                </div>
                            </div>

                        <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- checkout-step-01  -->

                    </div><!-- /.checkout-steps -->
                </div>

            <div class="col-md-4">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">

                                     @foreach ($carts as $item)
                                       <i>
                                        <strong> Image: </strong>
                                         <img src="{{ asset('uploads/p_image')}}/{{ $item->options->image }}" alt="" style="width:50px; height:50px" >
                                       </i><br>

                                       <i>
                                        ( <strong> Qty: </strong>
                                        {{ $item->qty }} )
                                       </i><br>

                                       <i>
                                        <strong> Color: </strong>
                                        {{ $item->options->color }}
                                       </i><br>

                                       <i>
                                        <strong> size: </strong>
                                        {{ $item->options->size }}
                                       </i><br>
                                      @endforeach
                                        <li>

                                        @if(Session::has('coupon'))

                                        <strong> Subtotal: </strong> ${{ $cartTotal }}<br>
                                        <strong> Coupon Name: </strong> ${{ session()->get('coupon')['coupon_name'] }}<br>
                                        <strong> Discount: </strong> {{ session()->get('coupon')['coupon_discount'] }}%<br>
                                        <strong> Discount Amount: </strong> ${{ session()->get('coupon')['discount_amount'] }}<br>
                                        <strong> GrandTotal: </strong> ${{ session()->get('coupon')['total_amount'] }}<br>

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

             <div class="col-md-4">
                <div class="checkout-progress-sidebar ">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">Payment Method</h4>
                            </div>
                            <div class="">
                                <ul class="nav nav-checkout-progress list-unstyled">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="my-1">Stripe</label>
                                            <input type="radio" name="payment_method" value="stripe">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="my-1">Card</label>
                                            <input type="radio" name="payment_method" value="card" >
                                        </div>

                                        <div class="col-md-4">
                                            <label class="my-1">Cash</label>
                                            <input type="radio" name="payment_method" value="cash" >
                                        </div>


                                        <button type="submit"
                                        class="btn-upper btn btn-primary checkout-page-button" style="margin-top:12px;margin-left:10px" >Proced To Payment</button>

                                    </div>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
         </div>

        </form>
        </div>



        </div>
    </div>
@endsection


@section('footer_script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="division_id"]').on('change', function(){
                var division_id = $(this).val();

                if(division_id){

                    $.ajax({
                        type:"GET",
                        dataType:"json",
                        url:"{{ url('division_to_district') }}/"+division_id,
                        success:function(data){
                            $('select[name="state_id"]').empty();
                            $('select[name="district_id"]').empty();
                            $('select[name="district_id"]').append('<option value="">-Select state-</option>');
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">'+ value.district_name +'</option>');
                            });
                        }
                    });
                }

            });
        });

    </script>

    <script>
        $(document).ready( function(){
            $('select[name="district_id"]').on('change', function(){
                    var district_id = $(this).val();

                   if(district_id){

                    $.ajax({
                        type:"GET",
                        url:"{{ url('district_to_state') }}/"+district_id,
                        dataType:"json",
                        success:function(data){

                            $('select[name="state_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="state_id"]').append('<option value="'+ value.id +'">'+ value.state_name +'</option>');
                            });

                        },
                    });

                   }
            });
        });
    </script>

@endsection
