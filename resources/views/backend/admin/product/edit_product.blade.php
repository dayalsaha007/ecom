@extends('backend.master_dashboard')



@section('page_header')
    Ecommerce Admin - add Product
@endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Product</h4>
                    </div>
                    <div class="card-body">
        <form action="{{ route('update_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf


            <input type="hidden" name="p_id" value="{{ $product_info->id }}" >
                            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="mt-1">Select Brand<span class="text-danger"> *</span>
                            </label>
                            <div class="controls">
                                <select name="b_id" class="form-control mb-2" id="select" required
                                    aria-invalid="false">
                                    <option>Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $brand->id == $product_info->b_id?'selected':'' }} >{{ $brand->b_name_eng }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="mt-1">Select Category<span class="text-danger"> *</span>
                            </label>
                            <div class="controls">
                                <select name="c_id" class="form-control mb-2" id="select" required
                                    aria-invalid="false">
                                    <option>Select Category</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id == $product_info->c_id?'selected':'' }} >{{ $cat->c_name_eng }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="mt-1">Select Subcategory<span class="text-danger"> *</span>
                            </label>
                            <div class="controls">
                                <select name="sc_id" class="form-control mb-2" id="select" required
                                    aria-invalid="false">
                                    <option>Select Category</option>
                                    @foreach ($subcategory as $sub_cat)
                                        <option value="{{ $sub_cat->id }}" {{ $sub_cat->id == $product_info->sc_id?'selected':'' }} >{{ $sub_cat->sc_name_eng }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="mt-1">Select Subsubcategory<span class="text-danger"> *</span>
                                        </label>
                                        <div class="controls">
                                            <select name="ssc_id" class="form-control mb-2" id="select" required
                                                aria-invalid="false">
                                                <option>Select Category</option>
                                    @foreach ($subsubcategory as $subsub_cat)
                                        <option value="{{ $subsub_cat->id }}" {{ $subsub_cat->id == $product_info->ssc_id?'selected':'' }} >{{ $subsub_cat->ssc_name_eng }}</option>
                                    @endforeach
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label class="mt-1">Product Name English <span class="text-danger"> *</span></label>
                                    <input type="text" name="p_name_eng" value="{{ $product_info->p_name_eng }}" class="form-control mb-2">
                                    @error('p_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="mt-1">Product Name Hindi <span class="text-danger"> *</span></label>
                                    <input type="text" name="p_name_hin" value="{{ $product_info->p_name_hin }}" class="form-control mb-2">
                                    @error('p_name_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">

                                    <div class="col-md-4">
                                        <label class="mt-1">Product Code <span class="text-danger"> *</span></label>
                                        <input type="text" name="p_code" value="{{ $product_info->p_code }}" class="form-control mb-2">
                                        @error('p_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="mt-1">Product Quantity<span class="text-danger"> *</span></label>
                                        <input type="text" name="p_qty" value="{{ $product_info->p_qty }}" class="form-control mb-2">
                                        @error('p_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                <div class="col-md-4">
                                    <label class="mt-1">Product Tags English<span class="text-danger"> *</span></label><br>
                                    <input type="text"  name="p_tags_eng" value="{{ $product_info->p_tags_eng }}" data-role="tagsinput" class="form-control mb-2">
                                    @error('p_tags_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="mt-1">Product Tags Hindi<span class="text-danger"> *</span></label><br>
                                    <input type="text"  value="{{ $product_info->p_tags_hin }}"  name="p_tags_hin" data-role="tagsinput" class="form-control mb-2">
                                    @error('p_tags_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="mt-1">Product Size Eng<span class="text-danger"> *</span></label><br>
                                    <input type="text" name="p_size_eng" value="{{ $product_info->p_size_eng }}" data-role="tagsinput" class="form-control mb-2">
                                    @error('p_size_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="mt-1">Product Size Hin<span class="text-danger"> *</span></label><br>
                                    <input type="text" name="p_size_hin" value="{{ $product_info->p_size_hin }}" data-role="tagsinput" class="form-control mb-2">
                                    @error('p_size_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="mt-1">Product Color Eng<span class="text-danger"> *</span></label><br>
                                    <input type="text" name="p_color_eng" value="{{ $product_info->p_color_eng }}"  data-role="tagsinput" class="form-control mb-2">
                                    @error('p_color_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="mt-1">Product Color Hin<span class="text-danger"> *</span></label><br>
                                    <input type="text" name="p_color_hin" value="{{ $product_info->p_color_hin }}" data-role="tagsinput" class="form-control mb-2">
                                    @error('p_color_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="mt-1">Selling Price<span class="text-danger"> *</span></label><br>
                                    <input type="text" name="selling_price" value="{{ $product_info->selling_price }}" class="form-control mb-2">
                                    @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mt-1">Discounted Price<span class="text-danger"> *</span></label><br>
                                    <input type="text" name="discount_price" value="{{ $product_info->discount_price }}" class="form-control mb-2">
                                    @error('discount_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="mt-1">Product Image<span class="text-danger"> *</span></label><br>
                                    <input type="file" name="p_image" class="form-control mb-2" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                    <img width="25" src="{{ asset('uploads/p_image') }}/{{ $product_info->p_image }}" class="my-2 d-block" id="blah" alt="">
                                    @error('p_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mt-1">Short Description English<span class="text-danger"> *</span></label><br>
                                    <textarea name="short_descp_eng" class="form-control mb-2">{!! $product_info->short_descp_eng !!}</textarea>
                                    @error('short_descp_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="mt-1">Short Description Hindi<span class="text-danger"> *</span></label><br>
                                    <textarea name="short_descp_hin" class="form-control mb-2">{!! $product_info->short_descp_hin !!}</textarea>
                                    @error('short_descp_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mt-1">Long Description English<span class="text-danger"> *</span></label><br>
                                    <textarea name="long_descp_eng" id="editor"  class="form-control mb-2">{!! $product_info->long_descp_eng !!}</textarea>
                                    @error('short_descp_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="mt-1">Long Description Hindi<span class="text-danger"> *</span></label><br>
                                    <textarea name="long_descp_hin" id="editor2" class="form-control mb-2">{!! $product_info->long_descp_hin !!}</textarea>
                                    @error('short_descp_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
    <input type="checkbox" name="hot_deals" {{ $product_info->hot_deals == 1? 'checked':'' }} id="checkbox_1"  value="1">
                                                <label for="checkbox_1">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
     <input type="checkbox" name="featured" {{ $product_info->featured == 1? 'checked':'' }} id="checkbox_2" value="1">
                                                <label for="checkbox_2">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
        <input type="checkbox" name="special_offer" {{ $product_info->special_offer == 1? 'checked':'' }} id="checkbox_3"  value="1">
                                                <label for="checkbox_3">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
         <input type="checkbox" {{ $product_info->special_deals == 1? 'checked':'' }} name="special_deals" id="checkbox_4"value="1">
                                                <label for="checkbox_4">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                            </div>

                    <button class="btn btn-sm btn-info mt-2" type="submit">Update Product</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Multi Image Update</h4>
                            </div>
                            <div class="card-body">

                            <form action="{{ route('update_multi_image') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                        @foreach ($multi_image as $mi)
                                            <div class="col-md-3">
                                                <div class="card" style="border:1px solid white">
                                                    <div class="card-body">
                                                        <img class="my-2" src="{{ asset('uploads/multi_image') }}/{{ $mi->multi_image }}" alt="" width="50"><br><br>
                                                       <label >Multi Image <span class="text-danger"> *</span></label>
                                                        <input type="file" name="multi_image[{{ $mi->id }}]" class="form-control">
                                                        <a href="{{ route('mimg_del', $mi->id) }}" id="delete" class="btn btn-sm btn-danger mt-2"><i class="fa fa-ban" ></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    <button class="btn btn-sm btn-info" type="submit" >Update MultiImage</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
@endsection

@section('footer_script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <script>
        @if (Session::has('ap'))
            toastr.success("{{ Session::get('ap') }}")
        @endif
         @if (Session::has('miup'))
            toastr.success("{{ Session::get('miup') }}")
        @endif
    </script>

    <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>
    <script>
        ClassicEditor
                .create( document.querySelector( '#editor2' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>


    {{--  <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="c_id"]').on('change', function() {
                var c_id = $(this).val();
                if(c_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/"+c_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="ssc_id"]').html('');
                            var d = $('select[name="sc_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sc_id"]').append(
                                    '<option value="' + value.id + '">'+value
                                    .sc_name_eng + '</option>');
                            });
                        },
                    });
                }
                 else

                {
                    alert('danger');
                }
            });


            $('select[name="sc_id"]').on('change', function() {
                var sc_id = $(this).val();
                if(sc_id) {
                    $.ajax({
                        url: "{{ url('/subsubcategory/ajax') }}/"+sc_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="ssc_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="ssc_id"]').append(
                                    '<option value="' + value.id + '">'+value
                                    .ssc_name_eng + '</option>');
                            });
                        },
                    });
                }
                 else
                {
                    alert('danger');
                }
            });



        });
    </script>  --}}


@endsection
