<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\UserProfile;
use Excel,File;
use DB;
use Auth;
use App\User;
use Flash;
use Redirect;
use DateTime;




class NewController extends Controller

{

     public function __construct()
    {
        //$this->middleware('auth');
        //$this->check_admin_user();    
    }
    public function do()
    {
      $name=Session::get('name');
      $role=Session::get('role');
      if ($role == 'User(waiter)') {
        
        $cat= \DB::table('orderdetails')->where('waiter_name','=',$name)->where('status','=',0)->get();
      return view('home.index',compact('cat'));
      }else{
        return redirect('/user/login');
      }

      // echo $name;
      // die();
      
    }
    public function order($id)
    {
       $b=date('m');
        $c=date('Y');
        //  die();
          $shop_count=\DB::table('orderdetails')->orderBy('id', 'desc')->limit(1)->get();
          if (count($shop_count) > 0) {
            foreach ($shop_count as $key => $value) {
              $order_id=$value->order_id;
            }
            $id=substr($order_id, 5);
          }else{
            $id=0000;
          }
          
          // echo $id;
          // die();
        $z=str_pad($c, $b, '0', STR_PAD_RIGHT); 
        // $e=$z+$shop_count+1;        
            $e=$id+1;   
        
        $f="2017000".$e;
      return view('home.addorder',compact('id','f'));
    }
    public function findPrice(Request $request)
    {
       $query = $request->get('id','');
       //return $query;
       // $product= ->whereIn('first_name',$key);
        
        $supplier=\DB::table('dish')->where('dish_name','LIKE','%'. $query .'%')->get();
       $data=array();
        foreach ($supplier as $key => $value) {
                $data[]=array('value'=>$value->dish_name,'id'=>$value->id,'price'=>$value->price);
        }
        if(count($data) > 0 )
            //return response()->json($data);
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
       
    }

    public function insert_order(Request $request)
    {
       //    $input = Input::all();
       // print_r($input);
       //  die();
        $name=$request->fn;
        $table_id=$request->table;$order_id=$request->order_id;
        $productname=$request->productname;
        $price=$request->price;$qty=$request->qty;$amount=$request->amount;$grand_total=$request->grand_total;

        $s=sizeof($productname);
         for ($i=0; $i<$s; $i++) {     
  $add_cat =\DB::table('orderdetails')->insert(['table_name' => $table_id, 'waiter_name' => $name,'table_id'=>$table_id, 'order_id' => $order_id, 'dish_name' => $productname[$i], 'quantity'=> $qty[$i], 'status'=>$i, 'price'=> $price[$i],'total'=> $amount[$i],'created_at'=> new DateTime , 'updated_at' => new DateTime]);
      }
    if ($add_cat == TRUE) {
      return redirect('/home_index');
    }else{
       return back()->withInput();
    }
  
    }
    public function admin(Request $request)
    {
      // $cat= \DB::table('tablemaster')->get();
       return view('admin.dashboard');
    }
     public function table(Request $request)
    {
      $cat= \DB::table('tablemaster')->get();
      return view('admin.table',compact('cat'));
    }
   


    public function homepage(Request $request)
    {
      return view('user.homepage');
    }
    public function create()
    {

    }
    public function store()
    {

        //

    }
    public function show($id)
    {

        //

    }
    public function edit($id)
    {

        //

    }
    public function update(Request $request)
    {

    

    }
    public function destroy($id)
    {

        //

    }
   
    public function userlogout()
    {


    }
    
    public function login_check(Request $request)
    {

   
    }
     public function login_get()

     {

    
     }
}

