@extends("admin_layout.layout") 
@section('title','Home')
@section("content")
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      </ol>
    </section>
 <!-- Main content -->
    <section class="content-header">
    <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="/admin">Home</a></li>
          <li class="active">Order</li>
          
        </ol>
      </div>
       <div class="right_col" role="main">
            @if (Session::has('flash_notification.message'))
            <div class="col-sm-8"></div>
            <div class="col-sm-4 test">
                <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     {{ Session::get('flash_notification.message') }}
                </div>
            </div>       
            @endif
            </div>
      <section class="content-body">
     <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
<style>
  .nav-tabs > li.rounded.active > a,
  .nav-tabs > li.rounded.active > a:hover,
  .nav-tabs > li.rounded.active > a:focus
 {
    /*background-color:skyblue;*/
    font-weight:bolder;
    border-top-left-radius:10px;
    border-top-right-radius:10px;
    color:black;
}
.nav-tabs > li.rounded > a
 {
    background-color:skyblue;
    font-weight:bolder;
    border-top-left-radius:10px;
    border-top-right-radius:10px;
   color:white;
}
</style>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <!-- <li class="rounded active"><a href="/kitchenHome">New Order</a></li>
               <li class="rounded"> <a href="/processing_order">Processing</a></li> -->
               <li class="rounded active"> <a href="/serverd_order">  Order Details</a></li>
                <!--  <li class="rounded"> <a href="/addcategory" >Add Category</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr><th>Select</th>
                  <th>Order Id</th>
                  <th>Waiter Name</th>                
                  
                  <th>Grand Total </th>
                  <th> View </th>
                  
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cat as $key => $value) {  ?>
                    <tr>
                      <td><input type="checkbox"></td>
                         <td>{{$value->order_id}}</td>                       
                         <td>{{$value->waiter_name}}</td>
                        
                         <td>{{$value->grand_total}}</td>
                         <td> 
                        <a href="/order_details/{{$value->order_id}}"><button class="btn btn-danger" type="button">View Details</button></a>
              
                         </td>

                        
                    </tr>  





                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Select</th>
                  <th>Order Id</th>
                  <th>Waiter Name</th>                
                  
                  <th>Grand Total </th>
                  <th> View </th>
                 
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
       </div>   
    </section>
    <!-- /.content -->
  </div>





  <!-- /.content-wrapper -->
<script src="{{ asset('public/admin/src/dist/js/datatables.js') }}"></script>
  @endsection




