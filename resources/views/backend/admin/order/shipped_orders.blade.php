@extends('backend.master_dashboard')



@section('page_header')
    Admin | Shipped Orders
@endsection

@section('content')



<div class="container">


    <div class="row">
        <div class="col-md-12">
            <div class="card">

        <!-- Modal -->
            <div class="modal fade pending_order_close" id="pending_order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="" id="update_stat">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Order Status</h5>
                        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden"  id="pending_id">

                        <label>Status</label>
                        <input type="text" id="pending_status"  class="form-control">

                    </div>
                    <div class="modal-footer">
            <button type="button" id="update_status" class="btn btn-primary ">Update Status</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>

                <div class="card-header">
                    <h4>Shipped Orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Invoice</th>
                                <th>Amount</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shipped_orders as $pending_order)

                                <tr>
                                    <td>{{ $pending_order->order_date }}</td>
                                    <td>{{ $pending_order->invoice_no }}</td>
                                    <td> {{ $pending_order->amount }}</td>
                                    <td> {{ $pending_order->payment_method }} </td>
                                    <td> <span class="badge badge-pill badge-info" >{{ $pending_order->status }} </span></td>
                                <td>
            <a data-toggle="modal"  data-id="{{ $pending_order->id }}" data-status="{{ $pending_order->status }}" data-target="#pending_order" class="btn btn-sm btn-info pending_order_view"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
        $(document).ready(function(){
            $('#example').DataTable();
        });
    </script>

  <script>

    @if (Session::has('sc'))
    toastr.success("{{ Session::get('sc') }}");
    @endif

  </script>

<script>

        $(document).ready(function(){
                $(document).on('click', '.pending_order_view', function(e){
                            e.preventDefault();

                    let status = $(this).data('status');
                    let id = $(this).data('id');

                    $('#pending_status').val(status);
                    $('#pending_id').val(id);

                });
        });

</script>


<script>
   $(document).ready(function(){
         $('body').on('click', '#update_status', function(e){
                    e.preventDefault();

            let order_status = $('#pending_status').val();
            let pending_id = $('#pending_id').val();

            axios.post(`/update/pending/status`, {
                order_status:order_status, pending_id:pending_id,
            })
            .then((res)=>{
                console.log(res.data);
                $('.table').load(location.href+' .table');
                $('#pending_order').modal('hide');
            })
        });
   });
</script>

@endsection
