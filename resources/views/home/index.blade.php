@extends("layout.layout") 
@section('title','Home')
@section("content")
  <?php 
                   $id= Session::get('member_id');
                   // echo "<p style='color:red';>".$id."</p>";
                   // die();
                     ?>
<style type="text/css">
	/*
Code snippet by maridlcrmn for Bootsnipp.com
Follow me on Twitter @maridlcrmn
Image credits: unsplash.com, uifaces.com/authorized
Image placeholders: placemi.com
*/


#t-cards {
    padding-top: 80px;
    padding-bottom: 80px;
    background-color: #345;    
}

/********************************/
/*          Panel cards         */
/********************************/
.panel.panel-card {
    position: relative;
    height: 241px;
    border: none;
    overflow: hidden;
}
.panel.panel-card .panel-heading {
    position: relative;
    z-index: 2;
    height: 120px;
    border-bottom-color: #fff;
    overflow: hidden;
    
    -webkit-transition: height 600ms ease-in-out;
            transition: height 600ms ease-in-out;
}
.panel.panel-card .panel-heading img {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 1;
    width: 120%;
    
    -webkit-transform: translate3d(-50%,-50%,0);
            transform: translate3d(-50%,-50%,0);
}
.panel.panel-card .panel-heading button {
    position: absolute;
    top: 10px;
    right: 15px;
    z-index: 3;
}
.panel.panel-card .panel-figure {
    position: absolute;
    top: auto;
    left: 50%;
    z-index: 3;
    width: 70px;
    height: 70px;
    background-color: #fff;
    border-radius: 50%;
    opacity: 1;
    -webkit-box-shadow: 0 0 0 3px #fff;
            box-shadow: 0 0 0 3px #fff;
    
    -webkit-transform: translate3d(-50%,-50%,0);
            transform: translate3d(-50%,-50%,0);
    
    -webkit-transition: opacity 400ms ease-in-out;
            transition: opacity 400ms ease-in-out;
}

.panel.panel-card .panel-body {
    padding-top: 40px;
    padding-bottom: 20px;

    -webkit-transition: padding 400ms ease-in-out;
            transition: padding 400ms ease-in-out;
} 

.panel.panel-card .panel-thumbnails {
    padding: 0 15px 20px;
}
.panel-thumbnails .thumbnail {
    width: 184px;
    max-width: 100%;
    margin: 0 auto;
    background-color: #fff;
} 


.panel.panel-card:hover .panel-heading {
    height: 55px;
    
    -webkit-transition: height 400ms ease-in-out;
            transition: height 400ms ease-in-out;
}
.panel.panel-card:hover .panel-figure {
    opacity: 0;
    
    -webkit-transition: opacity 400ms ease-in-out;
            transition: opacity 400ms ease-in-out;
}
.panel.panel-card:hover .panel-body {
    padding-top: 20px;
    
    -webkit-transition: padding 400ms ease-in-out;
            transition: padding 400ms ease-in-out;
}
.btn-glyphicon { padding:8px; background:#ffffff; margin-right:4px; }
.icon-btn { padding: 1px 15px 3px 2px; border-radius:50px;}
</style>
<section id="t-cards">
    <div class="container">
        <div class="row">
             <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->

                    @if (Session::has('member_id'))
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Session::get('name') }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/user/login') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                       
                    @else
                         <li><a href="{{ url('/user/login') }}">Login</a></li>
                       <!--  <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @endif
                </ul>
                <br>
        </div>
        <div class="row">

          <?php 
            
          foreach ($cat as $key => $value) {  
            
             
            ?>

             <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <?php $name=get_table_name($value->table_id); ?>
                        <button class="btn btn-primary btn-sm" role="button">Table Name - {{$name}}</button>
                    </div>
                    <div class="panel-figure">
                        <img class="img-responsive img-circle" src="{!!URL::to('public/images/123.jpg') !!}" />
                    </div>
                    <div class="panel-body text-center">
                         <?php if ($value->serve_status == 'Served') { ?>
                                        <a class="btn btn-success">Finish Order</a>
                                    <?php }else {  } ?>
                        <h4 class="panel-header"><a href="" data-toggle="modal" data-target="#d{{$value->id}}" >View Order</a></h4>
                        <small>Want To Print</small>
                    </div>
                    <div class="panel-thumbnails">
                        
                            <div class="col-md-12">
                                <div class="thumbnail">
                                   
                                   <!--  <a href=""><p style="text-align:center;">Print Bill</p></a> -->
                                    <a href="" data-toggle="modal" data-target="#d{{$value->id}}" ><p style="text-align:center;">View Order</p></a>
                                </div>
                            </div>
                    </div>
                </div>   
    		</div>

<!-- Delete  Modal -->
<div class="modal fade" id="d{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel">View Record</h3>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
        <br>
            <?php $order_info=get_order_info_by_table_id($value->table_id); ?>
            <?php foreach ($order_info as $key => $value) { ?>
            <?php $o_id=$value->order_id; ?>
            <?php } ?>
             <div class="panel-heading panel-primary">
        <h1 class="panel-title">Order ID : {{$o_id}}</h1>
    </div>
            
            <ul class="list-group">
            <?php foreach ($order_info as $key => $value) { ?>
                  <li class="list-group-item">{{$value->dish_name}} -{{$value->quantity}}</li>
            <?php } ?>
            </ul> 
        <br>
      </div>
    </div>
          <!-- /.box-body -->
          <div class="box-footer">  
            <a type="button"  data-dismiss="modal" aria-label="Close" class="btn btn-primary">Cancel</a>
           
          </div>
    
  </div>
</div>
</div>
<!-- Modal -->
    		<?php } ?>
		    
	    </div>
        <?php
            $p=get_table_2();
            if ($p == 0) { ?>
            <a class="btn icon-btn btn-success pull-right" href="/order/{{$id}}"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>Add</a>    
         <?php    }else{ }
         ?>


        
    </div>

<?php 
function get_table_2()
{
    $w_name=Session::get('name');  
    $table= \DB::table('tablemaster')->where('tablestatus','=',1)->count();
    $table2= \DB::table('orderdetails')->distinct('table_id')->where('waiter_name','=',$w_name)->where('status','=',0)->count();
    if ($table == $table2) {
        return $print = 1;
    }else{
        return $print = 0;
    }
}
function get_order_info_by_table_id($id)
{
    $w_name=Session::get('name'); 
    $table2= \DB::table('orderdetails')->where('table_id','=',$id)->where('waiter_name','=',$w_name)->get();
    return $table2;
}
function get_table_name($id)
{
    $table= \DB::table('tablemaster')->where('id','=',$id)->get();
    foreach ($table as $key => $value) {
        $tablename=$value->tablename;
    }
    return $tablename;
}

 ?>




</section>


  @endsection