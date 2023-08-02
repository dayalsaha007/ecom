@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - add subsubcategory
@endsection

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header">
                        <h4>All SubsubCategories</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Subsub Eng</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($subsub_categories as $all =>$subsub)
                                        <tr>
                                            <td>{{ $all+1 }}</td>
                                            <td>{{ $subsub['rel_to_category']['c_name_eng'] }}</td>
                                            <td>{{ $subsub['rel_to_subcategory']['sc_name_eng'] }}</td>
                                            <td>{{ $subsub->ssc_name_eng }}</td>
                                            <td style="width:100px;">
                                                <a href="{{ route('edit_subsub_cat',$subsub->id) }}" class="btn btn-sm btn-info"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a href="{{ route('del_subsub_cat',$subsub->id) }}" id="delete" class="btn btn-sm btn-danger"><i
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
                        <h4>Add SubsubCategories</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store_subsub_category') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="mt-1">Select Category<span class="text-danger"> *</span>
                                </label>
                                <div class="controls">
                                    <select name="c_id" class="form-control mb-2" id="select" required
                                        aria-invalid="false">
                                        <option>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->c_name_eng }}</option>
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
                                        <option>Select Category</option>
                                    </select>
                                    <div class="help-block"></div>
                                </div>
                            </div>

                            <label class="mt-1">Sub-subcategory Name English<span class="text-danger"> *</span>
                            </label>
                            <input type="text" name="ssc_name_eng" class="form-control mb-2">
                            @error('ssc_name_eng')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label class="mt-1">Sub-subcategory Name Hindi<span class="text-danger"> *</span></label>
                            <input type="text" name="ssc_name_hin" class="form-control mb-2">
                            @error('ssc_name_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <button class="btn btn-sm btn-info mt-2" type="submit">Add Subsubcategory</button>

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
        @if (Session::has('ssc_s'))
            toastr.success("{{ Session::get('ssc_s') }}")
        @endif
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="c_id"]').on('change', function() {
                var c_id = $(this).val();
                if (c_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/" + c_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="sc_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sc_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .sc_name_eng + '</option>');
                            });
                        },
                    });
                }
                 else

                {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
