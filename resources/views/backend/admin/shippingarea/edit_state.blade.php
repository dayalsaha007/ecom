@extends('backend.master_dashboard')


@section('page_header')
    Ecommerce Admin - EditState
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit State</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update_state') }}" method="POST">
                            @csrf

                            <input type="hidden" name="state_id" value="{{ $shipstate->id }}" >

                            <label class="my-1">Division Name</label>
                            <select required="" name="division_id"  class="form-control">
                                <option value="">--select Division--</option>
                                @foreach ($divisions as $division)
                                    <option {{ ($division->id == $shipstate->division_id)?'selected':'' }} value="{{ $division->id }}">{{ $division->division_name }}</option>
                                @endforeach
                            </select>

                            <label class="my-1">District Name</label>
                            <select required="" name="district_id"  class="form-control">
                                <option value="">--select District--</option>
                                @foreach ($districts as $district)
                    <option {{ ($district->id == $shipstate->district_id)?'selected':'' }} value="{{ $district->id }}">{{ $district->district_name }}</option>
                                @endforeach
                            </select>

                            <label class="my-1">State Name</label>
                            <input type="text" name="state_name" class="form-control my-1" value="{{ $shipstate->state_name }}" required="">

                            <button type="submit" class="btn btn-sm btn-primary mt-2">Update state</button>

                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>



@endsection


@section('footer_script')





@endsection
