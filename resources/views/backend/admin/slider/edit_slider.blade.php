@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - Slider
@endsection


@section('content')
<div class="container">
     <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="{{ route('update_slider') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="s_id" value="{{ $slider_info->id }}" >
                            <label class="mt-1">Slider Title</label>
                            <input type="text" name="s_title" class="form-control mb-2" value="{{ $slider_info->s_title }}">

                            <label class="mt-1">Slider Description</label>
                        <input type="text" name="s_descrp" class="form-control mb-2" value="{{$slider_info->s_descrp }}">

                            <label class="mt-1">Slider Image</label>
                            <input type="file" name="s_image" class="form-control mb-2"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                            <img width="50" src="{{ asset('uploads/slider') }}/{{ $slider_info->s_image }}" class="d-block" id="blah">

                            <button class="btn btn-sm btn-info mt-2" type="submit">Update Slider</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection


@section('footer_script')
@endsection
