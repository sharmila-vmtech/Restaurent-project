<!doctype HTML>

<html>

<head>

 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- jQuery 2.2.3 -->

<script src="{{ asset('public/admin/src/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>



<!-- Bootstrap 3.3.6 -->

<script src="{{ asset('public/admin/src/bootstrap/js/bootstrap.min.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
<script type="text/javascript">
        function print_page() {
            var ButtonControl = document.getElementById("btnprint");
            ButtonControl.style.visibility = "hidden";
            window.print();
        }
    </script>
</head>

<body>
<div class="container">
 <input type="button" class="pull-right" id="btnprint" value="Print this Page" onclick="print_page()" /><br>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 ">
        <div class="invoice-title">
            <img alt="{{$logo}}" src="{!!URL::to('public/images/logo/'.$logo) !!}" width="15%"/>         
          <h3 class="pull-right">Order Id {{$order_id}}</h3>
        </div>
        <hr>
        <div class="row">
          <div class="col-xs-6">
            <address>
            <h2><strong>{{$name}}</strong></h2>
              {{$address}}<br>
              
            </address>
          </div>
          
          <div class="col-xs-6 text-right">
            <address>
              <strong>Order Date:</strong><br>
              {{$created_at}}<br><br>
            </address>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><strong>Order summary</strong></h3>
          </div>
          <div class="panel-body">
            <div >
              <table class="table">
                <thead>
                                <tr>
                      <td class="text-left"><strong>Dish</strong></td>
                      <td class="text-center"><strong>Price</strong></td>
                      <td class="text-center"><strong>Quantity</strong></td>
                      <td class="text-right"><strong>Total</strong></td>
                                </tr>
                </thead>
                <tbody>
                    <?php foreach ($cat as $key => $value) {  ?>                  
                     <tr>
                        <td class="text-left">{{$value->dish_name}}</td>
                        <td class="text-center">{{$value->price}}</td>
                        <td class="text-center">{{$value->quantity}}</td> 
                        <td class="text-right">{{$value->total}}</td>                       
                    </tr>  
                <?php } ?>                                              
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Total</strong></td>
                    <td class="no-line text-right">{{$grand_total}}</td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Total Tax</strong></td>
                    <td class="no-line text-right">{{$total_tax}}%</td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Total Tax Amount</strong></td>
                    <td class="no-line text-right">{{$tax_cal}}</td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>With Tax Grant Total</strong></td>
                    <td class="no-line text-right">{{$grandtotal}}</td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
     <div class="row">
      <div class="col-xs-12">
        <p class="text-center"><b>{{$footer_text}}</b></p><br>
        <!-- <p class="text-center"><b>"Come Back Again"</b></p> -->
      </div>
      </div>
</div>
</body></html>