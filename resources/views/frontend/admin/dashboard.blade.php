@extends('frontend.master_frontend')


@section('page_header')
    Ecommerce - Customer Dashboard
@endsection



@section('content')
    <div class="body-container">

        <div class="container" style="padding: 50px 25px;">
            <div class="row">
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
                        <a href="" class="btn btn-info btn-block">Profile</a>
                        <a href="{{ route('customer_logout') }}" class="btn btn-danger btn-block">Log out</a>
                    </ul>
                </div>
                <div class="col-md-2">

                </div>


                @php
                    $user = App\Models\User::find(Auth::user()->id);
                @endphp

                <div class="col-md-4">
                    <div class="card">

                        <form action="{{ route('update_customer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label class="mt-2">Name</label>
                            <input type="text" name="name" class="form-control mb-2" value="{{ $user->name }}">

                            <label class="mt-2">Email</label>
                            <input type="email" name="email" class="form-control mb-2" value="{{ $user->email }}">

                            <label class="mt-2">mobile</label>
                            <input type="text" name="mobile" class="form-control mb-2" value="{{ $user->mobile }}">

                            <label class="mt-2">Old Password</label>
                            <input type="password" name="old_password" class="form-control mb-2" value="">

                            <label class="mt-2">New Password</label>
                            <input type="password" name="password" class="form-control mb-2" value="">

                            <label class="mt-2">Name</label>
                            <input type="file" name="image" class="form-control mb-2"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                            <img style="margin:5px 0" width="100"
                                src="{{ asset('uploads/profile_image') }}/{{ $user->image }}" class="d-block mt-2"
                                id="blah" alt=""><br>

                            <button type="submit" class="btn btn-info ">Update Profile</button>

                        </form>


                    </div>
                </div>
                <div class="col-md-"></div>
            </div>
        </div>

    </div>
@endsection


@section('footer_script')
    <script>
        @if (Session::has('up_w_n'))
            toastr.success("{{ Session::get('up_w_n') }}")
        @endif

        @if (Session::has('up_w_p'))
            toastr.success("{{ Session::get('up_w_p') }}")
        @endif

        @if (Session::has('up_wo_p'))
            toastr.success("{{ Session::get('up_wo_p') }}")
        @endif

        @if (Session::has('up_w_im'))
            toastr.success("{{ Session::get('up_w_im') }}")
        @endif

        @if (Session::has('up_w_i_p'))
            toastr.success("{{ Session::get('up_w_i_p') }}")
        @endif

        @if (Session::has('up_wo_p'))
            toastr.success("{{ Session::get('up_wo_p') }}")
        @endif
    </script>
@endsection
