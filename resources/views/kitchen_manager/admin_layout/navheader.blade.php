<header class="main-header">
    <!-- Logo -->
    <a href="admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin Panel</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <!--  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('public/libs/dist/img/avatar.png') }}" class="img-circle" alt="User Image">

                <p>
                  Admin Template - Web Developer
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->
             {{--  <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li> --}}
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" data-toggle="modal" data-target="#mypass" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
         <div class="he" style="text-align: center;color:white;font-size: 25px;padding: 8px">"Amma" CMS</div>
    </nav>

  </header> 

<!-- Modal -->

  <div class="modal fade" id="mypass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel">Change Password</h3>
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'deletefaq', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
       <div class="form-group">
            <label  class="col-sm-6 control-label">Enter CurrentPassword</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" name="CurrentPassword" value="" required>
              <input type="hidden" class="form-control" name="user_id" value="" >
            </div>
       </div>
       <div class="form-group">
            <label  class="col-sm-6 control-label">Enter New Password</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" name="NewPassword" value="" required>
           
            </div>
       </div>
       <div class="form-group">
            <label  class="col-sm-6 control-label">Confirm Password</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" name="ConfirmPassword" value="" required>
              
            </div>
       </div>
    </div>
          <!-- /.box-body -->
          <div class="box-footer">  
            <a href="{{ URL::previous() }}" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Update</button>
          </div>
    {!! Form::close() !!}
  </div>
</div>
</div>