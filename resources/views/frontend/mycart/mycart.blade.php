@extends('frontend.master_frontend')


@section('page_header')
    Ecommerce - Mycart
@endsection


@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Mycart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="cart-description item">Image</th>
                        <th class="cart-product-name item">Product Name</th>
                        <th class="cart-sub-total item">Size</th>
                        <th class="cart-sub-total item">Color</th>
                        <th class="cart-qty item">Quantity</th>
                        <th class="cart-sub-total item">Subtotal</th>
                        <th class="cart-romove item">Remove</th>
                    </tr>
                </thead><!-- /thead -->
			<tbody id="mycart">

			</tbody>
		</table>
	</div>
</div>


<div class="col-md-2 col-sm-12 estimate-ship-tax"></div>

<!---Coupon code start---->
<div class="col-md-5 col-sm-12 estimate-ship-tax">


        @if(Session::has('coupon'))


        @else
        <table class="table" id="couponField">
            <thead>
                <tr>
                    <th>
                        <span class="estimate-title">Coupon Code</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                    <input type="text" id="coupon_name" class="form-control unicase-form-control text-input" id="coupon_name" >
                            </div>
                            <div class="clearfix pull-right">
                                <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()" >APPLY COUPON</button>
                            </div>
                        </td>
                    </tr>
            </tbody><!-- /tbody -->
        </table><!-- /table -->
        @endif



</div><!-- /.estimate-ship-tax -->

<!---Coupon code close---->

<!---Checkout Filed Started---->
<div class="col-md-5 col-sm-12 cart-shopping-total">
    <table class="table">
        <thead id="couponCalField">

        </thead><!-- /thead -->
        <tbody>
                <tr>
                    <td>
                        <div class="cart-checkout-btn pull-right">
             <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                        </div>
                    </td>
                </tr>
        </tbody><!-- /tbody -->
    </table><!-- /table -->
</div><!-- /.cart-shopping-total -->
<!---Checkout Filed Started---->



</div><!-- /.row -->





</div>
</div><!-- /.sigin-in-->

@include('frontend.brand_carosel')

@endsection



@section('footer_script')

@endsection
