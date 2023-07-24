@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - EditDivision
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <h4>Add Division</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update_division') }}" method="POST">
                            @csrf

                            <input type="hidden" name="division_id"  value="{{ $division->id }}">

                            <label class="my-1">Division Name</label>
                            <input type="text" name="division_name" value="{{ $division->division_name }}" class="form-control my-1" required=" " >

                            <button type="submit" class="btn btn-sm btn-primary mt-2">Update Division</button>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>




@endsection




