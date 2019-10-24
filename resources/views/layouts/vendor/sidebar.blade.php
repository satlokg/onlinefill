  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel text-center" >
          <img src="{{url('public/img/logo.png')}}" class="img-thumbnail" alt="User Image">
          
      </div>

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Vendors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.vendors')}}"><i class="fa fa-circle-o"></i> All Vendors</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Add Vendor</a></li>
          </ul>
        </li>

        <li>
          <a href="{{route('vendor.profile')}}">
            <i class="fa fa-th"></i> <span>Profile</span>
          </a>
        </li>
       
       
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>