@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - Edit sub category
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Edit SubCategory</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('update_sub_category') }}" method="POST">
                        @csrf

                        <input type="hidden" value="{{ $sub_categories->id }}" name="subcat_id">

                        <div class="form-group">
                            <label class="mt-1">Select Category<span class="text-danger"> *</span>
                            </label>
                            <div class="controls">
                                <select name="c_id" class="form-control mb-2" id="select" required
                                    aria-invalid="false">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $sub_categories->c_id? 'selected' : '' }} >{{ $category->c_name_eng }}</option>
                                    @endforeach

                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>

                        <label class="mt-1">Subcategory Name English</label>
                        <input type="text" name="sc_name_eng" class="form-control mb-2"
                            value="{{ $sub_categories->sc_name_eng }}">

                        <label class="mt-1">Subcategory Name Hindi</label>
                        <input type="text" name="sc_name_hin" class="form-control mb-2"
                            value="{{ $sub_categories->sc_name_hin }}">

                        <button class="btn btn-sm btn-info mt-2" type="submit">Update Subcategory</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
