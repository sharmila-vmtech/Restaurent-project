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
                 <li class="rounded"> <a data-toggle="modal" data-target="#add_Audio">Add Audio</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  
                 <th>Audio Text</th>
                  <th>Audio Tag</th>
                 <th>Audio Image</th>
                 
                  <th>Select</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($Audio as $key => $value) {  ?>
                    <tr>
                        <td>{{$value->id}}</td>
                       
                        <td>{{$value->Audio_name}}</td>
                        <td>{{$value->Audio_tag}}</td>
                        <td>{{$value->Audio_tag}}</td>
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
{{ Form::open( [ 'url' => 'delete_Audio', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
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
        <h3 class="modal-title" id="myModalLabel">Delete Record</h3>
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'add_Audio', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="{{$value->id}}">
        <input type="hidden" name="edit" id="edit" value="1">
        <h3>Edit Dist Info</h3>
        <div class="clearfix"><br></div>
      </div>
      
      <input type="text" class="form-control input-sm" name="Audio_name" id="Audio_name"  placeholder="Audio Name" value="{{$value->Audio_name}}" required >
      <br>
      <input type="text" class="form-control input-sm" name="Audio_tag" id="Audio_tag" placeholder="Audio Tag" required value="{{$value->Audio_tag}}">
      <br>
        <input type="file" class="form-control input-sm" name="Audio_file" id="Audio_img" placeholder="Audio Image" required value="">
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
                  
                  <th>Audio Text</th>
                  <th>Audio Tag</th>
                 <th>Audio Image</th>
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
  <!-- /.content-wrapper -->


<!-- Edit Modal -->
<div class="modal fade" id="add_Audio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- <h3 class="modal-title" id="myModalLabel">Delete Record</h3> -->
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'add_Audio', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="0">
        <input type="hidden" name="edit" id="edit" value="0">
        <h3>Add Audio Info</h3>
        <div class="clearfix"><br></div>
      </div>
      
      <input type="text" class="form-control input-sm" name="Audio_name" id="Audio_name"  placeholder="Audio title" value="" required >
      <br>
      <input type="text" class="form-control input-sm" name="Audio_tag" id="Audio_tag" placeholder="Audio Tag" required value="">
      <br>
      <input type="file" class="form-control input-sm" name="Audio_file" id="Audio_img" placeholder="Audio Image" required value="">
      <br>
          <!-- /.box-body -->
          <div class="box-footer">  
            <a href="" data-toggle="modal" data-target="#add_Audio" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Update</button>
          </div>
    
    {!! Form::close() !!}
  </div>
  </div>
</div>
</div>
<!-- Modal -->


<script src="{{ asset('public/admin/src/dist/js/datatables.js') }}"></script>
  @endsection




