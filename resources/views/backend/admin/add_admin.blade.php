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

                    <form action="{{ route('store_admin_profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="profile_id">

                        <label class="mt-2">Name</label>
                        <input type="text" required class="form-control" name="name">

                        <label class="mt-2">Email</label>
                        <input type="text" required class="form-control" name="email">

                        <label class="mt-2">New Password</label>
                        <input type="password" class="form-control" name="password">

                        <label class="mt-2">Image</label>
                        <input type="file" name="image" class="form-control"
                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                        <img width="100px;" src="" id="blah" class="d-block my-2" alt="">


                        <button class="btn btn-sm mt-3 btn-info">Add Profile</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
