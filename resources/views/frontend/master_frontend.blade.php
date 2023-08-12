<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('page_header')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/blue.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/rateit.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/toastr.min.css">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/font-awesome.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        <div class="top-bar animate-dropdown">
            <div class="container">
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">

                            <li><a href="{{ route('wishlist') }}"><i
                                        class="icon fa fa-heart"></i>{{ session()->get('language') == 'hindi' ? 'इच्छा-सूची' : 'Wishlist' }}</a>
                            </li>
                            <li><a href="{{ route('mycart') }}"><i
                                        class="icon fa fa-shopping-cart"></i>{{ session()->get('language') == 'hindi' ? 'मेरी गाड़ी' : 'My Cart' }}</a>
                            </li>
                            <li><a href="{{ route('checkout') }}"><i
                                        class="icon fa fa-check"></i>{{ session()->get('language') == 'hindi' ? 'चेक आउट' : 'Checkout' }}</a>
                            </li>
                            <li>
                                @auth
                                    <a href="{{ route('dashboard') }}"><i
                                            class="icon fa fa-lock"></i>{{ session()->get('language') == 'hindi' ? 'प्रोफ़ाइल' : 'Profile' }}</a>
                                @else
                                    <a href="{{ route('login') }}"><i
                                            class="icon fa fa-lock"></i>{{ session()->get('language') == 'hindi' ? 'लॉग इन/रजिस्टर' : 'Login/Register' }}</a>
                                @endauth
                            </li>

                        </ul>
                    </div>
                    <!-- /.cnt-account -->

                    <div class="cnt-block">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                    data-hover="dropdown" data-toggle="dropdown"><span
                                        class="value">{{ session()->get('language') == 'hindi' ? 'हमडी' : 'USD' }}
                                    </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a
                                            href="#">{{ session()->get('language') == 'hindi' ? 'हमडी' : 'USD' }}</a>
                                    </li>
                                    <li><a
                                            href="#">{{ session()->get('language') == 'hindi' ? 'आईएनआर' : 'INR' }}</a>
                                    </li>
                                    <li><a
                                            href="#">{{ session()->get('language') == 'hindi' ? 'जीबीपी' : 'GBP' }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                    data-hover="dropdown" data-toggle="dropdown"><span class="value">
                                        {{ session()->get('language') == 'hindi' ? 'हिंदी' : 'English' }}

                                    </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    @if (session()->get('language') == 'hindi')
                                        <li><a href="{{ route('english_language') }}">English</a></li>
                                    @else
                                        <li><a href="{{ route('hindi_language') }}">हिंदी</a></li>
                                    @endif

                                </ul>
                            </li>
                        </ul>
                        <!-- /.list-unstyled -->
                    </div>
                    <!-- /.cnt-cart -->
                    <div class="clearfix"></div>
                </div>
                <!-- /.header-top-inner -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.header-top -->
        <!-- ============================================== TOP MENU : END ============================================== -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                        <!-- ============================================================= LOGO ============================================================= -->
                        <div class="logo"> <a href="{{ route('index') }}"> <img
                                    src="{{ asset('frontend_assets') }}/assets/images/logo.png" alt="logo"> </a>
                        </div>
                        <!-- /.logo -->
                        <!-- ============================================================= LOGO : END ============================================================= -->
                    </div>
                    <!-- /.logo-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                        <!-- /.contact-row -->


                        <!-- ============================================================= SEARCH AREA ============================================================= -->
                        <div class="search-area">
                            <form>
                                <div class="control-group">
                                    <ul class="categories-filter animate-dropdown">
                                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                                href="category.html">Categories <b class="caret"></b></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li class="menu-header">Computer</li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Clothing</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Electronics</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Shoes</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                        href="category.html">- Watches</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <input class="search-field" placeholder="Search here..." />
                                    <a class="search-button" href="#"></a>
                                </div>
                            </form>
                        </div>
                        <!-- /.search-area -->

                        <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                    </div>
                    <!-- /.top-search-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                        <!-- == SHOPPING CART DROPDOWN == -->

                        <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                                data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                    <div class="basket-item-count"><span class="count" id="cartqty"></span></div>
                                    <div class="total-price-basket"> <span class="lbl">cart -</span> <span
                                            class="total-price"> <span class="sign">$</span><span class="value"
                                                id="cartTotal"></span> </span> </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>

                                    <!-----Mini cart ajax----->
                                    <div id="miniCart">

                                    </div>
                                    <!-----Mini cart ajax----->

                                    <div class="clearfix cart-total">
                                        <div class="pull-right"> <span class="text">Sub Total :</span>$<span
                                                class='price' id="cartTotal"></span> </div>
                                        <div class="clearfix"></div>
                                        <a href="checkout.html"
                                            class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                    </div>
                                    <!-- /.cart-total-->

                                </li>
                            </ul>
                            <!-- /.dropdown-menu-->
                        </div>
                        <!-- /.dropdown-cart -->

                        <!-- ====== SHOPPING CART DROPDOWN : END=================== -->
                    </div>
                    <!-- /.top-cart-row -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->

        </div>
        <!-- /.main-header -->

        <!-- ============================================== NAVBAR ============================================== -->
        <div class="header-nav animate-dropdown">
            <div class="container">
                <div class="yamm navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div class="nav-bg-class">
                        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                            <div class="nav-outer">
                                <ul class="nav navbar-nav">
                                    <li class="active dropdown yamm-fw"> <a href="" data-hover="dropdown"
                                            class="dropdown-toggle"
                                            data-toggle="dropdown">{{ session()->get('language') == 'hindi' ? 'घर' : 'Home' }}</a>
                                    </li>

                                    @php
                                        $categories = App\Models\Category::orderBy('c_name_eng', 'ASC')->get();
                                    @endphp


                                    @foreach ($categories as $category)
                                        <li class="dropdown yamm mega-menu"> <a href="" data-hover="dropdown"
                                                class="dropdown-toggle"
                                                data-toggle="dropdown">{{ session()->get('language') == 'hindi' ? $category->c_name_hin : $category->c_name_eng }}</a>
                                            <ul class="dropdown-menu container">
                                                <li>
                                                    <div class="yamm-content ">
                                                        <div class="row">
                                                            @php
                                                                $subcategories = App\Models\Subcategory::where('c_id', $category->id)
                                                                    ->orderBy('sc_name_eng', 'ASC')
                                                                    ->get();
                                                            @endphp
                                                            @foreach ($subcategories as $sub_cat)
                                                                <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                    <a
                                                                        href="{{ url('/subcategory/product/'. $sub_cat->id.'/'. $sub_cat->sc_slug_eng) }}">
                                                                        <h2 class="title">
                                                                            {{ session()->get('language') == 'hindi' ? $sub_cat->sc_name_hin : $sub_cat->sc_name_eng }}
                                                                        </h2>
                                                                    </a>
                                                                    @php
                                                                        $subsubcategories = App\Models\Subsubcategory::where('sc_id', $sub_cat->id)
                                                                            ->orderBy('ssc_name_eng', 'ASC')
                                                                            ->get();
                                                                    @endphp

                                                                    @foreach ($subsubcategories as $subsub)
                                                                        <ul class="links">
                                                                            <li><a
                                                                                    href="{{ url('/subsubcategory/product/' . $subsub->id . '/' . $subsub->ssc_slug_eng) }}">{{ session()->get('language') == 'hindi' ? $subsub->ssc_name_hin : $subsub->ssc_name_eng }}</a>
                                                                            </li>
                                                                        </ul>
                                                                    @endforeach
                                                                </div>
                                                                <!-- /.col -->
                                                            @endforeach

                                                            <div
                                                                class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                                <img class="img-responsive"
                                                                    src="{{ asset('frontend_assets') }}/assets/images/banners/top-menu-banner.jpg"
                                                                    alt=""> </div>
                                                            <!-- /.yamm-content -->
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach
                                    <li class="dropdown"> <a href="{{ route('home_blog') }}">Blog</a> </li>
                                </ul>
                                <!-- /.navbar-nav -->
                                <div class="clearfix"></div>
                            </div>
                            <!-- /.nav-outer -->
                        </div>
                        <!-- /.navbar-collapse -->

                    </div>
                    <!-- /.nav-bg-class -->
                </div>
                <!-- /.navbar-default -->
            </div>
            <!-- /.container-class -->

        </div>
        <!-- /.header-nav -->
        <!-- ============================================== NAVBAR : END ============================================== -->

    </header>


    @yield('content')

    <!-- ============================================================= FOOTER ============================================================= -->
    <footer id="footer" class="footer color-bg">
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Contact Us</h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="module-body">
                            <ul class="toggle-footer" style="">
                                <li class="media">
                                    <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                                class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                                    <div class="media-body">
                                        <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                                class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                                    <div class="media-body">
                                        <p>+(888) 123-4567<br>
                                            +(888) 456-7890</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                                class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                    <div class="media-body"> <span><a
                                                href="#">flipmart@themesground.com</a></span> </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.module-body -->
                    </div>
                    <!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Customer Service</h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a href="#" title="Contact us">My Account</a></li>
                                <li><a href="#" title="About us">Order History</a></li>
                                <li><a href="#" title="faq">FAQ</a></li>
                                <li><a href="#" title="Popular Searches">Specials</a></li>
                                <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                            </ul>
                        </div>
                        <!-- /.module-body -->
                    </div>
                    <!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Corporation</h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a title="Your Account" href="#">About us</a></li>
                                <li><a title="Information" href="#">Customer Service</a></li>
                                <li><a title="Addresses" href="#">Company</a></li>
                                <li><a title="Addresses" href="#">Investor Relations</a></li>
                                <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                            </ul>
                        </div>
                        <!-- /.module-body -->
                    </div>
                    <!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Why Choose Us</h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                                <li><a href="#" title="Blog">Blog</a></li>
                                <li><a href="#" title="Company">Company</a></li>
                                <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                                <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- /.module-body -->
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-bar">
            <div class="container">
                <div class="col-xs-12 col-sm-6 no-padding social">
                    <ul class="link">
                        <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="Facebook"></a></li>
                        <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="Twitter"></a></li>
                        <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="GooglePlus"></a></li>
                        <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="RSS"></a></li>
                        <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="PInterest"></a></li>
                        <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="Linkedin"></a></li>
                        <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#"
                                title="Youtube"></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 no-padding">
                    <div class="clearfix payment-methods">
                        <ul>
                            <li><img src="{{ asset('frontend_assets') }}/assets/images/payments/1.png"
                                    alt=""></li>
                            <li><img src="{{ asset('frontend_assets') }}/assets/images/payments/2.png"
                                    alt=""></li>
                            <li><img src="{{ asset('frontend_assets') }}/assets/images/payments/3.png"
                                    alt=""></li>
                            <li><img src="{{ asset('frontend_assets') }}/assets/images/payments/4.png"
                                    alt=""></li>
                            <li><img src="{{ asset('frontend_assets') }}/assets/images/payments/5.png"
                                    alt=""></li>
                        </ul>
                    </div>
                    <!-- /.payment-methods -->
                </div>
            </div>
        </div>
    </footer>
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend_assets') }}/assets/js/jquery-1.11.1.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/echo.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/jquery.easing-1.3.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/bootstrap-slider.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/jquery.rateit.min.js"></script>
    <script type="{{ asset('frontend_assets') }}/text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/scripts.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/toastr.min.js"></script>
    <!--sweet alert2 cdn---->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!--Start Add to cart product Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong id="pname"></strong></h5>
                    <button type="button" class="close" id="modalclose" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src=" " class="card-image-top" id="pimage"
                                    style="width:200px;height:200px">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item ">Product Price: $<strong class="text-primary"
                                        id="pprice"></strong> $<del class="text-primary" id="oldprice"></del>
                                </li>
                                <li class="list-group-item">Product Code: <strong class="text-primary"
                                        id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong class="text-primary"
                                        id="pcat"></strong> </li>
                                <li class="list-group-item">Brand: <strong class="text-primary"
                                        id="pbrand"></strong> </li>
                                <li class="list-group-item">Stock: <strong class="text-primary"
                                        id="pstock"></strong> </li>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">

                                <label>select Color</label>
                                <select class="form-control" name="color" id="color">
                                    <option>1</option>
                                </select>
                            </div>

                            <div class="form-group" id="sizeArea">
                                <label>select size</label>
                                <select class="form-control" name="size" id="size">
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input type="number" class="form-control" name="qty" value="1"
                                    min="1" id="qty">
                            </div>

                            <input type="hidden" id="p_id">
                            <button type="submit" class="btn btn-sm btn-primary" onclick="addToCart()">Add To
                                Cart</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!--Add to cart product Modal End -->

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>


        <!--start product view Js code -->

        <script type="text/javascript">
            function pView(id) {
                $.ajax({
                    type: 'GET',
                    url: '/product/view/modal/'+id,
                    dataType: 'json',
                    success: function(data) {
                        $('#pname').text(data.product.p_name_eng);
                        $('#pcode').text(data.product.p_code);
                        $('#pcat').text(data.product.rel_to_cat.c_name_eng);
                        $('#pbrand').text(data.product.rel_to_brand.b_name_eng);
                        $('#pimage').attr('src','/'+'uploads/p_image'+'/'+data.product.p_image);

                        $('#p_id').val(id);
                        $('#qty').val(1);

                        $('select[name="color"]').empty();
                        $.each(data.color, function(key, value) {
                            $('select[name="color"]').append('<option value="'+value+'">'+value+
                                '</option>');
                        })

                        $('select[name="size"]').empty();
                        $.each(data.size, function(key, value) {
                            $('select[name="size"]').append('<option value="'+value+'">'+value+
                                '</option>');

                            if (data.size == "") {
                                $('#sizeArea').hide();
                            } else {
                                $('#sizeArea').show();
                            }
                        })

                        if (data.product.discount_price == "") {

                            $('#pprice').empty();
                            $('#oldprice').empty();
                            $('#pprice').text(data.product.selling_price);
                        } else {
                            $('#pprice').text(data.product.discount_price);
                            $('#oldprice').text(data.product.selling_price);
                        }

                        if (data.product.p_qty > 0) {
                            $('#pstock').text('Available');
                        } else {
                            $('#pstock').text('Stockout');
                        }

                    }
                })
            }

             <!--end product view Js code-- >

            <!--start Add to Cart Code with Boom Boom man-- >


            function addToCart() {

                var p_name = $('#pname').text();
                var p_id = $('#p_id').val();
                var color = $('#color option:selected').text();
                var size = $('#size option:selected').text();
                var quantity = $('#qty').val();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        color:color, size:size, quantity:quantity, p_name:p_name,
                        p_id:p_id
                    },
                    url: '/cart/data/store/'+p_id,
                    success: function(data) {
                        miniCart();
                        $('#modalclose').click();

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                title: data.success
                            });
                        } else {
                            Toast.fire({
                                title: data.error
                            });
                        }
                    }
                })
            }

            <!--End Add to Cart Code with Boom Boom man-- >
        </script>

        <!-- start MiniCart Code  with Boom Boom man -->
        <script type="text/javascript">
            function miniCart() {
                $.ajax({
                    type: 'GET',
                    url: '/product/mini/cart',
                    dataType: 'json',
                    success: function(response) {

                        $('span[id="cartTotal"]').text(response.cartTotal);
                        $('span[id="cartqty"]').text(response.cartqty);
                        var miniCart = ""

                        $.each(response.carts, function(key, value) {
                            miniCart += `<div class="cart-item product-summary">
                        <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href=""><img src="uploads/p_image/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="">${value.name}</a></h3>
                      <div class="price">${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action">
                        <button type="submit" id="${value.rowId}" onclick="miniCartremove(this.id)" ><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`
                        });

                        $('#miniCart').html(miniCart);
                    }
                })
            }
            miniCart();
        </script>
        <!-- Close mini Cart Code  with Boom Boom man -->

        <!-- start remove cart with Boom Boom man -->
        <script>

            function miniCartremove(rowId){
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '/minicart/product_remove/'+rowId,
                    success: function(data) {

                        couponCalculation();
                        mycart();
                        miniCart();
                        $('#couponField').show();
                        $('#coupon_name').val('');

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                title: data.success
                            });
                        } else {
                            Toast.fire({
                                title: data.error
                            });
                        }
                    }
                })

            }

        </script>
        <!-- End remove cart with Boom Boom man -->

        <!-- Start Wishlist Code  -->
        <script>
           function addToWishlist(p_id){

            $.ajax({

                type:"POST",
                url: "/add_to_wishlist/"+p_id,
                dataType:'json',
                success:function(data){

                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                    }
               })

           }
        </script>
        <!-- End wishlist code -->

        <!-- Start Wishlist js code -->
        <script type="text/javascript">
            function wishlist() {
                $.ajax({
                    type: 'GET',
                    url: '/get_wishlist/product/',
                    dataType: 'json',
                    success: function(response) {

                        var rows = ""
                        $.each(response, function(key, value) {
                            rows += `<tr>
                                <td class="col-md-2"><img src="/uploads/p_image/${value.rel_to_product.p_image}" alt="imga"></td>
                                <td class="col-md-7">
                                    <div class="product-name"><a href="#">${value.rel_to_product.p_name_eng}</a></div>
                                    <div class="rating">
                                        <i class="fa fa-star rate"></i>
                                        <i class="fa fa-star rate"></i>
                                        <i class="fa fa-star rate"></i>
                                        <i class="fa fa-star rate"></i>
                                        <i class="fa fa-star non-rate"></i>
                                        <span class="review">( 06 Reviews )</span>
                                    </div>
                                    <div class="price">

                                        ${
                                            value.rel_to_product.discount_price == null? `${value.rel_to_product.selling_price}`
                                            : `${value.rel_to_product.discount_price} <span>${value.rel_to_product.selling_price}</span>`
                                        }
                                    </div>
                                </td>
                                <td class="col-md-2">
                                    <button data-toggle="modal"
                                    data-target="#exampleModal" id="${value.p_id}" onclick="pView(this.id)" class="btn-upper btn btn-primary">Add to cart</button>
                                </td>
                                <td class="col-md-1 close-btn">
                                    <button type="submit" id="${value.id}"  onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>`
                        });

                        $('#wishlist').html(rows);
                    }
                })
            }
            wishlist();
        </script>
        <!-- Close Wishlist js code -->

        <!-- start Wishlist remove js code -->

            <script>

                function wishlistRemove(id){
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/wishlist/remove/'+id,
                        success: function(data) {
                            wishlist();

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            })

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: data.success
                                });
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    icon: 'error',
                                    title: data.error
                                });
                            }
                        }
                    })

                }

            </script>

        <!-- Close Wishlist remove js code -->

         <!-- Start mycart code -->
         <script type="text/javascript">
            function mycart() {
                $.ajax({
                    type: 'GET',
                    url: '/show_mycart',
                    dataType: 'json',
                    success: function(response) {

            var show = ""
            $.each(response.carts, function(key, value) {
                show += `<tr>
                    <td class="col-md-2"><img src="uploads/p_image/${value.options.image}" alt="img"></td>
                    <td class="col-md-4">
                        <div class="product-name"><a href="">${value.name}</a></div>
                        <div class="rating">
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star non-rate"></i>
                            <span class="review">( 06 Reviews )</span>
                        </div>
                        <div class="price">$${value.price}</div>
                    </td>
                    <td class="col-md-2">
                        <div class="price">${value.options.size ==  null
                            ? `<strong>....</strong>`
                            : `<strong> ${value.options.size} </strong>`
                            }
                        </div>
                    </td>
                    <td class="col-md-2">
                        <div class="price">${value.options.color}</div>
                    </td>
         <td class="col-md-2">
            ${value.qty > 1
                ?
            `<button type="submit" id="${value.rowId}"  onclick="mycartdecrement(this.id)"
            class="btn btn-danger btn-sm" >-</button>`
            : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button>`
        }
                            <input type="text" value="${value.qty}" min="1" max="5" style="width:25px;" disabled >
            <button button="submit" id="${value.rowId}"  onclick="mycartincrement(this.id)"
            class="btn btn-primary btn-sm">+</button>
         </td>
                    <td class="col-md-2">
                        <div class="price">$${value.subtotal}</div>
                    </td>

                    <td class="col-md-1 close-btn">
                        <button type="submit" id="${value.rowId}"  onclick="mycartRemove(this.id)"><i class="fa fa-times"></i></button>
                    </td>
                </tr>`
            });
                        $('#mycart').html(show);
                    }
                })
            }
            mycart();
        </script>
        <!-- Close mycart  js code -->

<!-- Close mycart Remove  js code -->
        <script>
        function mycartRemove(rowId){
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/mycart/remove/'+rowId,
                        success: function(data) {
                            couponCalculation();
                                    mycart();
                                    miniCart();
                                    $('#couponField').show();
                                   $('#coupon_name').val('');

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: data.success
                                });
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    icon: 'error',
                                    title: data.error
                                });
                            }
                        }
                    })
                }
                </script>
    <!-- Close mycart removejs code -->

    <!-- cart increment -->
    <script>
        function mycartincrement(rowId){
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/mycart/increment/'+rowId,
                        success: function(data) {
                            couponCalculation();
                            mycart();
                            miniCart();
                        }
                    })
                }


                function mycartdecrement(rowId){
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '/mycart/decrement/'+rowId,
                        success: function(data) {
                            couponCalculation();
                            mycart();
                            miniCart();
                        }
                    })
                }

      </script>
    <!-- cart increment -->

       <!-- Coupon Apply start -->
       <script type="text/javascript">
        function applyCoupon(){
            var coupon_name = $('#coupon_name').val();

            $.ajax({
                type:"POST",
                url:"{{ url('/applycoupon') }}",
                dataType:"json",
                data:{coupon_name:coupon_name},
                success:function(data){
                    couponCalculation();
                 if(data.validity == true){
                     $('#couponField').hide();
                 }


                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            });
                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            });
                        }

                }

            });
        }


    </script>
<!-- Coupon Apply close -->

  <!-- Checkout field -->
  <script type="text/javascript">
    function  couponCalculation(){

        $.ajax({
            type:"GET",
            dataType:"json",
            url: "{{ url('/coupon-calculation') }}",
            success:function(data){

                if(data.total){
                    $('#couponCalField').html(
                        `<tr>
                        <th>
                            <div class="cart-sub-total">
                                Subtotal<span class="inner-left-md">$ ${data.total}</span>
                            </div>
                            <div class="cart-grand-total">
                                Grand Total<span class="inner-left-md">$ ${data.total}</span>
                            </div>
                        </th>
                     </tr>`

                    )
                }
                else
                {
                    $('#couponCalField').html(

                    `<tr>
                        <th>
                            <div class="cart-sub-total">
                                Subtotal:<span class="inner-left-md">$${data.subtotal}</span>
                            </div>
                            <div class="cart-grand-total">
                                Coupon:<span class="inner-left-md"> ${data.coupon_name}</span>
                                <button type="submit" onclick="couponRemove()" ><i class="fa fa-times" ></i></button>
                            </div>
                            <div class="cart-grand-total">
                                Discount:<span class="inner-left-md">$ ${data.discount_amount}</span>
                            </div>
                            <div class="cart-grand-total">
                                Grand Total:<span class="inner-left-md">$ ${data.total_amount}</span>
                            </div>
                        </th>
                    </tr>`

                    )
                }

            }
        });

        }
        couponCalculation();

</script>
<!-- Checkout field -->

 <!-- Coupon Removed -->
 <script type="text/javascript">

    function couponRemove(){
        $.ajax({
            type:"POST",
            dataType:"json",
            url:"{{ url('/coupon-remove') }}",
            success:function(data){
                couponCalculation();
                $('#couponField').show();
                $('#coupon_name').val('');

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    });
                }
            }
        });

    }

    </script>
<!-- Coupon Removed-->


 @yield('footer_script')


</body>

</html>
