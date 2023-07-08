@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - add category
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header">
                        <h4>All Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name Eng</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories as $all=>$cat)
                                        <tr>
                                            <td>{{ $all+1 }}</td>
                                            <td>{{ $cat->c_name_eng }}</td>
                                            <td>
                                                <i class="{{ $cat->c_icon }}" ></i>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit_category', $cat->id) }}" class="btn btn-sm btn-info"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                                <a href="{{ route('del_category',  $cat->id) }}" id="delete" class="btn btn-sm btn-danger"><i
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
                        <h4>Add Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store_category') }}"method="POST" enctype="multipart/form-data">
                            @csrf

                            <label class="mt-1">Category Name English</label>
                            <input type="text" name="c_name_eng" class="form-control mb-2">
                            @error('c_name_eng')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label class="mt-1">Category Name Hindi</label>
                            <input type="text" name="c_name_hin" class="form-control mb-2">
                            @error('c_name_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label class="mt-1">Category Icon</label>
                            <input type="text" name="c_icon" class="form-control mb-2">
                            @error('c_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                            <button class="btn btn-sm btn-info mt-2" type="submit">Add Category</button>

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
        @if (Session::has('ac'))
            toastr.success("{{ Session::get('ac') }}")
        @endif
    </script>
@endsection
