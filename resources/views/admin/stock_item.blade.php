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
          <li class="active">Product</li>
          
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
              <li class="rounded active"><a href="#tab_1" data-toggle="tab">Admin</a></li>
               <!-- <li class="rounded"> <a data-toggle="modal" data-target="#add_Letters">Add Product</a></li> -->
               <a data-toggle="modal" data-target="#add_Letters" class="btn btn-ls btn-primary" style="margin-top:5px;">Add Product</a>
                <!--  <li class="rounded"> <a href="/addcategory" >Add Category</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                 <th>Product Name</th>
                   <th>Product Category</th>
                   <th>Unit</th>
                  <th>Product Image</th>
                  <th>Select</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cat as $key => $value) {  ?>
                    <tr>
                        <td>{{$value->id}}</td>
                       
                        <td>{{$value->pro_name}}</td>
                        <td>{{$value->pro_cat}}</td>
                        <td>{{$value->unit}}</td>
                        <td>{{$value->pro_img}}</td>
                        
                        <td><a href="" data-toggle="modal" data-target="#d{{$value->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        <a href="" data-toggle="modal" data-target="#e{{$value->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a></td>
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
{{ Form::open( [ 'url' => 'delete_stock_item', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
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
        <h3>Edit Product</h3>
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => '/add_stock_item', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="{{$value->id}}">
       <input type="hidden" name="edit" id="edit" value="1">
       
        <div class="clearfix"><br></div>
      </div>
      <input type="text" class="form-control input-sm" name="pro_name" id="pro_name"  placeholder="name" value="{{$value->pro_name}}" required >
        <input type="hidden" name="id" value="{{$value->id}}">
      <br>
       <select class="form-control" name="pro_cat">     
          <option value="Vegetables">Vegetables</option>
          <option value="Meats">Meats</option>
          <option value="Rice">Rice</option>
       </select>
      <br>
       <select class="form-control" name="unit">     
          <option value="Kg">Kg</option>
          <option value="g">g</option>
          <option value="liter">lt</option>
       </select>
      <br>
     <input type="file" class="form-control input-sm" name="pro_img" id="pro_img"  placeholder="name" required >
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

                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>id</th>
                  <th>Product Name</th>
                  <th>Product Category</th>
                  <th>Unit</th>
                  <th>Product Image</th>
                  <th>Select</th>
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
        <!-- <h3 class="modal-title" id="myModalLabel">Delete Record</h3> -->
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'add_stock_item', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="0">
        <input type="hidden" name="edit" id="edit" value="0">
        <h3>Add Product</h3>
        <div class="clearfix"><br></div>
      </div>
     
       <input type="text" class="form-control input-sm" name="pro_name" id="pro_name"  placeholder="name"  required >
      <br>
       <select class="form-control" name="pro_cat">     
          <option value="Vegetables">Vegetables</option>
          <option value="Meats">Meats</option>
          <option value="Rice">Rice</option>
       </select>
      <br>
       <select class="form-control" name="unit">     
          <option value="Kg">Kg</option>
          <option value="g">g</option>
          <option value="liter">liter</option>
       </select>
      <br>
      <input type="file" class="form-control input-sm" name="pro_img" id="pro_img"  placeholder="name"  required >
      <br>
      
          <!-- /.box-body -->
          <div class="box-footer">  
            <a href="" data-toggle="modal" data-target="#add_Letters" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Create</button>
          </div>
    
    {!! Form::close() !!}
  </div>
  </div>
</div>
</div>
<!-- Modal -->
  <!-- /.content-wrapper -->
<script src="{{ asset('public/admin/src/dist/js/datatables.js') }}"></script>
  @endsection




