



<div class="col-md-2 col-sm-4">

    @if (Auth::user()->image == '')
        <img width="100%" height="100%" style="border-radius:50%;" class="rounded"
            src="{{ asset('backend_assets/images/avatar/avatar-3.png') }}" alt="">
    @else
        <img width="100%" height="100%" style="border-radius:50%;" class="d-block  rounded"
            src="{{ asset('uploads/profile_image') }}/{{ Auth::user()->image }}" alt="">
    @endif



    <img src="" alt="" style="border-radious:50%;">
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-info btn-block">Profile</a>
        <a href="{{ route('my_order') }}" class="btn btn-info btn-block">Order</a>
        <a href="{{ route('customer_logout') }}" class="btn btn-danger btn-block">Log out</a>
    </ul>
</div>
