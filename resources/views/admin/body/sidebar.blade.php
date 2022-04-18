@php
    $prefix = Request::route()->getPrefix();
    $routes = Route::current()->getName();
    $role = auth()->user()->role->permission;

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Easy</b>Shop</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{ $routes == 'dashboard' ? 'active' : '' }}">
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>
        @if (in_array('brand',$role))
                <li class="treeview {{ ($prefix == '/brand') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brand</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($routes == 'all.brand') ? 'active' : '' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
                </ul>
                </li>
        @endif

        @if (in_array('category',$role))
            <li class="treeview {{ ($prefix == '/category') ? 'active' : '' }}">
            <a href="#">
                <i data-feather="message-circle"></i>
                <span>Category</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($routes == 'all.category') ? 'active' : '' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
                <li class="{{ ($routes == 'all.subcategory') ? 'active' : '' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All SubCategory</a></li>
                <li class="{{ ($routes == 'all.subsubcategory') ? 'active' : '' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub->SubCategory</a></li>
            </ul>
            </li>
        @endif

        @if (in_array('product',$role))
            <li class="treeview {{ ($prefix == '/product') ? 'active' : '' }}">
            <a href="#">
                <i data-feather="file"></i>
                <span>Products</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class=" {{($routes == 'add.product') ? 'active' : '' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a></li>
                <li class=" {{($routes == 'all.product') ? 'active' : '' }}"><a href="{{ route('all.product') }}"><i class="ti-more"></i>Manage Products</a></li>
            </ul>
            </li>
        @endif

        @if (in_array('slider',$role))
            <li class="treeview {{ ($prefix == '/slider') ? 'active' : '' }}">
            <a href="#">
                <i data-feather="file"></i>
                <span>Slider</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class=" {{($routes == 'all.sliders') ? 'active' : '' }}"><a href="{{ route('all.sliders') }}"><i class="ti-more"></i>Manage Sliders</a></li>
            </ul>
            </li>
        @endif

        @if (in_array('blog',$role))
            <li class="treeview {{ ($prefix == '/blog') ? 'active' : '' }}">
            <a href="#">
                <i data-feather="file"></i>
                <span>Mange Blog</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class=" {{($routes == 'all.blog') ? 'active' : '' }}"><a href="{{ route('all.blog') }}"><i class="ti-more"></i>All Blog Category</a></li>
                <li class=" {{($routes == 'all.posts') ? 'active' : '' }}"><a href="{{ route('all.posts') }}"><i class="ti-more"></i>All Blog Posts</a></li>
            </ul>
            </li>
        @endif


        @if (in_array('setting',$role))

         <li class="treeview {{ ($prefix == '/setting') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="file"></i>
              <span>Mange Setting</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=" {{($routes == 'site.setting') ? 'active' : '' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Settings</a></li>
              <li class=" {{($routes == 'seo.setting') ? 'active' : '' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Settings</a></li>
            </ul>
          </li>

        @endif

        @if (in_array('return',$role))
            <li class="treeview {{ ($prefix == '/return') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="file"></i>
              <span>Mange Reutned Orders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=" {{($routes == 'view.return') ? 'active' : '' }}"><a href="{{ route('view.return') }}"><i class="ti-more"></i>Return Orders</a></li>
              <li class=" {{($routes == 'all.request') ? 'active' : '' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>All Request</a></li>
            </ul>
          </li>

        @endif

        @if (in_array('reviews',$role))
            <li class="treeview {{ ($prefix == '/reviews') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="file"></i>
              <span>Mange Reviews</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=" {{($routes == 'pending.reviews') ? 'active' : '' }}"><a href="{{ route('pending.reviews') }}"><i class="ti-more"></i>Pending Reviews</a></li>
              <li class=" {{($routes == 'publish.review') ? 'active' : '' }}"><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish Reviews</a></li>
            </ul>
          </li>

        @endif

        @if (in_array('stock',$role))
            <li class="treeview {{ ($prefix == '/stock') ? 'active' : '' }}">
            <a href="#">
              <i data-feather="file"></i>
              <span>Mange Stock</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=" {{($routes == 'product.stock') ? 'active' : '' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>
            </ul>
          </li>


        @endif


        @if (in_array('adminuserrow',$role))
            <li class="treeview {{ ($prefix == '/adminuserrow') ? 'active' : '' }}">
                <a href="#">
                <i data-feather="file"></i>
                <span>Admin User Role</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class=" {{($routes == 'all.roles') ? 'active' : '' }}"><a href="{{ route('all.roles') }}"><i class="ti-more"></i>All Role</a></li>
                <li class=" {{($routes == 'all.admin') ? 'active' : '' }}"><a href="{{ route('all.admin') }}"><i class="ti-more"></i>All Admin</a></li>
                </ul>
            </li>

        @endif

        <li class="header nav-small-cap">User Interface</li>

        @if (in_array('coupons',$role))

            <li class="treeview {{ ($prefix == '/coupons') ? 'active' : '' }}">
                <a href="#">
                <i data-feather="file"></i>
                <span>Coupons</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class=" {{($routes == 'manage.coupons') ? 'active' : '' }}"><a href="{{ route('manage.coupons') }}"><i class="ti-more"></i>Manage Coupons</a></li>
                </ul>
            </li>

        @endif

        @if (in_array('shipping-division',$role))
            <li class="treeview {{ ($prefix == '/shipping-division') ? 'active' : '' }}">
                <a href="#">
                <i data-feather="file"></i>
                <span>Shipping Area</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class=" {{($routes == 'manage.division') ? 'active' : '' }}"><a href="{{ route('manage.division') }}"><i class="ti-more"></i>Ship Division</a></li>
                <li class=" {{($routes == 'manage.district') ? 'active' : '' }}"><a href="{{ route('manage.district') }}"><i class="ti-more"></i>Ship District</a></li>
                <li class=" {{($routes == 'manage.state') ? 'active' : '' }}"><a href="{{ route('manage.state') }}"><i class="ti-more"></i>Ship State</a></li>
                </ul>
            </li>

        @endif

        @if (in_array('orders',$role))

            <li class="treeview {{ ($prefix == '/orders') ? 'active' : '' }}">
                <a href="#">
                <i data-feather="file"></i>
                <span>Orders</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class=" {{($routes == 'pending.orders') ? 'active' : '' }}"><a href="{{ route('pending.orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
                <li class=" {{($routes == 'confirm.orders') ? 'active' : '' }}"><a href="{{ route('confirm.orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>
                <li class=" {{($routes == 'processing.orders') ? 'active' : '' }}"><a href="{{ route('processing.orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
                <li class=" {{($routes == 'picked.orders') ? 'active' : '' }}"><a href="{{ route('picked.orders') }}"><i class="ti-more"></i>Picked Orders</a></li>
                <li class=" {{($routes == 'shipping.orders') ? 'active' : '' }}"><a href="{{ route('shipping.orders') }}"><i class="ti-more"></i>Shipping Orders</a></li>
                <li class=" {{($routes == 'delivered.orders') ? 'active' : '' }}"><a href="{{ route('delivered.orders') }}"><i class="ti-more"></i>Delivered Orders</a></li>
                <li class=" {{($routes == 'cancel.orders') ? 'active' : '' }}"><a href="{{ route('cancel.orders') }}"><i class="ti-more"></i>Cancel Orders</a></li>
                </ul>
            </li>

        @endif

        @if (in_array('report',$role))
            <li class="treeview {{ ($prefix == '/report') ? 'active' : '' }}">
                <a href="#">
                <i data-feather="file"></i>
                <span>Reports</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class=" {{($routes == 'all.report') ? 'active' : '' }}"><a href="{{ route('all.report') }}"><i class="ti-more"></i>All Report</a></li>
                </ul>
            </li>

        @endif

        @if (in_array('users',$role))
            <li class="treeview {{ ($prefix == '/users') ? 'active' : '' }}">
                <a href="#">
                <i data-feather="file"></i>
                <span>Users</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class=" {{($routes == 'all.users') ? 'active' : '' }}"><a href="{{ route('all.users') }}"><i class="ti-more"></i>All Users</a></li>
                </ul>
            </li>

        @endif



      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
