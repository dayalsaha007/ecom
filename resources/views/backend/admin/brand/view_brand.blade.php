@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - Brand
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name Eng</th>
                                        <th>Name Hin</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $all => $brand)
                                        <tr>
                                            <td>{{ $all + 1 }}</td>
                                            <td>{{ $brand->b_name_eng }}</td>
                                            <td>{{ $brand->b_name_hin }}</td>
                                            <td>
                                                <img width="50"
                                                    src="{{ asset('uploads/brand_image') }}/{{ $brand->b_image }}"
                                                    alt="">
                                            </td>
                                            <td>
                                                <a href="{{ route('edit_brand', $brand->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                                <a href="{{ route('del_brand', $brand->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></a>
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
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="{{ route('store_brand') }}"method="POST" enctype="multipart/form-data">
                            @csrf

                            <label class="mt-1">Brand Name English</label>
                            <input type="text" name="b_name_eng" class="form-control mb-2">
                            @error('b_name_eng')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label class="mt-1">Brand Name Hindi</label>
                            <input type="text" name="b_name_hin" class="form-control mb-2">
                            @error('b_name_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label class="mt-1">Brand Image</label>
                            <input type="file" name="b_image" class="form-control mb-2"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            @error('b_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <img width="50" class="d-block" id="blah">

                            <button class="btn btn-sm btn-info mt-2" type="submit">Add Brands</button>

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
        @if (Session::has('vb'))
            toastr.success("{{ Session::get('vb') }}")
        @endif


    </script>
@endsection
