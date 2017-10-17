<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>invoice</title>
	<script src="/resources/assets/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="/resources/assets/redir.js" type="text/javascript"></script>
	{!!Html::style('resources/assets/css/bootstrap.css')!!}
	{!!Html::style('resources/assets/css/bootstrap.min.css')!!}
	{!!Html::style('resources/assets/css/bootstrap-theme.css')!!}
	{!!Html::style('resources/assets/css/bootstrap-theme.min.css')!!}

	{!!Html::style('resources/assets/js/bootstrap.js')!!}
	{!!Html::style('resources/assets/js/bootstrap.min.js')!!}
	{!!Html::style('resources/assets/js/npm.js')!!}
	{!!Html::style('resources/assets/js/jquery.min.js')!!}

	{!!Html::style('resources/assets/ads.js')!!}
	{!!Html::style('resources/assets/jquery-1.8.2.min.js')!!}
	{!!Html::style('resources/assets/redir.js')!!}
	{!!Html::style('resources/assets/scrap.js')!!}
	{!!Html::style('resources/assets/inv/jquery-ui.css')!!}
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script src="/resources/assets/inv/jquery-ui.js"></script>
<!--  <link rel="stylesheet" href="/resources/assets/inv/jquery-ui.css"> -->
</head>
<body>
	<div class="container-fluid">
		<section class="panel">
			<div class="panel panel-header ">
				<header class="panel panel-info">
					<h3>&nbsp;&nbsp;&nbsp;New Parchase Order Page</h3>
				</header>
			</div>	
			{!!Form::open(array('route'=>'add_pur_inv','id'=>'frmsave','method'=>'post'))!!}
			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<div class="form-group">
						<input type="text" name="fn" id="fn" class="form-control" value="{{Session::get('name')}}" >
					</div>
				</div>
				
				<div class="col-lg-3 col-sm-3">
					<div class="form-group">
						<?php
						$w_name=Session::get('name'); 
						$table=get_table(); ?>
						<select name="table" class="form-control" id="">
							<?php foreach ($table as $key => $value) { 
								$check_table = check_table($value->id,$w_name);
								if ($check_table > 0) {	

								}else{
								?>
		<option value="{{$value->id}}" >{{$value->tablename}}</option>
						<?php
							}
								} 
							 ?>
						</select>
					</div>
				</div>
				
				<div class="col-lg-3 col-sm-3">
					<div class="form-group">
				<input type="text" name="created_at" id="created_at" class="form-control" value="<?php echo date('M/j/y'); ?>" readonly placeholder="date" >
					</div>
				</div>
				
				<div class="col-lg-3 col-sm-3">
					<div class="form-group">
				<input type="text" name="order_id" id="order_id" class="form-control"  value="{{$f}}" >
					</div>
				</div>
				
				<!-- <div class="col-lg-4 col-sm-4">
					<div class="form-group">
				<input type="text" name="payment_type" id="payment_type" class="form-control" placeholder="">
					</div>
				</div> -->
				<div class="col-lg-12 col-sm-12">
					<table class="table table-bordered">
						<thead>
							
							<th>Dish name</th>
							<th>MRP Price</th>
							<th>Qty</th>
							
							
							<th>Amount</th>
							<th style="text-align: center">
								<a href="#" class="addRow" ><i class="glyphicon glyphicon-plus"></i></a>
							</th>
						</thead>
						<tbody>
							<tr>
								<td>
						<input type="text" name="productname[]" class="form-control productname">			
								</td>
					<td><input type="text" name="price[]" class="form-control price">
						
					</td>
					<td><input type="text" name="qty[]" class="form-control qty"></td>
					
					
					<td><input type="text" name="amount[]" class="form-control amount" readonly="true"></td>
					<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>


							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td style="border:none"></td>
								<td style="border:none"></td>
								
								
								<td style="text-align: center"><b>Total</b></td>
								<td style="text-align: center"><b class="total"></b></td>
								<td></td>
							</tr>
						</tfoot>
					</table>
					<input type="hidden" id="grand_total" name="grand_total" >
				</div>
			</div>
			<div class="col-lg-2col-sm-2">
				<div class="form-group">
			{!!Form::submit('Save',array('class'=>'btn btn-primary btn-default'))!!}	
			<a href="{{ url()->previous() }}" class="btn btn-primary btn-danger pull-right">Cancel</a>
				</div>
			</div>
			{!!Form::hidden('_token',csrf_token())!!}
			{!!Form::close()!!}

		</section>
	</div>
</body>
<!-- Modal -->

