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
          <li class="active">Tables</li>
          
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
              <li class="rounded active"><a href="/kitchenHome">New Order</a></li>
               <li class="rounded"> <a href="/processing_order"> Processing</a></li>
               <li class="rounded"> <a href="/serverd_order"> Serverd Order</a></li>
                <!--  <li class="rounded"> <a href="/addcategory" >Add Category</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <table id="example" class="table table-bordered table-striped">
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
                <?php foreach ($tab as $key => $kt) {  ?>
                    <tr>
                    	<td><input type="checkbox"></td>
                        <td>{{$value->orderid}}</td>
                       
                        <td>{{$value->table_name}}({{$kt->tablename}})</td>
                        <td>{{$value->waiter_name}}</td>
                        <td>{{$value->dish_name}}</td>
                         <td>{{$value->quantity}}</td>
                         <td> 
						{{ Form::open( [ 'url' => 'update_order', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
     
       					<input type="hidden" name="id" id="id" value="{{$value->id}}">
       					<input type="hidden" name="status" id="status" value="2">
  
                         <button class="btn btn-info nextBtn" type="submit">New</button>
							{!! Form::close() !!}
                         </td>

                        
                    </tr>  
<!-- Delete  Modal -->
<div class="modal fade" id="d{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel">Delete Record</h3>
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'delete_table', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="{{$value->id}}">
        <h3>Are You Sure Delete This Record ?</h3>
        <div class="clearfix"><br></div>
      </div>
    </div>
          <!-- /.box-body -->
          <div class="box-footer">  
            <a href="" data-toggle="modal" data-target="#d{{$value->id}}" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Delete</button>
          </div>
    {!! Form::close() !!}
  </div>
</div>
</div>
<!-- Modal -->


<!-- Edit Modal -->
<div class="modal fade" id="e{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel">Edit Table</h3>
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'addtable', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="{{$value->id}}">
       <input type="hidden" name="edit" id="edit" value="1">
       
        <div class="clearfix"><br></div>
      </div>
      <input type="text" class="form-control input-sm" name="tablename" id="tablename"  placeholder="Location" value="" required >
      <br>
       <input type="text" class="form-control input-sm" name="tablestatus" id="tablestatus"  placeholder="Location" value="" required >
      <br>
     
          <!-- /.box-body -->
          <div class="box-footer">  
            <a href="" data-toggle="modal" data-target="#e{{$value->id}}" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Update</button>
          </div>
    
    {!! Form::close() !!}
  </div>
  </div>
</div>
</div>
<!-- Modal -->

                <?php } ?> <?php } ?>
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




<!-- Edit Modal -->
<div class="modal fade" id="add_Letters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel">Add Table</h3>
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'addtable', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="0">
        <input type="hidden" name="edit" id="edit" value="0">
       
        <div class="clearfix"><br></div>
      </div>
     <input type="text" class="form-control input-sm" name="tablename" id="tablename"  placeholder="name"  required >
      <br>
       
      
          <!-- /.box-body -->
          <div class="box-footer">  
            <a href="" data-toggle="modal" data-target="#add_Letters" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Submit</button>
          </div>
    
    {!! Form::close() !!}
  </div>
  </div>
</div>
</div>
<!-- Modal -->
  <!-- /.content-wrapper -->

  @endsection




