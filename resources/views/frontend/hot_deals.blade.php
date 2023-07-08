<!-- ============================================== HOT DEALS ============================================== -->

@php
$hot_product =  App\Models\Product::where('status', 1)->where('hot_deals', 1)->limit(3)->get();
@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
	<h3 class="section-title">hot deals</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">

        @foreach ($hot_product as $hot_p)
				<div class="item">
                        <div class="products">
                        						<div class="hot-deal-wrapper">
                        							<div class="image">
                        					<img src="{{ asset('uploads/p_image') }}/{{ $hot_p->p_image }}" alt="">
                        							</div>

                                                    @php
                                    $amount = $hot_p->selling_price - $hot_p->discount_price;
                                    $discount = ($amount/$hot_p->selling_price)*100;
                                                    @endphp

                                                    @if($hot_p->discount_price == null)
                                     <div class="sale-offer-tag"><span>new</span></div>
                                                    @else
                                    <div class="sale-offer-tag"><span>{{ round($discount) }}%<br>off</span></div>
                                                    @endif

                        						</div><!-- /.hot-deal-wrapper -->

                        						<div class="product-info text-left m-t-20">
                        							<h3 class="name"><a href=""></a></h3>
                        							<div class="rating rateit-small"></div>

                        							<div class="product-price">
                        								@if($hot_p->discount_price == null)
                                                        <span class="price">${{ $hot_p->selling_price}}
                                                        @else
                        <span class="price">${{ $hot_p->discount_price }}</span><span class="price-before-discount">${{ $hot_p->selling_price }}</span>
                                                        @endif

                        							</div><!-- /.product-price -->

                        						</div><!-- /.product-info -->

                        						<div class="cart clearfix animate-effect">
                        							<div class="action">

                        								<div class="add-cart-button btn-group">
                        									<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                        										<i class="fa fa-shopping-cart"></i>
                        									</button>
                        									<button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                        								</div>

                        							</div><!-- /.action -->
                        						</div><!-- /.cart -->
                        					</div>
					                    </div>
                                    @endforeach



    </div><!-- /.sidebar-widget -->
</div>
<!-- ============================================== HOT DEALS: END ============================================== -->
