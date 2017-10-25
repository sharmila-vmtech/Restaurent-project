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




class SuperController extends Controller

{

     public function __construct()
    {
        $this->middleware('auth');
        //$this->check_admin_user();
    }
    
    public function admin(Request $request)
    {
       $cat=\DB::table('orderdetails')->count();
       $tab =\DB::table('tablemaster')->where('tablestatus','=','1')->count();
       $set =\DB::table('tablemaster')->where('tablestatus','=','0')->count();
       $pend =\DB::table('orderdetails')->where('serve_status','=','orderd')->count();
          
       return view('admin.dashboard',compact('cat','tab','set','pend'));
    }
     public function table(Request $request)
    {
      $cat= \DB::table('tablemaster')->get();
      return view('admin.table',compact('cat'));
    }
    public function add_table(Request $request)
    {
        $edit=$request->edit;
        $tablename=$request->tablename; 
            if (isset($edit) && $edit == 1 ) {
                 $id=$request->id;
                 $tablestatus=$request->tablestatus;
                $user_info=\DB::table('tablemaster')->where('id','=',$id )->update(array('tablename'=>$tablename,'tablestatus'=>$tablestatus,));

            \Flash::success(' Updated  Successfully.');
            return redirect('table');
            }else {
                   $banner =\DB::table('tablemaster')->insert([
          ['tablename'=>$tablename,'tablestatus'=>1]
      ]);
            }
        \Flash::success(' Inserted  Successfully.');
            return redirect('table');
    }
     public function delete_table(Request $request)
    {
         $id=$request->id;
         $update =\DB::table('tablemaster')->where('id',$id)->delete();
            \Flash::success(' Deleted  Successfully.');
        return redirect('table');
    }
      public function members(Request $request)
    {
      $cat= \DB::table('usermaster')->get();
      return view('admin.home',compact('cat'));
    }
    public function add_members(Request $request)
    {
        $edit=$request->edit;
        $username=$request->username;
        $password=$request->password;
        $role=$request->role; 
        $dt = new \DateTime();
            if (isset($edit) && $edit == 1 ) {
                 $id=$request->id;
                $user_info=\DB::table('usermaster')->where('id','=',$id )->update(array('username'=>$username,'password'=>$password,'role'=>$role,'updated_at'=>$dt));

            \Flash::success(' Updated  Successfully.');
            return redirect('members');
            }else {
                   $banner =\DB::table('usermaster')->insert([
          ['username'=>$username,'password'=>$password,'role'=>$role,'created_at'=>$dt,'updated_at'=>$dt]
      ]);
            }
        \Flash::success(' Inserted  Successfully.');
            return redirect('members');
    }
     public function delete_members(Request $request)
    {
         $id=$request->id;
         $update =\DB::table('usermaster')->where('id',$id)->delete();
            \Flash::success(' Deleted  Successfully.');
        return redirect('members');
    }
        public function payment_type(Request $request)
    {
      $cat= \DB::table('paymentmode')->get();
      return view('admin.payment_type',compact('cat'));
    }
    public function add_payment_type(Request $request)
    {
        $edit=$request->edit;
        
        $pay_type=$request->pay_type;
        
        $dt = new \DateTime();
            if (isset($edit) && $edit == 1 ) {
                 $id=$request->id;
                 
                $user_info=\DB::table('paymentmode')->where('id','=',$id )->update(array('pay_type'=>$pay_type,'updated_at'=>$dt));

            \Flash::success(' Updated  Successfully.');
            return redirect('payment_type');
            }else {
                   $banner =\DB::table('paymentmode')->insert([
          ['pay_type'=>$pay_type,'created_at'=>$dt,'updated_at'=>$dt]
      ]);
            }
        \Flash::success(' Inserted  Successfully.');
            return redirect('payment_type');
    }
     public function delete_payment_type(Request $request)
    {
         $id=$request->id;
         $update =\DB::table('paymentmode')->where('id',$id)->delete();
            \Flash::success(' Deleted  Successfully.');
        return redirect('payment_type');
    }

