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
          <li class="active">Settings</li>
          
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
              <li class="rounded active"><a href="#tab_1" data-toggle="tab">Settings</a></li>
               <!-- <li class="rounded"> <a data-toggle="modal" data-target="#add_Letters">Add Tables</a></li> -->
                <!--  <li class="rounded"> <a href="/addcategory" >Add Category</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <!-- Edit Modal --><?php foreach ($cat as $key => $value) {  ?>

            {{ Form::open( [ 'url' => 'add_settings', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="{{$value->id}}">
       <input type="hidden" name="edit" id="edit" value="1">
        <h3>Settings </h3>
        <div class="clearfix"><br></div>
      </div>
     
      <div class="form-group">

            <label  class="col-sm-2 control-label">Name&nbsp;<span style="color:red;">*</span></label>
       <div class="col-sm-8">
       <input type="text" class="form-control input-sm" name="name" id="name" value="{{$value->name}}"  placeholder="name"  required >
       </div>
       </div>
      <br>
      <div class="form-group">

            <label  class="col-sm-2 control-label">Address&nbsp;<span style="color:red;">*</span></label>
       <div class="col-sm-8">
       <input type="text" class="form-control input-sm" name="address" id="address" value="{{$value->address}}" required >
       </div></div>
      <br>
      <div class="form-group">

            <label  class="col-sm-2 control-label">Phone&nbsp;<span style="color:red;">*</span></label>
       <div class="col-sm-8">
       <input type="text" class="form-control input-sm" name="phone" id="phone" value="{{$value->phone}}" required >
       </div></div>
      <br>
      <div class="form-group">

            <label  class="col-sm-2 control-label">Currency&nbsp;<span style="color:red;">*</span></label>
       <div class="col-sm-8">
       <input type="text" class="form-control input-sm" name="currency" id="currency" value="{{$value->currency}}"  required >
       </div></div>
      <br>
      <div class="form-group">

            <label  class="col-sm-2 control-label">Tax&nbsp;<span style="color:red;">*</span></label>
       <div class="col-sm-8">
       <input type="text" class="form-control input-sm" name="tax" id="tax" value="{{$value->tax}}" required >
       </div></div>
      <br>
      <div class="form-group">

            <label  class="col-sm-2 control-label">Vat Tax&nbsp;<span style="color:red;">*</span></label>
       <div class="col-sm-8">
       <input type="text" class="form-control input-sm" name="vattax" id="vattax"  value="{{$value->vattax}}" required >
       </div></div>
      <br>
      <div class="form-group">

            <label  class="col-sm-2 control-label">Additional Service Tax&nbsp;<span style="color:red;">*</span></label>
       <div class="col-sm-8">
       <input type="text" class="form-control input-sm" name="additionaltax" id="additionaltax" value="{{$value->additionaltax}}" required >
       </div></div>
      <br>
      <div class="form-group">

            <label  class="col-sm-2 control-label">Discount&nbsp;<span style="color:red;">*</span></label>
       <div class="col-sm-8">
       <input type="text" class="form-control input-sm" name="discount" id="discount" value="{{$value->discount}}" required >
       </div></div>
      <br>

     <div class="form-group">

            <label  class="col-sm-2 control-label">Discount&nbsp;<span style="color:red;">*</span></label>
       <div class="col-sm-5">
       <img alt="$value->logo" src="{!!URL::to('public/images/logo/'.$value->logo) !!}" width="30%"/>
       <input class="col-sm-5" type="file" class="form-control input-sm" name="logo" id="logo">
       </div></div>
       <br>
       <div class="form-group">

            <label  class="col-sm-2 control-label">Footer Text&nbsp;<span style="color:red;">*</span></label>
       <div class="col-sm-8">
       <input type="text" class="form-control input-sm" name="footer_text" id="footer_text"  value="{{$value->footer_text}}" required >
       </div></div>
          <!-- /.box-body -->
          <div class="box-footer">  
            <a href="" data-toggle="modal" data-target="#e{{$value->id}}" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Update</button>
          </div>
    
    {!! Form::close() !!}


<?php } ?>
<!-- Modal -->    
               
</div></div></div></div></div></section></section></div>




<
<!-- Modal -->
  <!-- /.content-wrapper -->
<script src="{{ asset('public/admin/src/dist/js/datatables.js') }}"></script>
  @endsection




