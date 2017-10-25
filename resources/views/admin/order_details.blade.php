@extends("admin_layout.layout") 
@section('title','Home')
@section("content")
{!!Html::style('resources/assets/js/npm.js')!!}
  {!!Html::style('resources/assets/js/jquery.min.js')!!}

  {!!Html::style('resources/assets/ads.js')!!}
  {!!Html::style('resources/assets/jquery-1.8.2.min.js')!!}
  {!!Html::style('resources/assets/redir.js')!!}
  {!!Html::style('resources/assets/scrap.js')!!}
  {!!Html::style('resources/assets/inv/jquery-ui.css')!!}
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
          <li class="active">Bill</li>
          
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
           
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              {{ Form::open( [ 'url' => 'add_order_table', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }}
                 <table id="example1" class="table table-bordered table-striped">
                <tbody>
              
                    <tr>
                        <th colspan="2">Order Id</th>
                        <td colspan="2">{{$order_id}} <input type="hidden" class="form-control" name="order_id"  value="{{$order_id}}" required></td>
                    </tr>
                    <tr>
                        <th colspan="2">Time</th>
                        <td colspan="2">{{$created_at}} </td>                       
                    </tr>  
                    <tr>
                        <th colspan="2">Serve Status</th>
                        <td colspan="2">{{$serve_status}}</td>                       
                    </tr>
                    <tr>
                        <th>Dish</th>
                        <th>Quantity</th> 
                        <th>Price</th>
                        <th>Total</th>                       
                    </tr>  
                      <?php foreach ($cat as $key => $value) {  ?>                  
                     <tr>
                        <td>{{$value->dish_name}}</td>
                        <td>{{$value->quantity}}</td> 
                        <td>{{$value->price}}</td>
                        <td>{{$value->total}}</td>                        
                    </tr>  
                <?php } ?>
                <?php foreach ($set as $key => $value) {  ?>
                     <tr>
                        <td colspan="2"></td>
                        <th>Grant Total</th>
                        <td>{{$grand_total}} <input type="hidden" class="form-control" name="amount"  value="{{$grand_total}}" required></td>                      
                    </tr>
                     <tr>
                        <th colspan="2">Tax</th>
                       
                        <td colspan="2">{{$value->tax}}% <input type="hidden" class="form-control" name="tax"  value="{{$value->tax}}" required></td>
                    </tr>
                    <tr>
                        <th colspan="2">Vat tax</th>
                        
                        <td colspan="2">{{$value->vattax}}% <input type="hidden" class="form-control" name="vattax"  value="{{$value->vattax}}" required></td>                       
                    </tr>  
                    <tr>
                        <th colspan="2">Additional Service Tax</th>
                       
                        <td colspan="2">{{$value->additionaltax}}% <input type="hidden" class="form-control" name="additionaltax"  value="{{$value->additionaltax}}" required></td>                       
                    </tr>
                   <?php } ?>
                   <tr>
                        <th colspan="2">Payment Mode</th>                    
                        <td colspan="2"> <select class="form-control" name="paymentmode">         
                  <?php
                        $cat=get_payment();
                     foreach ($cat as $key => $value) { ?>
                  <option value="{{$value->id}}">{{$value->pay_type}}</option>                  
                  <?php } ?>
                  </select></td>                       
                    </tr>
                    <script>
                                  </script>
                    <tr>
                        <th colspan="2">Additional Discount</th>
                      
                        <td colspan="2">
                        


                       <label class="radio-inline"> <input type="radio"  name="discount" runat="server" id="radioImg" value="Image" text="Image"/>  Yes</label>
                        <label class="radio-inline">
<input type="radio"  name="discount" runat="server" id="radioVideo" value="0" text="Video" /> No</label> 
<div ID="pnlImgSlider1" style="display:none;">
  <input type="text" name="discount" class="form-control" >
</div>
<div ID="pnlVideoSlider1" style="display:none;">
</div>

                        <p id="demo"></p>
                        </td>                       
                    </tr>
                    <tr>
                      <td colspan="2"><button type="submit" class="btn btn-success pull-left">Paid</button></td>
                      <td colspan="2">
                      <a href="{{ URL::previous() }}" class="btn btn-danger pull-right">Cancel</a>
                      
                    </tr>
                </tbody>
                
              </table> {!! Form::close() !!}
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

<script type="text/javascript">
$(function(){
    $('input:radio').change(function(){
        if($(this).val() =="Image") {
            $("#pnlImgSlider1").show();
            $("#pnlVideoSlider1").hide();
        }
        else {
            $("#pnlVideoSlider1").show();
            $("#pnlImgSlider1").hide();
        } 
    }); 
});
</script>


<?php
function get_payment(){
    $dish_get=\DB::table('paymentmode')->get();
    return $dish_get;
}
 ?>

  <!-- /.content-wrapper -->
<script src="{{ asset('public/admin/src/dist/js/datatables.js') }}"></script>
  @endsection