     public function settings(Request $request)
    {
      $cat= \DB::table('settings')->get();
      return view('admin.settings',compact('cat'));
     
    }
    public function add_settings(Request $request)
    {
        $edit=$request->edit;
        $name=$request->name;
        $address=$request->address;
        $phone=$request->phone; 
        $currency=$request->currency;
        $tax=$request->tax;
        $vattax=$request->vattax; 
        $additionaltax=$request->additionaltax;
        $discount=$request->discount;
        
        $dt = new \DateTime();
            if (isset($edit) && $edit == 1 ) {
                 $id=$request->id;
                $user_info=\DB::table('settings')->where('id','=',$id )->update(array('name'=>$name,'address'=>$address,'phone'=>$phone,'currency'=>$currency,'tax'=>$tax,'vattax'=>$vattax,'additionaltax'=>$additionaltax,'discount'=>$discount,'updated_at'=>$dt));

            \Flash::success(' Updated  Successfully.');
            return redirect('settings');
            }else {
                   $banner =\DB::table('settings')->insert([
          ['name'=>$name,'address'=>$address,'phone'=>$phone,'currency'=>$currency,'tax'=>$tax,'vattax'=>$vattax,'additionaltax'=>$additionaltax,'discount'=>$discount,'created_at'=>$dt,'updated_at'=>$dt]
      ]);
            }
        \Flash::success(' Inserted  Successfully.');
            return redirect('settings');
    }
     public function delete_settings(Request $request)
    {
         $id=$request->id;
         $update =\DB::table('settings')->where('id',$id)->delete();
            \Flash::success(' Deleted  Successfully.');
        return redirect('settings');
    }

    ////////////////////////////////////

