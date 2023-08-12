@extends('frontend/master_frontend')

@section('content')
    <div class="body-content" style="margin: 40px 0px;">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <form action="{{ route('password.email') }}" class="register-form outer-top-xs" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input id="email" type="email"
                                        class="form-control pl-15 bg-transparent text-white plc-white"
                                        placeholder="Enter Your Email">
                                </div>

                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Mail</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        @if (Session::has('ad_lo'))
            toastr.success("{{ Session::get('ad_lo') }}")
        @endif
    </script>
@endsection
