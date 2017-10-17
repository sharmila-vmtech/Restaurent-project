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
          <li class="active">Users</li>
          
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
              <li class="rounded active"><a href="#tab_1" data-toggle="tab">Users Details</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> S.No</th>
                  <th> User Name </th>
                  <th> Email </th>
                  <th> Mobile </th>
                  <th> Image </th>
                  <th> View Profile </th>
                 {{--  <th>Select</th> --}}
                </tr>
                </thead>
                <tbody>
                <?php foreach ($user as $key => $value) {  ?>
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->mobile_no}}</td>
                        <td>{{$value->image}}</td>
                        <td><a href="" data-toggle="modal" data-target="#d{{$value->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a></td> 
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

      <div class="col-md-12">
       <label for="Name" class="forum-group"><p>Name : {{$value->name}}</p></label>
       <br>
       <label for="Name" class="forum-group"><p>Email : {{$value->email}}</p></label>
       <br>
    <label for="Name" class="forum-group"><p>Mobile no : {{$value->mobile_no}}</p></label>
    <br>
       <label for="Name" class="forum-group"><p>Image : <?php if($value->image == '') {  ?>
                  <img class="thumbnail img-preview" src="{{ asset('public/images/profile/profile.jpg') }}" title="Preview Logo">
                  
                <?php }else{ ?>
                 <img class="thumbnail img-preview" src="{{ asset('public/images/profile/'.$value->image) }}" title="Preview Logo">
                <?php } ?></p>
</label><br>
       <label for="Name" class="forum-group"><p>Address : {{$value->address}}</p></label><br>
<label for="Name" class="forum-group"><p>Taluk : {{$value->taluk}}</p></label><br>
<label for="Name" class="forum-group"><p>Location : {{$value->location}}</p></label><br>     
<label for="Name" class="forum-group"><p>District: {{$value->district}}</p></label><br>     
<label for="Name" class="forum-group"><p>Pincode: {{$value->pincode}}</p></label><br>     <label for="Name" class="forum-group"><p>Blood group: {{$value->blood_group}}</p></label><br>
{{-- <label for="Name" class="forum-group"><p>Gender: {{$value->gender}}</p></label><br> --}}
<label for="Name" class="forum-group"><p>Website : {{$value->Website}}</p></label><br>
<label for="Name" class="forum-group"><p>Date of birth : {{$value->Dob}}</p></label><br> 
<label for="Name" class="forum-group"><p>Profession : {{$value->profession}}</p></label><br> 
<label for="Name" class="forum-group"><p>Privacy : {{$value->privacy_active}}</p></label><br>      

      </div>
    </div>
          <!-- /.box-body -->
          <div class="box-footer">  
            <a href="" data-toggle="modal" data-target="#d{{$value->id}}" class="btn btn-primary pull-right">Cancel</a>
            
          </div>
    
  </div>
</div>
</div>
<!-- Modal --> 
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                   <th> S.No</th>
                  <th> User Name </th>
                  <th> Email </th>
                  <th> Mobile </th>
                  <th> Image </th>
                  <th> View Profile </th>
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