    public function cuisine(Request $request)
    {
      $cat= \DB::table('cusine')->get();
      return view('admin.cuisine',compact('cat'));
    }
    public function add_cuisine(Request $request)
    {
        $edit=$request->edit;
        
        $cusinename=$request->cusinename;
        $cusineimage=$request->cusineimage;
        $dt = new \DateTime();
        if (isset($cusineimage)) {
            
            if(Input::file())
            {
                $image = Input::file('cusineimage');
                $filename  = $image->getClientoriginalName();
                $path = public_path('images/cusine/' . $filename);
                    Image::make($image->getRealPath())->save($path);
            }
            if (isset($edit) && $edit == 1 ) {
                 $id=$request->id;
                $user_info=\DB::table('cusine')->where('id','=',$id )->update(array('cusineimage'=>$filename,'cusinename'=>$cusinename,'updated_at'=>$dt));
            }else {
                       $banner =\DB::table('cusine')->insert([
          ['cusineimage'=>$filename,'cusinename'=>$cusinename,'created_at'=>$dt,'updated_at'=>$dt]
      ]);
                  
            }
        \Flash::success(' Inserted  Successfully.');
            return redirect('cuisine');

            
        }else 
        {
          \Flash::success('Please Select Image File');
            return back()->withInput();
              }
    }
     public function delete_cuisine(Request $request)
    {
         $id=$request->id;
         $update =\DB::table('cusine')->where('id',$id)->delete();
            \Flash::success(' Deleted  Successfully.');
        return redirect('cuisine');
    }
     public function dish_type(Request $request)
    {
      $cat= \DB::table('dish_type')->get();
      return view('admin.dish_type',compact('cat'));
    }
    public function add_dish_type(Request $request)
    {
        $edit=$request->edit;
        $type=$request->type; 
            if (isset($edit) && $edit == 1 ) {
                 $id=$request->id;
                
                $user_info=\DB::table('dish_type')->where('id','=',$id )->update(array('type'=>$type,'updated_at' => new DateTime));

            \Flash::success(' Updated  Successfully.');
            return redirect('dish_type');
            }else {
                   $banner =\DB::table('dish_type')->insert([
          ['type'=>$type,'updated_at' => new DateTime]
      ]);
            }
        \Flash::success(' Inserted  Successfully.');
            return redirect('dish_type');
    }
     public function delete_dish_type(Request $request)
    {
         $id=$request->id;
         $update =\DB::table('dish_type')->where('id',$id)->delete();
            \Flash::success(' Deleted  Successfully.');
        return redirect('dish_type');
    }
    public function waiter(Request $request)
    {
      $cat= \DB::table('waiter')->get();
      return view('admin.waiter',compact('cat'));
    }
    public function add_waiter(Request $request)
    {
        $edit=$request->edit;
        $waiter_name=$request->waiter_name; 
            if (isset($edit) && $edit == 1 ) {
                 $id=$request->id;
                
                $user_info=\DB::table('waiter')->where('id','=',$id )->update(array('waiter_name'=>$waiter_name,'updated_at' => new DateTime));

            \Flash::success(' Updated  Successfully.');
            return redirect('waiter');
            }else {
                   $banner =\DB::table('waiter')->insert([
          ['waiter_name'=>$waiter_name,'updated_at' => new DateTime]
      ]);
            }
        \Flash::success(' Inserted  Successfully.');
            return redirect('/waiter');
    }
     public function delete_waiter(Request $request)
    {
         $id=$request->id;
         $update =\DB::table('waiter')->where('id',$id)->delete();
            \Flash::success(' Deleted  Successfully.');
        return redirect('/waiter');
    }
    public function dish(Request $request)
    {
      $cat= \DB::table('dish')->get();
      return view('admin.dish',compact('cat'));
    }
    public function add_dish(Request $request)
    {
        $edit=$request->edit;
        
        $cusine_id=$request->cusine_id;
        $dish_type=$request->dish_type;
         $dish_name=$request->dish_name;
        $dish_image=$request->dish_image;
         $dish_des=$request->dish_des;
        $price=$request->price;
        $dt = new \DateTime();
        if (isset($dish_image)) {
            
            if(Input::file())
            {
                $image = Input::file('dish_image');
                $filename  = $image->getClientoriginalName();
                $path = public_path('images/dish/' . $filename);
                    Image::make($image->getRealPath())->save($path);
            }
            if (isset($edit) && $edit == 1 ) {
                 $id=$request->id;
                $user_info=\DB::table('dish')->where('id','=',$id )->update(array('dish_image'=>$filename,'cusine_id'=>$cusine_id,'dish_type'=>$dish_type,'dish_name'=>$dish_name,'dish_des'=>$dish_des,'price'=>$price,'updated_at'=>$dt));
            }else {
                       $banner =\DB::table('dish')->insert([
          ['dish_image'=>$filename,'cusine_id'=>$cusine_id,'dish_type'=>$dish_type,'dish_name'=>$dish_name,'dish_tag'=>strtolower($dish_name),'dish_des'=>$dish_des,'price'=>$price,'created_at'=>$dt,'updated_at'=>$dt]
      ]);
                  
            }
        \Flash::success(' Inserted  Successfully.');
            return redirect('dish');

            
        }else 
        {
          \Flash::success('Please Select Image File');
            return back()->withInput();
              }
    }
     public function delete_dish(Request $request)
    {
         $id=$request->id;
         $update =\DB::table('dish')->where('id',$id)->delete();
            \Flash::success(' Deleted  Successfully.');
        return redirect('dish');
    }
    public function add_order(Request $request)
    {
       
        $table_name = $request->table_name;       
        $dish_name = $request->dish_name;
        $quantity = $request->quantity;  
         $waiter_name = $request->waiter_name;  
        $price = "50";
         $b=11;
        $c=2017;
        $shop_count=\DB::table('orderdetails')->count();
        $z=str_pad($c, $b, '0', STR_PAD_RIGHT); 
        // $e=$z+$shop_count+1;        
            $e=$shop_count+1;   
        
        $f="2017000".$e;
      
       $s=sizeof($dish_name);
       for ($i=0; $i<$s; $i++) { 
           $d = $dish_name[$i];
           $q = $quantity[$i];
           $price = "50";
           $t = $quantity[$i] * $price;
  $add_cat =\DB::table('orderdetails')->insert(['table_name' => $table_name, 'waiter_name' => $waiter_name, 'orderid' => $f, 'dish_name' => $d, 'quantity'=> $q, 'status'=>1, 'price'=> $price,'total'=> $t, 'updated_at' => new DateTime]);

  }
       return redirect('/home_index');
      // return redirect()->back();
       die();
       $total = $quantity * $price;
      $add_cat =\DB::table('orderdetails')->insert(['table_name' => $table_name, 'waiter_name' => $waiter_name, 'orderid' => $f, 'waiter_name'=> $waiter_name,'dish_name' => $dish_name, 'quantity'=> $quantity, 'price'=> $price,'total'=> $total, 'status'=>1,  'updated_at' => new DateTime]);
       if($add_cat)
        {
           return redirect('/home_index');
         
        }
    }
    
