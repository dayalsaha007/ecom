@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - Edit BlogCategory
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Blog Category Edit</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update_b_category') }}" method="POST">
                            @csrf
                            <input type="hidden" name="bc_id" value="{{ $blog_category->id }}">
                            <label>Blog Category Eng</label>
                        <input type="text" value="{{ $blog_category->bc_name_eng }}" class="form-control my-1" name="bc_name_eng" >

                            <label>Blog Category Hin</label>
                        <input type="text" value="{{ $blog_category->bc_name_hin }}" class="form-control my-1" name="bc_name_hin" >

                            <button type="submit" class="btn btn-sm btn-primary mt-3" >Update BlogCategory</button>

                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>


@endsection
