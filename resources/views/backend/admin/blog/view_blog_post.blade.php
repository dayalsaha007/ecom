@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - View BlogPost
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Blog Category List</h4>
                </div>
                <div class="card-body">
                        <table id="example" class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th>Sr.no</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Post Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($blogs as $key=>$blog)
                                  <tr>
                                      <td>{{ $key+1 }}</td>
                                      <td>
                                        <img src="{{ asset('uploads/blog')}}/{{ $blog->post_image }}" alt="" style="width:65px">
                                      </td>
                                      <td>{{ $blog['rel_to_blog']['bc_name_eng'] }}</td>
                                      <td>{{ $blog->post_title_eng }}</td>
                                      <td>
                                      <a href="{{ route('edit_blog_post', $blog->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                         <a href="" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                     </td>
                                  </tr>
                               @endforeach

                            </tbody>
                        </table>


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
     @if(Session::has('post_add'))
        toastr.success("{{ Session::get('post_add') }}")
    @endif
</script>

@endsection
