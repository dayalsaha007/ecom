@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - district
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>All District</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="example" >

                      <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Divison Name</th>
                                <th>District Name</th>
                                <th>Action</th>

                            </tr>
                      </thead>

                       <tbody>
                                @foreach ($district as $all=>$dist)
                                    <tr>
                                        <td>{{ $all+1 }}</td>
                                        <td>{{ $dist['rel_to_division']['division_name'] }}</td>
                                        <td>{{ $dist->district_name }}</td>
                                        <td>
                             <a href="{{ route('edit_district', $dist->id) }}" class="btn btn-sm btn-info"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <a href="{{ route('del_district', $dist->id) }}" id="delete" class="btn btn-sm btn-danger"><i
                                                class="fa fa-ban" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                       </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add District</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('store_district') }}" method="POST">
                        @csrf

                        <label class="my-1">Division Name</label>
                        <select name="division_id" value="" class="form-control">
                            <option value="">--select Division--</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                            @endforeach
                        </select>

                        <label class="my-1">District Name</label>
                        <input type="text" name="district_name" class="form-control my-1" required=" " >

                        <button type="submit" class="btn btn-sm btn-primary mt-2">Add District</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('footer_script')

    <script>
        $(document).ready(function(){
            $('#example').DataTable();

        });
    </script>

    <script>
        @if(Session::has('sd'))
            toastr.success("{{Session::get('sd')}}");
        @endif

        @if(Session::has('dd'))
            toastr.success("{{Session::get('dd')}}");
        @endif
    </script>




@endsection