    public function kitchenHome(Request $request)
    {
       $tab= \DB::table('tablemaster')->get();
       $cat= \DB::table('orderdetails')->where('status','=','1')->get();
      return view('admin.kitchenHome',compact('cat','tab'));
    }

    public function processing_order(Request $request)
    {
      
       $cat= \DB::table('orderdetails')->where('status','=','2')->get();
      return view('admin.processing',compact('cat'));
    }
     public function serverd_order(Request $request)
    {
      
       $cat= \DB::table('orderdetails')->where('serve_status','=','Served')->get();
      return view('admin.serverdhome',compact('cat'));
    }

     public function update_order(Request $request)
    {
      // $cat= \DB::table('orderdetails')->where('status','=','1')->get();
      $id=$request->id;
      $status=$request->status;
      $user_info=\DB::table('orderdetails')->where('id','=',$id )->update(array('status'=>$status,));
     return redirect('/kitchenHome');
    }
      public function view_order(Request $request)
    {
      $cat= \DB::table('orderdetails')->where('status','=','0' )->get();
      return view('admin.order',compact('cat'));
    }

// public function admin(Request $request)
//     {
//        //$cat=\DB::table('orderdetails')->count();
//        $tab =\DB::table('tablemaster')->where('tablestatus','=','1')->count();
     
          
//        return view('admin.dashboard',compact('tab'));

//     }
///////////////////////////////////////////////////
    //////////////////////////////////////////
    //////////////////////////////////////
    //////////////////////////////////////////
 
  
 /////////////////////// Basha  /////////////////

    public function home_banner(Request $request)
    {
         $banner=\DB::table('home_banner')->get();
         // print_r($banner);
         // die();
        return view('log_users.home_banner',compact('banner'));
    }
    public function add_home_banner(Request $request)
    {
        $banner_name=$request->banner_name;
        $edit=$request->edit;
        //die();
        if (isset($banner_name)) {
            
            if(Input::file())
            {
                $image = Input::file('banner_name');
                $filename  = $image->getClientoriginalName();
                $path = public_path('images/home_banner/' . $filename);
                    Image::make($image->getRealPath())->resize(600, 300)->save($path);
            }
            if (isset($edit) && $edit == 1 ) {
                 $id=$request->id;
                $user_info=\DB::table('home_banner')->where('id','=',$id )->update(array('banner_name'=>$filename));
            }else {
                       $banner =\DB::table('home_banner')->insert([
          ['banner_name'=>$filename ]
      ]);
                  
            }
        \Flash::success(' Inserted  Successfully.');
            return redirect('home_banner');

            
        }else 
        {
          \Flash::success('Please Select Image File');
            return back()->withInput();
              }
        }
        public function delete_home_banner(Request $request)
        {
            $id=$request->id;
            $update =\DB::table('home_banner')->where('id',$id)->delete();
            \Flash::success(' Deleted  Successfully.');
            return redirect('home_banner');
            
        }



        public function ad_banner(Request $request)
        {
             $ads=\DB::table('ads')->get();
            return view('log_users.ads',compact('ads'));
        }

        public function category_banner(Request $request)
        {
             $cat_banner=\DB::table('category_banner')->get();

             $cat=\DB::table('category')->get();
         // print_r($banner);
         // die();
        return view('log_users.category_banner',compact('cat_banner','cat'));
        }
        public function add_ad_banner($value='')
        {
            # code...
        }

