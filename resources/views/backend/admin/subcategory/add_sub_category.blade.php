@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - add subcategory
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header">
                        <h4>All SubCategories</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Category Name</th>
                                        <th>Name Eng</th>
                                        <th>Name Hin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                  @foreach ($subcategories as $all=>$sub_cat)
                                      <tr>
                                          <td>{{ $all+1 }}</td>
                                          <td>{{ $sub_cat['rel_to_category']['c_name_eng'] }}</td>
                                          <td>{{ $sub_cat->sc_name_eng }}</td>
                                          <td>{{ $sub_cat->sc_name_hin }}</td>
                                          <td style="width:100px;">
                                              <a href="{{ route('edit_sub_category', $sub_cat->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"
                                                      aria-hidden="true"></i></a>

                                              <a href="{{ route('del_sub_category', $sub_cat->id) }}" id="delete" class="btn btn-sm btn-danger"><i
                                                      class="fa fa-ban" aria-hidden="true"></i></a>
                                          </td>
                                      </tr>
                                  @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Add SubCategories</h4>
                    </div>
                    <div class="card-body">
            <form action="{{ route('store_sub_category') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="form-group">
                                <label class="mt-1">Select Category<span class="text-danger"> *</span>
                                </label>
								<div class="controls">
									<select name="c_id" class="form-control mb-2" id="select" required  aria-invalid="false">
										<option>Select Category</option>
										@foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->c_name_eng }}</option>
                                        @endforeach

									</select>
								<div class="help-block"></div></div>
							</div>


                            <label class="mt-1">Subcategory Name English<span class="text-danger"> *</span>
                            </label>
                            <input type="text" name="sc_name_eng" class="form-control mb-2">
                            @error('sc_name_eng')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label class="mt-1">Subcategory Name Hindi<span class="text-danger"> *</span></label>
                            <input type="text" name="sc_name_hin" class="form-control mb-2">
                            @error('sc_name_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <button class="btn btn-sm btn-info mt-2" type="submit">Add Subcategory</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <script>
        @if (Session::has('asc'))
            toastr.success("{{ Session::get('asc') }}")
        @endif
    </script>
@endsection
