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
</div><!-- /.row -->

</div>
</div><!-- /.sigin-in-->

@include('frontend.brand_carosel')

@endsection



@section('footer_script')

@endsection
