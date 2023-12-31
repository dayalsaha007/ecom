@extends('frontend.master_frontend')


@section('page_header')
    Ecommerce - Subcategory Products
@endsection


@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="#">Home</a></li>
          <li class='active'>Handbags</li>
        </ul>
      </div>
      <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.breadcrumb -->
  <div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-md-3 sidebar'>
          <!-- ================================== TOP NAVIGATION ================================== -->
          @include('frontend.category_menu')
          <!-- /.side-menu -->
          <!-- ================================== TOP NAVIGATION : END ================================== -->
          <div class="sidebar-module-container">
            <div class="sidebar-filter">


            @include('frontend.product_filter')

              <!-- ============================================== PRODUCT TAGS ============================================== -->
              @include('frontend.tag_view')
              <!-- /.sidebar-widget -->
            <!----------- Testimonials------------->
              @include('frontend.testimonial')

              <!-- ============================================== Testimonials: END ============================================== -->

        <div class="home-banner"> <img src="{{ asset('frontend_assets') }}/assets/images/banners/LHS-banner.jpg" alt="Image""> </div>
            </div>
            <!-- /.sidebar-filter -->
          </div>
          <!-- /.sidebar-module-container -->
        </div>
        <!-- /.sidebar -->
        <div class='col-md-9'>
          <!-- ========================================== SECTION – HERO ========================================= -->

          <div id="category" class="category-carousel hidden-xs">
            <div class="item">
              <div class="image"> <img src="{{ asset('frontend_assets/assets/images/banners/cat-banner-1.jpg') }}" alt="" class="img-responsive"> </div>
              <div class="container-fluid">
                <div class="caption vertical-top text-left">
                  <div class="big-text"> Big Sale </div>
                  <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                  <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                </div>
                <!-- /.caption -->
              </div>
              <!-- /.container-fluid -->
            </div>
          </div>


          <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-2">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                  </ul>
                </div>
                <!-- /.filter-tabs -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-12 col-md-6">
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">position</a></li>
                          <li role="presentation"><a href="#">Price:Lowest first</a></li>
                          <li role="presentation"><a href="#">Price:HIghest first</a></li>
                          <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld -->
                  </div>
                  <!-- /.lbl-cnt -->
                </div>
                <!-- /.col -->
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Show</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">1</a></li>
                          <li role="presentation"><a href="#">2</a></li>
                          <li role="presentation"><a href="#">3</a></li>
                          <li role="presentation"><a href="#">4</a></li>
                          <li role="presentation"><a href="#">5</a></li>
                          <li role="presentation"><a href="#">6</a></li>
                          <li role="presentation"><a href="#">7</a></li>
                          <li role="presentation"><a href="#">8</a></li>
                          <li role="presentation"><a href="#">9</a></li>
                          <li role="presentation"><a href="#">10</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld -->
                  </div>
                  <!-- /.lbl-cnt -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-6 col-md-4 text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                  </ul>
                  <!-- /.list-inline -->
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product"  id="grid_view_product">
                  <div class="row">

                    @include('frontend.grid_view_product')


                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.category-product -->

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane "  id="list-container">

                <div class="category-product" id="list_view_product">

                    @include('frontend.list_view_product')

                </div>
                <!-- /.category-product -->


              </div>
              <!-- /.tab-pane #list-container -->
            </div>
            <!-- /.tab-content -->


            <div class="clearfix filters-container">
              <div class="text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                  </ul>
                  <!-- /.list-inline -->
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.text-right -->

            </div>
            <!-- /.filters-container -->

          </div>
          <!-- /.search-result-container -->

        </div>
        <!-- /.col -->


            <div class="ajax-loadmore-product text-center" style="display: none">
                <img src="{{ asset('uploads/Eclipse-1s-200px.svg') }}" alt="" style="width:120px; height:120px" >
            </div>

      </div>
      <!-- /.row -->

    </div>
</div>



@include('frontend.brand_carosel')

@endsection




@section('footer_script')

    <script>
        function loadMoreProduct(){
            $.ajax({
                url: "?page="+page,
                type: "GET",
                dataType: "json",
                beforeSend:function(response){
                    $('ajax-loadmore-product').show();
                }
            });

            .done(function(data){
                if(data.grid_view == " " || data.list_view == " " ){
                    return;
                }
                $('ajax-loadmore-product').hide();
                $('#grid_view_product').append(data.grid_view);
                $('#list_view_product').append(data.list_view);
            })

            .fail(function(){
                alert('something went wrong');
            })

        }

        var page = 1;

        $(window).scroll(function(){
            if($(window).scrollTop() + $(window).height() >= $(document).height()){
                page++;
                loadMoreProduct();
            }
        });


    </script>

@endsection
