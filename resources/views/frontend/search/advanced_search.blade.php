<ul>

    @foreach ($products as $product)
        <li> <img src="{{ asset('uploads/p_image/'.$product->p_image) }}" alt="" style="height:30px;width:30px" > {{ $product->p_name_eng }}</li>
    @endforeach

</ul>