        public function add_category_banner(Request $request)
    {
        $banner_name=$request->banner_name;
        $edit=$request->edit;
        $cat_name=$request->cat_name;

        if (isset($banner_name)) {
            
            if(Input::file())
            {
                $image = Input::file('banner_name');
                
                $filename  = $image->getClientoriginalName();
                $path = public_path('images/category_banner/'.$cat_name.'/'. $filename);
                    Image::make($image->getRealPath())->resize(600, 300)->save($path);
            }
            if (isset($edit) && $edit == 1 ) {
                 $id=$request->id;
                $user_info=\DB::table('category_banner')->where('id','=',$id )->update(array('c_b_name'=>$filename,'category_name'=>$cat_name));
            }else {
                       $banner =\DB::table('category_banner')->insert([
          ['c_b_name'=>$filename,'category_name'=>$cat_name]
      ]);
                  
            }
        \Flash::success(' Inserted  Successfully.');
            return redirect('category_banner');

            
        }else 
        {
          \Flash::success('Please Select Image File');
            return back()->withInput();
              }
        }
         public function delete_category_banner(Request $request)
        {
            $id=$request->id;
            $update =\DB::table('category_banner')->where('id',$id)->delete();
            \Flash::success(' Deleted  Successfully.');
            return redirect('category_banner');
            
        }




////////////////////// Basha /////////////////  
public function addadminshop(Request $request)
    {
          $cat=\DB::table('category')->get();
        return view('admin.addadminshop',compact('cat'));
        
    }
    public function add_admin_shop_post(Request $request)
    {
       //  $input = Input::all();
       // print_r($input);
         Session::put('user_id', Auth::user()->id);
        $user_id=Session::get('user_id');

        $b=11;
        $c=2017;
        $shop_count=\DB::table('shop')->count();
        $d=str_pad($c, $b, '0', STR_PAD_RIGHT);
        
            $e=$d+$shop_count+1;
        
        
      $f="SHOP".$e;
         $shop_cat=$request->shop_cat;
        $shop_txt=$request->shop_txt;
        $shop_name=$request->shop_name;
        $contact_person=$request->contact_person;
        $contact_mobile=$request->contact_mobile;
        $shop_text=$request->shop_text;
        $shop_logo=$request->shop_logo;
        $shop_address=$request->shop_address; 
        $shop_banner=$request->shop_banner; 
        $lat=$request->lat;
        $lng=$request->lng;
        $edit=$request->edit;
        if ($edit == 1) {
            $shop_unique_id=$request->shop_unique_id;
            if(Input::file())
            {
      
                $image = Input::file('shop_logo');
                $filename_logo  = mt_rand() . '.' . $image->getClientOriginalExtension();
                $path = public_path('images/shop_logo/' . $filename_logo);
                    Image::make($image->getRealPath())->resize(100,100)->save($path);
            }
        if(Input::file())
            {
      
                $image = Input::file('shop_banner');
                $filename_banner  = mt_rand() . '.' . $image->getClientOriginalExtension();
                $path = public_path('images/shop_banner/' . $filename_banner);
                    Image::make($image->getRealPath())->resize(600, 300)->save($path);
            }

         $shop =\DB::table('shop')->where('shop_unique_id','=',$shop_unique_id)->update(
          ['shop_txt' => $shop_txt,'contact_person' => $contact_person,'contact_mobile' => $contact_mobile,'shop_text' => $shop_text,'shop_logo' => $filename_logo,'shop_address' => $shop_address,'shop_banner' => $filename_banner,'lat' => $lat,'lng' => $lng ]
      );
         if($shop){
             \Flash::success($shop_name.  ' Shop Added successfully');
             return redirect('admin');
         }else {

             \Flash::error('Shop Add Failed');
             return back()->withInput();
         }
        }else {


        if(Input::file())
            {
      
                $image = Input::file('shop_logo');
                $filename_logo  = mt_rand() . '.' . $image->getClientOriginalExtension();
                $path = public_path('images/shop_logo/' . $filename_logo);
                    Image::make($image->getRealPath())->resize(100,100)->save($path);
            }
        if(Input::file())
            {
      
                $image = Input::file('shop_banner');
                $filename_banner  = mt_rand() . '.' . $image->getClientOriginalExtension();
                $path = public_path('images/shop_banner/' . $filename_banner);
                    Image::make($image->getRealPath())->resize(600, 300)->save($path);
            }

         $shop =\DB::table('shop')->insert([
          ['shop_unique_id'=>$f,'user_id' =>$user_id,'shop_name'=>$shop_name,'shop_cat'=>$shop_cat,'shop_txt' => $shop_txt,'contact_person' => $contact_person,'contact_mobile' => $contact_mobile,'shop_text' => $shop_text,'shop_logo' => $filename_logo,'shop_address' => $shop_address,'shop_banner' => $filename_banner,'lat' => $lat,'lng' => $lng ]
      ]);
         if($shop){
             \Flash::success($shop_name.  ' Shop Added successfully');
             return redirect('admin');
         }else {

             \Flash::error('Shop Add Failed');
             return back()->withInput();
         }
        }
    }
    /////////////////// Vimal /////////////// 
    // public function home(Request $request)
    // {
    //   return view('user.home');
    // }
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
    public function login()
    {


    }
    public function login_check(Request $request)
    {

   
    }
     public function login_get()

     {

    
     }
}

