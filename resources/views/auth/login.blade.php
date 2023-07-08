

@extends('frontend/master_frontend')

@section('content')



<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content" >
	<div class="container">
		<div class="sign-in-page" style="margin-bottom:40px;">
			<div class="row" >
				<!-- Sign-in -->
    <div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	<div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div>
	<form action="{{ route('login') }}" class="register-form outer-top-xs"   method="POST" >
        @csrf

		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>

	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		    <input type="password" name="password" required  class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
		</div>

		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio"  name="remember" id="optionsRadios2" value="option2">Remember me!
		  	</label>
          @if (Route::has('password.request'))
		  	<a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
            @endif
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
	</form>
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Create a new account</h4>
	<p class="text title-tag-line">Create your new account.</p>

	<form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('register') }}">
        @csrf

		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Name <span>*</span></label>
	    	<input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
	  	</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email  Address <span>*</span></label>
		    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		    <input type="password" name="password-confirmation" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>

	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	</form>


</div>
<!-- create a new account -->
</div><!-- /.row -->
	</div  ><!-- /.sigin-in-->
</div >
</div><!-- /.body-content -->





@endsection

@section('footer_script')

    <script>

        @if(Session::has('ad_lo'))
        toastr.success("{{ Session::get('ad_lo') }}")
        @endif

        @if(Session::has('cus_logout'))
        toastr.success("{{ Session::get('cus_logout') }}")
        @endif

    </script>

@endsection


