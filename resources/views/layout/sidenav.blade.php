
 @if (Session::has('flash_notification.message'))
        <div class="col-sm-8"></div>
        <div class="col-sm-4 test">
            <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{ Session::get('flash_notification.message') }}
            </div>
        </div>       
    @endif
 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="{{ Request::segment(1) === 'admin' ? 'active' : null }} treeview">
          <a href="{{ url('admin' )}}">
            <i class="fa fa-list "></i> <span>Dashboard </span>
          </a>
        </li>
        <li class="{{ Request::segment(1) === 'kitchenHome' ? 'active' : null }} treeview">
          <a href="{{ url('kitchenHome' )}}">
            <i class="fa fa-list "></i> <span>Kitchen </span>
          </a>
        </li>
        <li class="{{ Request::segment(1) === 'view_Order' ? 'active' : null }} treeview">
          <a href="{{ url('view_Order' )}}">
            <i class="fa fa-list "></i> <span>View Order </span>
          </a>
        </li>
        <li class="{{ Request::segment(1) === 'table' ? 'active' : null }} treeview">
          <a href="{{ url('table' )}}">
            <i class="fa fa-list "></i> <span>Manage Table </span>
          </a>
        </li>
        <li class="{{ Request::segment(1) === 'members' ? 'active' : null }} treeview">
          <a href="{{ url('members' )}}">
            <i class="fa fa-list "></i> <span>Manage Members </span>
          </a>
        </li>
        <li class="{{ Request::segment(1) === 'cuisine' ? 'active' : null }} treeview">
          <a href="{{ url('cuisine' )}}">
            <i class="fa fa-list "></i> <span>Manage Cuisine </span>
          </a>
        </li>
        <li class="{{ Request::segment(1) === 'dish_type' ? 'active' : null }} treeview">
          <a href="{{ url('dish_type' )}}">
            <i class="fa fa-list "></i> <span>Manage Dish Type</span>
          </a>
        </li>
        <li class="{{ Request::segment(1) === 'dish' ? 'active' : null }} treeview">
          <a href="{{ url('dish' )}}">
            <i class="fa fa-list "></i> <span>Manage Dish </span>
          </a>
        </li>
        
        <li class="{{ Request::segment(1) === 'payment_type' ? 'active' : null }} treeview">
          <a href="{{ url('payment_type' )}}">
            <i class="fa fa-list "></i> <span>Manage Paymentmode</span>
          </a>
        </li>
        <li class="{{ Request::segment(1) === 'upload_csv' ? 'active' : null }} treeview">
          <a href="{{ url('upload_csv' )}}">
            <i class="fa fa-list "></i> <span>Upload Csv</span>
          </a>
        </li>
        <li class="{{ Request::segment(1) === 'report' ? 'active' : null }} treeview">
          <a href="{{ url('report' )}}">
            <i class="fa fa-list "></i> <span>Report</span>
          </a>
        </li>
        <li class="{{ Request::segment(1) === 'feedback' ? 'active' : null }} treeview">
          <a href="{{ url('feedback' )}}">
            <i class="fa fa-list "></i> <span>View FeedBack</span>
          </a>
        </li>
        <li class="{{ Request::segment(1) === 'settings' ? 'active' : null }} treeview">
          <a href="{{ url('settings' )}}">
            <i class="fa fa-list "></i> <span>View Settings</span>
          </a>
        </li>
      </ul>
    </section>
 </aside>


 