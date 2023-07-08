@php
    $tag_en = App\Models\Product::groupBy('p_tags_eng')
        ->select('p_tags_eng')
        ->get();
    $tag_hin = App\Models\Product::groupBy('p_tags_hin')
        ->select('p_tags_hin')
        ->get();

@endphp

<div class="sidebar-widget product-tag wow fadeInUp" style="margin:15px 0px">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">

            @if (session()->get('language') == 'hindi')
                @foreach ($tag_hin as $tag)
                    <a class="item active" title="Vest" href="{{ url('/product/tag/'.$tag->p_tags_hin) }}">{{ str_replace(',', ' ', $tag->p_tags_hin) }}</a>
                @endforeach
            @else
                @foreach ($tag_en as $tag)
                    <a class="item active" title="Vest" href="{{ url('/product/tag/'.$tag->p_tags_eng) }}">{{ str_replace(',', ' ', $tag->p_tags_eng) }}</a>
                @endforeach
            @endif

        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
