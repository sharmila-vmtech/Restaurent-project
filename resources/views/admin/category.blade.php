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
          <li class="active">Category</li>
          
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
              <li class="rounded active"><a href="#tab_1" data-toggle="tab">Category Details</a></li>
             <a href="" data-toggle="modal" data-target="#add" class="btn btn-ls btn-primary" style="margin-top:5px;">Add </a>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>  Category Name </th>
                  <th> Category Tag</th>
                  <th> Fav Icon </th>
                  <th> Color Code </th>
                  <th>Options</th>
                  <th>Under Shops</th>
                 {{--  <th>Select</th> --}}
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cat as $key => $value) {  ?>
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->cat_name}}</td>
                        <td>{{$value->cat_tag}}</td>
                        <td>{{$value->cat_fav_icon}}</td>
                        <td>{{$value->cat_color}}</td>
                         <td><a href="" data-toggle="modal" data-target="#d{{$value->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        <a href="" data-toggle="modal" data-target="#e{{$value->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a></td> 
                        <td>{{$value->id}}</td>
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
{{ Form::open( [ 'url' => 'delete_cat', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="{{$value->id}}">
        <h3>Are You Sure Delete This Record ?</h3>
        <div class="clearfix"><br></div>
      </div>
    </div>
          <!-- /.box-body -->
          <div class="box-footer">  
            <a href="{{ URL::previous() }}" class="btn btn-primary">Cancel</a>
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
        <h3 class="modal-title" id="myModalLabel">Delete Record</h3>
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'edit_cat', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="{{$value->id}}">
        <h3>Edit Dist Info</h3>
        <div class="clearfix"><br></div>
      </div>
      <input type="text" class="form-control input-sm" name="location" id="location"  placeholder="Location" value="{{$value->cat_name}}" required >
      <br>
      <input type="text" class="form-control input-sm" name="pin" id="pin" placeholder="Pincode" required value="{{$value->cat_tag}}">
      <br>
      <input type="text" class="form-control input-sm" name="cat_fav" id="pin" placeholder="Fav Icon" required value="{{$value->cat_fav_icon}}">
      <br>
      <input type="text" class="form-control input-sm" name="cat_color" id="pin" placeholder="color code" required value="{{$value->cat_color}}">
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
                   <th>S.No</th>
                  <th>  Category Name </th>
                  <th> Category Tag</th>
                  <th> Fav Icon </th>
                  <th> Color Code </th>
                  <th>Options</th>
                  <th>Under Shops</th>
                 {{--  <th>Select</th> --}}
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



<!-- Edit Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel">Delete Record</h3>
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'add_cat', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="">
        <h3>Edit Dist Info</h3>
        <div class="clearfix"><br></div>
      </div>
      <input type="text" class="form-control input-sm" name="cat_name" id="cat_name"  placeholder="Category Name" value="" required >
      <br>
      <input type="text" class="form-control input-sm" name="cat_tag" id="cat_tag" placeholder="Category Tag" required value="">
      <br>
          <!-- /.box-body -->
          <div class="box-footer">  
            <a href="" data-toggle="modal" data-target="#add" class="btn btn-ls btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Update</button>
          </div>
    
    {!! Form::close() !!}
  </div>
  </div>
</div>
</div>
<!-- Modal -->
