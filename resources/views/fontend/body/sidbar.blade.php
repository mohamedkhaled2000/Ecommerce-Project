        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> {{ __('masseges.Categories') }}</div>
            <nav class="yamm megamenu-horizontal">
                <ul class="nav">
                    @php
                        $categories = App\Models\Category::select('id', 'category_name_' . LaravelLocalization::getCurrentLocale() . ' as catName', 'category_icon')->get();
                    @endphp
                    @foreach ($categories as $category)
                        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle"
                                data-toggle="dropdown">{!! $category->category_icon !!} {{ $category->catName }}</a>
                            <ul class="dropdown-menu mega-menu">
                                <li class="yamm-content">
                                    <div class="row">
                                        @php
                                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                                ->select('id', 'subcategory_name_' . LaravelLocalization::getCurrentLocale() . ' as subcatName','subcategory_slug_en')
                                                ->get();
                                        @endphp
                                        @foreach ($subcategories as $subcategory)
                                            <div class="col-sm-12 col-md-3">
                                                <h2 class="title"><a href="{{url('subCategory/'.$subcategory->subcategory_slug_en.'/'.$subcategory->id)}}">{{ $subcategory->subcatName }}</a></h2>
                                                <ul class="links list-unstyled">
                                                    @php
                                                        $sub_subcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)
                                                            ->select('id','sub_subcategory_name_' . LaravelLocalization::getCurrentLocale() . ' as sub_subcatName','sub_subcategory_slug_en')
                                                            ->get();
                                                    @endphp
                                                    @foreach ($sub_subcategories as $sub_subcategory)
                                                        <li><a href="{{url('sub_subCategory/'.$sub_subcategory->sub_subcategory_slug_en.'/'.$sub_subcategory->id)}}">{{ $sub_subcategory->sub_subcatName }}</a></li>
                                                    @endforeach
                                                </ul>
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
                        <!-- /.menu-item -->
                    @endforeach


                </ul>
                <!-- /.nav -->
            </nav>
            <!-- /.megamenu-horizontal -->
        </div>
        <!-- /.side-menu -->
        <!-- ================================== TOP NAVIGATION : END ================================== -->
