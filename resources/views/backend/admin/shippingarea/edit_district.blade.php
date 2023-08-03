@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin -EditDistrict
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add District</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('update_district') }}" method="POST">
                        @csrf


                        <input type="hidden" name="district_id" value="{{ $district->id }}" >

                        <label class="my-1">Division Name</label>
                        <select name="division_id" value="" class="form-control">
                            <option value="">--select Division--</option>
                            @foreach ($divisions as $division)
     <option {{ ($division->id == $district->division_id)?'selected':'' }} value="{{ $division->id }}">{{ $division->division_name }}</option>
                            @endforeach
                        </select>

                        <label class="my-1">District Name</label>
                        <input type="text" name="district_name" value="{{ $district->district_name }}" class="form-control my-1" required=" " >

                        <button type="submit" class="btn btn-sm btn-primary mt-2">update District</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
