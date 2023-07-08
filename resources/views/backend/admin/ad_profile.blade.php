@extends('backend.master_dashboard')


@section('page_header')
Ecommerce - Admin Profile
@endsection



@section('content')


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <p>Admin Profile</p>
            </div>
            <div class="card-body">

            <form action="{{ route('up_ad_profile') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                        <input type="hidden" name="profile_id" value="" >

                        <label class="mt-2">Name</label>
                        <input type="text" required class="form-control" name="name" value="{{ $admins->name }}">

                        <label class="mt-2">Email</label>
                        <input type="text" required class="form-control" name="email" value="{{ $admins->email }}">

                        <label class="mt-2">Old Password</label>
                        <input type="old_password" class="form-control" name="old password">

                        <label class="mt-2">New Password</label>
                        <input type="password" class="form-control" name="password">

                        <label class="mt-2">Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >

                        <img width="100px;" src="{{ asset('uploads/admin_image') }}/{{ $admins->image }}"  id="blah" class="d-block my-2"  alt="">


                        <button class="btn btn-sm mt-3 btn-info">Update Profile</button>

                </form>

            </div>
        </div>
    </div>
</div>





@endsection


@section('footer_script')

<script>

    @if(Session::has('up_w_n'))
        toastr.success("{{ Session::get('up_w_n') }}");
    @endif

    @if(Session::has('up_w_p'))
        toastr.success("{{ Session::get('up_w_p') }}");
    @endif

    @if(Session::has('up_wo_p'))
        toastr.success("{{ Session::get('up_wo_p') }}");
    @endif

    @if(Session::has('up_w_im'))
        toastr.success("{{ Session::get('up_w_im') }}");
    @endif

    @if(Session::has('up_w_i_p'))
        toastr.success("{{ Session::get('up_w_i_p') }}");
    @endif

</script>



@endsection
