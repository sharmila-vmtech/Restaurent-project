@extends("admin_layout.layout") 
@section('title','Home')
@section("content")

<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->


<!-- Include Select2 CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.0/select2.min.css" />

<!-- CSS to make Select2 fit in with Bootstrap 3.x -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.0/select2-bootstrap.min.css" />

<!-- Include Select2 JS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.0/select2.min.js"></script>


<style type="text/css">
#select2Form .form-control-feedback {
    /* To make the feedback icon visible */
    z-index: 100;
}
</style>
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
                 <li class="rounded"> <a data-toggle="modal" data-target="#add_Tenth_Video">Add Tenth_Video</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                
<form id="select2Form" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="col-xs-4 control-label">Favorite color</label>
        <div class="col-xs-6">
            <select name="colors" class="form-control select2-select"
                multiple data-placeholder="Choose 2-4 colors">
                <option value="black">Black</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="orange">Orange</option>
                <option value="red">Red</option>
                <option value="yellow">Yellow</option>
                <option value="white">White</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 control-label">Favorite color using tags</label>
        <div class="col-xs-6">
            <input class="form-control" name="colors-tags"
                   multiple data-placeholder="Choose 2-4 colors" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-6 col-xs-offset-4">
            <button type="submit" class="btn btn-default">Validate</button>
        </div>
    </div>
</form>
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
<div class="modal fade" id="add_Tenth_Video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- <h3 class="modal-title" id="myModalLabel">Delete Record</h3> -->
      </div>
      <div class="modal-body">
{{ Form::open( [ 'url' => 'add_Tenth_Video', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
      <div class="col-md-12">
       <input type="hidden" name="id" id="hvid" value="0">
        <input type="hidden" name="edit" id="edit" value="0">
        <h3>Add Tenth_Video Info</h3>
        <div class="clearfix"><br></div>
      </div>
      
      <input type="text" class="form-control input-sm" name="Tenth_Video_name" id="Tenth_Video_name"  placeholder="Tenth_Video title" value="" required >
      <br>
      <input type="text" class="form-control input-sm" name="Tenth_Video_tag" id="Tenth_Video_tag" placeholder="Tenth_Video Tag" required value="">
      <br>
      <input type="text" class="form-control input-sm" name="Tenth_Video_file" id="Tenth_Video_img" placeholder="Tenth_Video Address" required value="">
      <br>
          <!-- /.box-body -->
          <div class="box-footer">  
            <a href="" data-toggle="modal" data-target="#add_Tenth_Video" class="btn btn-primary">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Update</button>
          </div>
    
    {!! Form::close() !!}
  </div>
  </div>
</div>
</div>
<!-- Modal -->


<script>
$(document).ready(function() {
    $('#select2Form')
        .find('[name="colors"]')
            .select2()
            // Revalidate the color when it is changed
            .change(function(e) {
                $('#select2Form').formValidation('revalidateField', 'colors');
            })
            .end()
        .find('[name="colors-tags"]')
            .select2({
                // Specify tags
                tags: ['Black', 'Blue', 'Green', 'Orange', 'Red', 'Yellow', 'White']
            })
            // Revalidate the color when it is changed
            .change(function(e) {
                $('#select2Form').formValidation('revalidateField', 'colors-tags');
            })
            .end()
        .formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                colors: {
                    validators: {
                        callback: {
                            message: 'Please choose 2-4 color you like most',
                            callback: function(value, validator, $field) {
                                // Get the selected options
                                var options = validator.getFieldElements('colors').val();
                                return (options != null && options.length >= 2 && options.length <= 4);
                            }
                        }
                    }
                },
                'colors-tags': {
                    validators: {
                        callback: {
                            message: 'Please choose 2-4 color you like most',
                            callback: function(value, validator, $field) {
                                // Get the selected options
                                var options  = validator.getFieldElements('colors-tags').val(),
                                    options2 = options.split(',');
                                return (options2 !== null && options2.length >= 2 && options2.length <= 4);
                            }
                        }
                    }
                }
            }
        });
});
</script>
<script src="{{ asset('public/admin/src/dist/js/datatables.js') }}"></script>
  @endsection




