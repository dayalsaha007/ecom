@extends('frontend.master_frontend')



@section('page_header')
    Ecommerce Admin - {{ $blog->post_title_eng }}
@endsection


@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>{{ $blog->post_title_eng }}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row ">
			<div class="blog-page" >
				<div class="col-md-9 ">
					<div class="blog-post wow fadeInUp" style="margin-bottom:20px;">
	<img class="img-responsive" src="{{ asset('uploads/blog') }}/{{ $blog->post_image }}" alt="">
	<h1>{{ $blog->post_title_eng }}</h1>
	<span class="date-time">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
	<p>
        @if (session()->get('language') == 'hindi')
            {!! $blog->post_details_hin !!}
            @else
            {!! $blog->post_details_eng !!}
            @endif
    </p>
	<div class="social-media">
		<span>share post:</span>
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href=""><i class="fa fa-rss"></i></a>
		<a href="" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
	</div>
</div>


				</div>
				<div class="col-md-3 sidebar">



					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
    <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>
        </div>
    </form>
</div>

<div class="home-banner outer-top-n outer-bottom-xs">
<img src="{{ asset('frontend_assets/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
</div>
				<!-- ==============================================CATEGORY============================================== -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Category</h3>
	<div class="sidebar-widget-body m-t-10">
        <ul class="list-group">
           @foreach ($blog_category as $blog_cat)
             <span class="list-group-item"><a href="{{ url('cat_wise_post/'.$blog_cat->id.'/'.$blog_cat->bc_slug_eng ) }}">{{ $blog_cat->bc_name_eng }}</a></span>
           @endforeach
          </ul>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
	<!-- ============================================== CATEGORY : END ============================================== -->

						<!-- ============================================== PRODUCT TAGS ============================================== -->

<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
