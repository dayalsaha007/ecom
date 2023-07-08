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
                    <form action="{{ route('update_subsub_category') }}" method="POST">
                        @csrf

                        <input type="hidden" value="{{ $sub_sub->id }}" name="subsubcat_id">

                        <div class="form-group">
                            <label class="mt-1">Select Category<span class="text-danger"> *</span>
                            </label>
                            <div class="controls">
                                <select name="c_id" class="form-control mb-2" id="select" required
                                    aria-invalid="false">
                                    @foreach ($cat as $category)
                                        <option {{ $category->id == $sub_sub->c_id? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->c_name_eng }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mt-1">Select Subcategory<span class="text-danger"> *</span>
                            </label>
                            <div class="controls">
                                <select name="sc_id" class="form-control mb-2" id="select" required
                                    aria-invalid="false">
                                    @foreach ($sub_cat as $sub)
                                        <option {{ $sub->id == $sub_sub->sc_id? 'selected' : '' }}
                                            value="{{ $sub->id }}">{{ $sub->sc_name_eng }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>

                        <label class="mt-1">Subcategory Name English</label>
                        <input type="text" name="ssc_name_eng" value="{{ $sub_sub->ssc_name_eng }}" class="form-control mb-2" value="">

                        <label class="mt-1">Subcategory Name Hindi</label>
                        <input type="text" name="ssc_name_hin" value="{{ $sub_sub->ssc_name_hin }}" class="form-control mb-2" value="">

                        <button class="btn btn-sm btn-info mt-2" type="submit">Update Subsubcategory</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
