@extends("kitchen_manager.admin_layout.layout") 
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
      <section class="content-body">
     <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
<style>
  .nav-tabs > li.rounded.active > a,
  .nav-tabs > li.rounded.active > a:hover,
  .nav-tabs > li.rounded.active > a:focus
 {
    background-color:skyblue;
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
              <li class="rounded active"><a href="/man_kitchenHome">New Order</a></li>
               <li class="rounded"> <a href="/man_processing_order">Processing</a></li>
               <li class="rounded"> <a href="/man_serverd_order"> Serverd Order</a></li>
                <!--  <li class="rounded"> <a href="/addcategory" >Add Category</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr><th>Select</th>
                  
                  
                  <th>Order Id</th>

                 <th>Table Name</th>
                 <th>Waiter Name</th>
                  <th>Dish Name</th>
                   <th>Quantity </th>
                   <th>Status </th>
                 
                  
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cat as $key => $value) {  ?>
                    <tr>
                      <td><input type="checkbox"></td>
                        <td>{{$value->order_id}}</td>
                       
                        <td>{{$value->table_id}}</td>
                         <td>{{$value->waiter_name}}</td>
                        <td>{{$value->dish_name}}</td>
                         <td>{{$value->quantity}}</td>
                         <td> 
          
              
  
                        {{ Form::open( [ 'url' => 'update_order_2', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
     
                <input type="hidden" name="id" id="id" value="{{$value->id}}">
                <input type="hidden" name="status" id="status" value="0">
  
                         <button class="btn btn-warning nextBtn" type="submit">Processing</button>
              {!! Form::close() !!}
              
                         </td>

                        
                    </tr>  
<!-- Delete  Modal -->

<!-- Modal -->




                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Select</th>
                 <th>Order Id</th>

                 <th>Table Name</th>
                 <th>Waiter Name</th>
                  <th>Dish Name</th>
                   <th>Quantity </th>
                   <th>Status </th>
                 
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




