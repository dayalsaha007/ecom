@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - Edit Brand
@endsection

@section('content')


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('update_category') }}" method="POST">
                    @csrf

                    <input type="hidden" value="{{ $cat_info->id }}" name="cat_id" >

                    <label class="mt-1">Category Name English</label>
                    <input type="text" name="c_name_eng" class="form-control mb-2" value="{{ $cat_info->c_name_eng }}">

                    <label class="mt-1">Category Name Hindi</label>
                    <input type="text" name="c_name_hin" class="form-control mb-2" value="{{ $cat_info->c_name_hin }}">

                    <label class="mt-1">Category Icon</label>
                    <input type="text" name="c_icon" class="form-control mb-2"  value="{{ $cat_info->c_icon }}" >

                    <button class="btn btn-sm btn-info mt-2" type="submit">Update Category</button>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection



