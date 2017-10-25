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




class KitchenManagerController extends Controller

{

     public function __construct()
    {
       
    }
       public function man_dashboard(Request $request)
    {
       $cat=\DB::table('orderdetails')->count();
       $tab =\DB::table('orderdetails')->where('serve_status','=','Served')->count();
       $set =\DB::table('orderdetails')->where('serve_status','=','orderd')->count();
       $pend =\DB::table('orderdetails')->where('serve_status','=','Cooking')->count();          
       return view('kitchen_manager.dashboard',compact('cat','tab','set','pend'));
    }
     public function man_kitchenHome(Request $request)
    {
       // $tab= \DB::table('tablemaster')->get();
       $cat= \DB::table('orderdetails')->where('serve_status','=','orderd')->get();
       // $cat= \DB::table('orderdetails')->where('serve_status','=','orderd')->where('status','=',0)->get();
      return view('kitchen_manager.kitchenHome',compact('cat','tab'));
    }

    public function man_processing_order(Request $request)
    {
      
       $cat= \DB::table('orderdetails')->where('serve_status','=','Cooking')->get();
      return view('kitchen_manager.processing',compact('cat'));
    }
     public function man_serverd_order(Request $request)
    {
      
       $cat= \DB::table('orderdetails')->where('serve_status','=','Served')->get();
      return view('kitchen_manager.serverdhome',compact('cat'));
    }

     public function update_order(Request $request)
    {
      // $cat= \DB::table('orderdetails')->where('status','=','1')->get();
      $id=$request->id;
      $status=$request->status;
      $user_info=\DB::table('orderdetails')->where('id','=',$id )->update(array('serve_status'=>'Cooking'));
     return redirect('/man_processing_order');
    }
    public function update_order_2(Request $request)
    {
      $id=$request->id;
      $user_info=\DB::table('orderdetails')->where('id','=',$id )->update(array('serve_status'=>'Served'));
     return redirect('/man_serverd_order');
    }

   
}

