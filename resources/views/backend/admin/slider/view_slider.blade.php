@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - Slider
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card ">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Image</th>
                                        <th>Slider Title</th>
                                        <th>Slider Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach ($sliders as $all=>$slider)
                                            <tr>
                                                <td>{{ $all+1 }}</td>
                                                <td>
                                                    <img width="50"  src="{{ asset('uploads/slider') }}/{{ $slider->s_image }}" alt="">
                                                </td>
                                                <td>{{ $slider->s_title }}</td>
                                                <td>{{ $slider->s_descrp }}</td>
                                                <td>
                                                    @if($slider->status == 1)
                                                    <span class="badge badge-pill badge-success" >Active</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger" >Deactive</span>
                                                    @endif
                                                </td>
                                                <td width="30%">
                                                    <a href="{{ route('edit_slider', $slider->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                                    <a href="{{ route('delete_slider', $slider->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></a>

                                                    @if ($slider->status == 1)
                                                    <a href="{{ route('deactive_slider', $slider->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-o-down"></i></a>
                                                    @else
                                                    <a href="{{ route('active_slider', $slider->id) }}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-o-up"></i></a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="{{ route('store_slider') }}"method="POST" enctype="multipart/form-data">
                            @csrf

                            <label class="mt-1">Slider Title</label>
                            <input type="text" name="s_title" class="form-control mb-2">

                            <label class="mt-1">Slider Description</label>
                            <input type="text" name="s_descrp" class="form-control mb-2">

                            <label class="mt-1">Slider Image</label>
                            <input required type="file" name="s_image" class="form-control mb-2"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                            <img width="50" class="d-block" id="blah">

                            <button class="btn btn-sm btn-info mt-2" type="submit">Add Slider</button>
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
        @if (Session::has('ss'))
            toastr.success("{{ Session::get('ss') }}")
        @endif
    </script>
@endsection
