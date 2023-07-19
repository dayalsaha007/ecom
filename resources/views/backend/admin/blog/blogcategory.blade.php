@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - BlogCategory
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Blog Category List</h4>
                </div>
                <div class="card-body">
                        <table id="example" class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th>Sr.no</th>
                                    <th>Category Name</th>
                                    <th>Category Name Hin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($blog_cats as $all=>$blog)
                                 <tr>
                                     <td>{{ $all+1 }}</td>
                                     <td>{{ $blog->bc_name_eng }}</td>
                                     <td>{{ $blog->bc_name_hin }}</td>
                                     <td>
                                     <a href="{{ route('bc_edit', $blog->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a href="{{ route('bc_del', $blog->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></a>
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
                    <h4>Add Blog Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('add_b_category') }}" method="POST">
                        @csrf
                        <label>Blog Category Eng</label>
                    <input type="text" class="form-control my-1" required name="bc_name_eng" >

                        <label>Blog Category Hin</label>
                    <input type="text" class="form-control my-1" required name="bc_name_hin" >

                        <button type="submit" class="btn btn-sm btn-primary mt-3" >Add BlogCategory</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('footer_script')

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<script>
    @if(Session::has('bc_add'))
        toastr.success("{{ Session::get('bc_add') }}");
    @endif
</script>



@endsection
