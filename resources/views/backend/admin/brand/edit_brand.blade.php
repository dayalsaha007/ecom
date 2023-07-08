@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - Edit Brand
@endsection

@section('content')


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form action="{{ route('update_brand') }}"method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{ $brands->id }}" name="brand_id" >

                    <label class="mt-1">Brand Name English</label>
                    <input type="text" name="b_name_eng" class="form-control mb-2" value="{{ $brands->b_name_eng }}">

                    <label class="mt-1">Brand Name Hindi</label>
                    <input type="text" name="b_name_hin" class="form-control mb-2" value="{{ $brands->b_name_hin }}">

                    <label class="mt-1">Brand Image</label>
                    <input type="file" name="b_image" class="form-control mb-2"
                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                    <img width="50" src="{{ asset('uploads/brand_image') }}/{{ $brands->b_image }}" class="d-block" id="blah">

                    <button class="btn btn-sm btn-info mt-2" type="submit">Update Brands</button>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection



