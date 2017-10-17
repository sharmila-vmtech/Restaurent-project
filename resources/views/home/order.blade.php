 @extends("layout.layout") 
@section('title','Home')
@section("content") 

<style type="text/css">
  /* Latest compiled and minified CSS included as External Resource*/

/* Optional theme */

/*@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');*/

.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
    background-color: #fff;
}
.panel-primary > .panel-heading {
    color: #fff;
    background-color: #cb1452;
    border-color: #cb1452;
}
.panel-primary {
    border-color: #cb1452;
}
.one{
  margin-left: 0px;
}
</style>
<script type="text/javascript">
  var room = 1;
function education_fields() {
 3
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
  divtest.setAttribute("class", "form-group removeclass"+room);
  var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-xs-1 col-sm-1 nopadding"></div><div class="col-xs-5 col-sm-5 nopadding"><div class="form-group"><select class="form-control" id="mySelect" name="dish_name[]"><?php $cat=get_dish();foreach ($cat as $key => $value) { ?><option value="{{$value->id}}">{{$value->dish_name}}</option><?php } ?></select></div></div><div class="col-xs-3 col-sm-4 nopadding"><div class="form-group"><input type="number" class="form-control" min="1" max="10000" id="quantity" name="quantity[]"  placeholder="Quantity" required></div></div><div class="col-xs-2 col-xs-2 nopadding"><div class="form-group"><div class="input-group"><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="input-group-btn"></div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
     $('.removeclass'+rid).remove();
   }
</script>
  <div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" style="visibility: hidden;" class="btn btn-success btn-circle"></a>
             </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" style="visibility: hidden;" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <!-- <p><small></small></p> -->
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-3" type="button" style="visibility: hidden;" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <!-- <p><small>Schedule</small></p> -->
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" style="visibility: hidden;" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <!-- <p><small>Cargo</small></p> -->
            </div>
        </div>
    </div>
    
    {{ Form::open( [ 'url' => '/add_order', 'class'=>'form-horizontal','method' => 'post', 'files' => true ] ) }} 

        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Table</h3>
            </div>
            <div class="panel-body">
              <div class="col-xs-6 col-sm-5 nopadding">
                <select class="form-control" name="table_name">         
                  <?php
                        $cat=get_table();
                     foreach ($cat as $key => $value) { ?>
                  <option value="{{$value->id}}">{{$value->tablename}}</option>                  
                  <?php } ?>          
                </select></div>
              <div class="col-xs-6 col-sm-5 nopadding">
                <select class="form-control" name="waiter_name">         
                  <?php
                        $cat=get_waiter();
                     foreach ($cat as $key => $value) { ?>
                  <option value="{{$value->id}}">{{$value->waiter_name}}</option>                  
                  <?php } ?>          
                </select></div><br><br>

                <button class="btn btn-warning nextBtn pull-left" href="/order" type="button">Cancel</button>
                <button class="btn btn-info nextBtn pull-right" type="button">New Order</button>
            </div>
        </div>  
        
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
                 <h3 class="panel-title">Add Dish</h3>
            </div>
            <div class="panel-body">
            <div class="col-xs-1 col-sm-1 nopadding one"></div>
<div class="col-xs-5 col-sm-5 nopadding">
  <div class="form-group">
      <!-- <select class="form-control" id="mySelect" onchange="myFunction()" name="dish_name[]"> -->
    <select class="form-control" id="mySelect" name="dish_name[]">
         
                  <?php
                        $cat=get_dish();
                     foreach ($cat as $key => $value) { ?>
                  <option value="{{$value->id}}">{{$value->dish_name}}</option>
              
                  <?php } ?>
                </select>
                
                  
  </div>
</div>
<div class="col-xs-3 col-sm-4 nopadding">  
  <div class="form-group">
  
      <input type="number" class="form-control" value="1" min="1" max="10000" id="quantity" name="quantity[]"  placeholder="Quantity" required>
  </div>
</div>

<div class="col-xs-2 col-sm-2 nopadding">
  <div class="form-group">
    <div class="input-group">
      
      <div class="input-group-btn">
        <button class="btn btn-success" type="submit"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
</div><br>
<div id="education_fields">
          
  </div>
<br>            
                <button class="btn btn-warning pull-left" type="submit">Place Order</button>
                 <button class="btn btn-info nextBtn pull-right" type="button">Finish Order</button>
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                 <h3 class="panel-title">Table</h3>
            </div>
            <div class="panel-body">
              
              

                <button class="btn btn-warning nextBtn pull-left" href="/order" type="button">Cancel</button>
                <button class="btn btn-info nextBtn pull-right" type="button">Pdf</button>
            </div>
        </div> 
        
        
        </div>
        
        
    {!! Form::close() !!}
</div>

<script type="text/javascript">

  $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');
});
</script>
  <?php 
function get_table(){
    $tab_get=\DB::table('tablemaster')->where('tablestatus','=','0')->Orderby('id','asc')->get();
    return $tab_get;
}

function get_dish(){
    $dish_get=\DB::table('dish')->Orderby('id','asc')->get();
    return $dish_get;
}
function get_waiter(){
    $dish_get=\DB::table('waiter')->Orderby('id','asc')->get();
    return $dish_get;
}
?>
  @endsection