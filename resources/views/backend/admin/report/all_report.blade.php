@extends('backend.master_dashboard')



@section('page_header')
    Admin | All reports
@endsection

@section('content')



<div class="container">


    <div class="row">
        <div class="col-md-4">
            <div class="card">

                <div class="card-header">
                    <h4>Search By Date</h4>
                </div>
                <div class="card-body">

                <form action="{{ route('search_by_date') }}" method="POST">
                    @csrf
                    <label class="my-2">Chose Date</label>
                    <input type="date" name="date" class="form-control my-1" >
                    <button type="submit" class="btn btn-sm btn-primary mt-2">Search Date</button>
                </form>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">

                <div class="card-header">
                    <h4>Search By month & Year</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('search_by_month') }}" method="POST">
                        @csrf

                        <label class="my-2">Chose Month</label>
                        <select name="month" class="form-control my-1">
                            <option value="">Chose One</option>
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="octobor">Octobor</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                        </select>


                        <label class="my-2">Chose Year</label>
                        <select name="year" class="form-control my-1" >
                            <option value="">Chose One</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>

                        <button type="submit" class="btn btn-sm btn-primary mt-2">Search Date</button>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">

                <div class="card-header">
                    <h4>Search By Year</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('search_by_year') }}" method="POST">
                        @csrf
                        <label class="my-2">Chose Year</label>
                        <select name="year" class="form-control my-1" >
                            <option value="">Chose One</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>

                        <button type="submit" class="btn btn-sm btn-primary mt-2">Search Date</button>
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
        $(document).ready(function(){
            @if(Session::has('rosc'))
                toastr.success("{{ Session::get('rosc') }}");
            @endif
        });
    </script>

@endsection

