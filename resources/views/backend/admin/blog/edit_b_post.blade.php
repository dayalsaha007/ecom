@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - Edit BlogPost
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
                <div class="card-header">
                    <h4>Update Blog Post</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('update_post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       <div class="row">

                        <input type="hidden" value="{{ $blogs->id }}" name="bpost_id" >

                        <div class="col-md-6">
                            <label>Post Title Eng</label>
                            <input type="text" required value="{{ $blogs->post_title_eng }}" class="form-control my-1" name="post_title_eng" >
                        </div>

                        <div class="col-md-6">
                            <label>Post Title Hin</label>
                            <input type="text" value="{{ $blogs->post_title_hin }}" class="form-control my-1" name="post_title_hin" >
                        </div>

                        <div class="col-md-6">
                            <label class="mt-2">Post Category</label>
                            <select name="bc_id" class="form-control">
                                <option value="">-select one-</option>
                               @foreach ($blog_category as $blog)
                                 <option {{ $blogs->bc_id == $blog->id?'selected':'' }}   value="{{ $blog->id }}">{{ $blog->bc_name_eng }}</option>
                               @endforeach
                            </select>

                        </div>

                        <div class="col-md-6">
                            <label>Post image</label>
                            <input type="file" class="form-control mt-2" name="post_image" onchange="document.getElementById('blog').src = window.URL.createObjectURL(this.files[0])" >

                            <img src="{{ asset('uploads/blog') }}/{{ $blogs->post_image }}" id="blog" class="my-1" style="width:50px" >

                        </div>

                         <div class="col-md-6">
                            <label>Post Detail Eng</label>
                            <textarea class="form-control my-1" name="post_details_eng" id="myeditorinstance" >{!! $blogs->post_details_eng !!}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label>Post Detail Hin</label>
                            <textarea class="form-control my-1" name="post_details_hin" id="myeditorinstance" >{!! $blogs->post_details_hin !!}</textarea>
                        </div>

                       </div>

                       <button type="submit" class="btn btn-sm btn-primary mt-2" >Update Blog Post</button>

                    </form>
                </div>
           </div>
        </div>
    </div>
</div>


@endsection

