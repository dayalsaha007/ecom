@foreach ($products as $product)
<div class="col-sm-6 col-md-4 wow fadeInUp">
  <div class="products">
    <div class="product">
      <div class="product-image">
        <div class="image"> <a href="{{ url('product/detail/'.$product->id.'/'.$product->p_slug_eng) }}"><img  src="{{ asset('uploads/p_image') }}/{{ $product->p_image }}" alt=""></a> </div>
        <!-- /.image -->

        @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price)*100;
        @endphp

        @if ($product->discount_price == NULL)
        <div class="tag new"><span>new</span></div>
        @else
        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
        @endif

      </div>
      <!-- /.product-image -->

      <div class="product-info text-left">
        <h3 class="name"><a href="{{ url('product/detail/'.$product->id.'/'.$product->p_slug_eng) }}">
{{ session()->get('language') == 'hindi'?$product->p_name_hin:$product->p_name_eng }}
       </a></h3>
        <div class="rating rateit-small"></div>
        <div class="description"></div>
        <div class="product-price">
           @if ($product->discount_price == NULL)
           <span class="price"> ${{ $product->selling_price }} </span>
          @else
            <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span>
            @endif
        </div>
        <!-- /.product-price -->
   </div>
      <!-- /.product-info -->
      <div class="cart clearfix animate-effect">
        <div class="action">
          <ul class="list-unstyled">
            <li class="add-cart-button btn-group">
              <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>
            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
          </ul>
        </div>
        <!-- /.action -->
      </div>
      <!-- /.cart -->
    </div>
    <!-- /.product -->

  </div>
  <!-- /.products -->
</div>
<!-- /.item -->
@endforeach
