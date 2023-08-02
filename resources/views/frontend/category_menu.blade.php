<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>
        {{ session()->get('language') == 'hindi' ? 'श्रेणियाँ' : 'Categories' }}</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @php
                $categories = App\Models\Category::orderBy('c_name_eng', 'ASC')->get();
            @endphp
            @foreach ($categories as $category)
                <li class="dropdown menu-item"> <a href="" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon {{ $category->c_icon }}" aria-hidden="true bold">
                        </i>{{ session()->get('language') == 'hindi' ? $category->c_name_hin : $category->c_name_eng }}</a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                    $subcategories = App\Models\Subcategory::where('c_id', $category->id)
                                        ->orderBy('sc_name_eng', 'ASC')
                                        ->get();
                                @endphp
                                @foreach ($subcategories as $sub_cat)
                                    <div class="col-sm-12 col-md-3">
                                        <a href="{{ url('/subcategory/product/'.$sub_cat->id.'/'.$sub_cat->sc_slug_eng) }}">
                                            <h2 class="title">
                                                {{ session()->get('language') == 'hindi' ? $sub_cat->sc_name_hin : $sub_cat->sc_name_eng }}
                                            </h2>
                                        </a>

                                        @php
                                            $subsubcategories = App\Models\Subsubcategory::where('sc_id', $sub_cat->id)
                                                ->orderBy('ssc_name_eng', 'ASC')
                                                ->get();
                                        @endphp

                                        @foreach ($subsubcategories as $subsub)
                                            <ul class="links list-unstyled">
                                                <li><a
                                                        href="{{ url('/subsubcategory/product/'.$subsub->id.'/'.$subsub->ssc_slug_eng) }}">{{ session()->get('language') == 'hindi' ? $subsub->ssc_name_hin : $subsub->ssc_name_eng }}</a>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                @endforeach
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
            @endforeach
            <!-- /.menu-item -->


            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="icon fa fa-envira"></i>{{ session()->get('language') == 'hindi' ? 'घर और बगिया' : 'Home  and Garden' }}</a>
                <!-- /.dropdown-menu -->
            </li>
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->
