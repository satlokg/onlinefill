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
          <a href="{{route('admin.employee')}}">
            <i class="fa fa-user"></i> <span>Users</span>
          </a>
        </li>
        
       <li>
          <a href="{{route('admin.projects')}}">
            <i class="fa fa-file-powerpoint-o"></i> <span>Projects</span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.report.todayReport')}}">
            <i class="fa fa-eye"></i> <span>Reports</span>
          </a>
        </li>
       <li>
          <a href="{{route('admin.report.attempt')}}">
            <i class="fa fa-eye"></i> <span>Attempt</span>
          </a>
        </li>

       
       
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>