<!-- PHP  -->
<?php 
function get_table()
{
	$table= \DB::table('tablemaster')->where('tablestatus','=',1)->get();
 	return $table;
}
function check_table($id,$w_name){

	$check= \DB::table('orderdetails')->where('waiter_name',$w_name)->where('table_id',$id)->count();
	return $check;
}
?>
<!-- PHP -->
<script>
	$(document).ready(function(){
		var date_input=$('input[name="inv_date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'mm/dd/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
<script type="text/javascript">
var d1 = new Date();
var y1= d1.getFullYear();
var m1 = d1.getMonth()+1;
if(m1<10)
    m1="0"+m1;
var dt1 = d1.getDate();
if(dt1<10)
dt1 = "0"+dt1;
var d2 = y1+"-"+m1+"-"+dt1;
document.getElementById("inv_date").value=d2;
</script>
<script type="text/javascript">
$(document).ready(function() {
  
  $('#tax_rate').keyup(function(){

    var tax=$('#tax_rate').val();
    console.log(tax);
    console.log("hai");
    document.getElementById('average_cost').value = tax;

   

  });
});
</script>
  <script>

</script>

<script type="text/javascript">
		$('tbody').delegate('.productname','change',function(){
		var tr=$(this).parent().parent();
		var id = tr.find('.productname').val();
		var dataId= {'id':id};
		$.ajax({
			type: 'GET',
			url : '{!!URL::route('findPrice')!!}',
			dataType: 'json',
			data : dataId,
			success:function(data){
				var obj=data[0];
				var qty =1;
				tr.find('.productname').val(obj['value']);
				tr.find('.price').val(obj['price']);
				tr.find('.qty').val(qty);
				var amount = ( qty ) * (obj['price']) ;
		
				tr.find('.amount').val(amount);
				// tr.find('.productname').val(data.value);
				// tr.find('.price').val(data.price);
				// tr.find('.tax').val(data.tax_rate);
				// tr.find('.pid').val(data.batch_code);
				total();
			}
		});
	});	
	$('tbody').delegate('.productname','change',function(){
		var tr=$(this).parent().parent();
		tr.find('.price').focus();
	});
	$('tbody').delegate('.qty,.price,.dis,.free,.personal_mrp','keyup',function(){
		var tr=$(this).parent().parent();
		var qty= tr.find('.qty').val();
		//var price= tr.find('.price').val();
		var price_per= tr.find('.price').val();
		var amount = ( qty ) * (price_per) ;
		
		tr.find('.amount').val(amount);
		// var dis= tr.find('.dis').val();
		// var per_rate= tr.find('.rate').val();
		// var tax_rate= tr.find('.tax').val();
		// var free= tr.find('.free').val();
		// var val = (qty * per_rate);
		// console.log(qty );
		// console.log(per_rate);
		// console.log(val);
		// tr.find('.value').val(val);
		// var amount = ( val ) + (val * (tax_rate / 100)) ;
		 
		console.log(amount);
		 total();


	});
	$('.addRow').on('click',function(){
		addRow();
	});
	//findRowNumOnly('.qty');
	findRowNumOnly('.price');
	//findRowNumOnly('.dis');
	//findRowNumOnly('.free');
	findRowNumOnly('.tax');
	function total(){
		var total=0;
		$('.amount').each(function(i,e){
			var amount = $(this).val()-0;
			total +=amount;
		})
		$('.total').html(total.formatMoney(2,',','.'));
		document.getElementById('grand_total').value = total;
	}
	Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator){
		var n = this,
		decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
		decSeparator = thouSeparator == undefined ? "." : decSeparator,
		thouSeparator = thouSeparator == undefined ? "." : thouSeparator,
		sign = n < 0 ? "-" : "",
		i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
		j = (j = i.length) > 3 ? j % 3 : 0;
		return sign + (j ? i.substr(0,j) + thouSeparator : "")
		+ i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator)
		+(decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2): "");
	};
	function addRow() {
		var tr='<tr>'+								
					'<td>'+
					'<input type="text" name="productname[]" class="form-control productname">'+				
					'</td>'+
					'<td><input type="text" name="price[]" class="form-control price">'+
					
					'<td><input type="text" name="qty[]" class="form-control qty"></td>'+
 				
					
	'<td><input type="text" name="amount[]" class="form-control amount" readonly="true"></td>'+
'<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+						
'</tr>';
$('tbody').append(tr);
	};
	$('.remove').live('click',function(){
		var l=$('tbody tr').length;
		if (l == 1) {
			alert('You can`t Delete all recode');
		}else{
			$(this).parent().parent().remove();
			total();
		}
	});
	function findRowNum(input){
		$('tbody').delegate(input,'keydown',function(){
			var tr = $(this).parent().parent();
			number(tr.find(input));
		});
	}
	function findRowNumOnly(input){
		$('tbody').delegate(input,'keydown',function(){
			var tr = $(this).parent().parent();
			numberOnly(tr.find(input));
		});
	}
	function number(input){
		$(input).keypress(function(evt){
			var theEvent = evt || window.event;
			var key = theEvent.keyCode || theEvent.which;
			key = String.fromCharCode( key );
			var regex = /[-\d\.]/;
			var objRegex =/^-?\d*[\.]?\d*$/;
			var val = $(evt.target).val();
			if (!regex.test(key) || objRegex.test(val + key) || !theEvent.keyCode == 46 || !theEvent.keyCode == 8) {
				theEvent.returnValue = false;
				if (theEvent.preventDefault) theEvent.preventDefault(); 
			}
		})
	}
	function numberOnly(input)
	{
		$(input).keypress(function(evt){
			var e = event || evt;
			var charCode = e.which || e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) 
				return false;
				return true;
		});
	}
</script>
</html>