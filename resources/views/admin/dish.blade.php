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
          <li class="active">Dish</li>
          
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
              <li class="rounded active"><a href="#tab_1" data-toggle="tab">Admin</a></li>
               <li class="rounded"> <a data-toggle="modal" data-target="#add_Letters">Add Dish</a></li>
                <!--  <li class="rounded"> <a href="/addcategory" >Add Category</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Cusine Name</th>
                  <th>Dish Type</th>
                   <th>Dish Name</th>
                  <th>Dish Image</th>
                   <th>Dish Description</th>
                  <th>Price</th>
                  <th>Select</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cat as $key => $value) {  ?>
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->cusine_id}}</td>                        
                        <td>{{$value->dish_type}}</td>
                        <td><?php echo($value->dish_name); ?></td>
                        <td><?php echo($value->dish_image); ?></td>
                        <td>{{$value->dish_des}}</td>
                        <td>{{$value->price}}</td>
                        
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
{{ Form::open( [ 'url' => 'delete_dish', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
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
        <h3 class="modal-title" id="myModalLabel"> Edit Dish</h3>
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'add_dish', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="{{$value->id}}">
       <input type="hidden" name="edit" id="edit" value="1">
       
        <div class="clearfix"><br></div>
      </div>
      <input type="text" class="form-control input-sm" name="type" id="type"  value="{{$value->id}}" required >
     
      <br>
        <select class="form-control" name="cusine_id">         
                  <?php
                        $cat=get_cuisine();
                     foreach ($cat as $key => $value) { ?>
                  <option value="{{$value->id}}">{{$value->cusinename}}</option>                  
                  <?php } ?>          
      </select>
      <br>
       <select class="form-control" name="dish_type">         
                  <?php
                        $cat=get_dish_type();
                     foreach ($cat as $key => $value) { ?>
                  <option value="{{$value->id}}">{{$value->type}}</option>                  
                  <?php } ?>
      </select>
      <br>
      <input type="text" class="form-control input-sm" name="dish_name" id="dish_name"  value="" required >
      <br>
       <input type="file" class="form-control input-sm" name="dish_image" id="dish_image"  value="" required >
      <br>
       <textarea id="editor1" class="form-control" name="dish_des" rows="10" cols="80"></textarea>
                    <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
      <br>
      <input type="text" class="form-control input-sm" name="price" id="price" value="" required >
      <br>
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
                <th>Cusine Name</th>
                  <th>Dish Type</th>
                   <th>Dish Name</th>
                  <th>Dish Image</th>
                   <th>Dish Description</th>
                  <th>Price</th>
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
        <h3 class="modal-title" id="myModalLabel">>Add Dish</h3>
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'add_dish', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="0">
        <input type="hidden" name="edit" id="edit" value="0">
       
        <div class="clearfix"><br></div>
      </div>
     <select class="form-control" name="cusine_id">         
                  <?php
                        $cat=get_cuisine();
                     foreach ($cat as $key => $value) { ?>
                  <option value="{{$value->id}}">{{$value->cusinename}}</option>                  
                  <?php } ?>          
      </select>
      <br>
       <select class="form-control" name="dish_type">         
                  <?php
                        $cat=get_dish_type();
                     foreach ($cat as $key => $value) { ?>
                  <option value="{{$value->id}}">{{$value->type}}</option>                  
                  <?php } ?>
      </select>
     
      <br>
      <input type="text" class="form-control input-sm" name="dish_name" id="dish_name"  placeholder="Dish Name"  required >
      <br>
      <input type="file" class="form-control input-sm" name="dish_image" id="dish_image"  placeholder="dish Image"  required >
      <br>     
       
      <textarea id="text5" class="form-control"  name="dish_des" rows="10" cols="80">
                                          
                    </textarea><script>

  CKEDITOR.replace( 'text5' );

</script>
                   
                    <br>
      <input type="text" class="form-control input-sm" name="price" id="price" placeholder="Price"  required >
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
<script src="{{ asset('public/admin/src/dist/js/datatables.js') }}"></script>

  <?php 
function get_cuisine(){
    $tab_get=\DB::table('cusine')->Orderby('id','asc')->get();
    return $tab_get;
}

function get_dish_type(){
    $dish_get=\DB::table('dish_type')->Orderby('id','asc')->get();
    return $dish_get;
}
?>

<!-- CK Editor -->
 <script src="{{ asset('public/admin/ckeditor/ckeditor.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('public/admin/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <script src="{{ asset('public/admin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
 <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
  @endsection




