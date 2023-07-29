@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - State
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>All State</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="example" >

                      <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Divison Name</th>
                                <th>District Name</th>
                                <th>State Name</th>
                                <th>Action</th>
                            </tr>
                      </thead>

                       <tbody>
                                @foreach ($states as $all=>$state)
                                    <tr>
                                        <td>{{ $all+1 }}</td>
                                        <td>{{ $state['rel_to_division']['division_name'] }}</td>
                                        <td>{{ $state['rel_to_district']['district_name'] }}</td>
                                        <td>{{ $state->state_name }}</td>
                                        <td>
                                            <a href="{{ route('edit_state', $state->id) }}" class="btn btn-sm btn-info"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <a href="{{ route('del_state', $state->id) }}" id="delete" class="btn btn-sm btn-danger"><i
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
                    <h4>Add State</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('store_state') }}" method="POST">
                        @csrf

                        <label class="my-1">Division Name</label>
                        <select required="" name="division_id"  class="form-control">
                            <option value="">--select Division--</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                            @endforeach
                        </select>

                        <label class="my-1">District Name</label>
                        <select name="district_id" class="form-control">
                        <option>select district</option>
                        </select>

                        <label class="my-1">State Name</label>
                        <input type="text" name="state_name" class="form-control my-1" required=" " >

                        <button type="submit" class="btn btn-sm btn-primary mt-2">Add state</button>

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
</script>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>

<script>
    $(document).ready(function(){
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();

            if(division_id){

                $.ajax({
                    type: "GET",
                    url:    "{{ url('/division_to_district/ajax') }}/" + division_id,
                    dataType:"json",
                    success: function(data){
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'" >'+ value.district_name +'</option>');
                        });
                    }
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
