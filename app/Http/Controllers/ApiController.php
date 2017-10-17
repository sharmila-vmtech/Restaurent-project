<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Forum;
use Excel,File;
use DB;
use Redirect;
use Auth;
use App\User;
use Flash;
use Crypt;

header("Access-Control-Allow-Origin: *");
    //http://stackoverflow.com/questions/18382740/cors-not-working-php
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        
            {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }



class ApiController extends Controller

{

     public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('login_user.basic');

    }

    public function test_sms(Request $request)
    {
      // $a= 
      // return redirect('http://bhashsms.com/api/sendmsg.php?user=alberichsoft&pass=123&sender=NAMKRI&phone=7373196889&text=OTP%20-123&priority=ndnd&stype=normal');
       // return back()->withInput();
//       return redirect('http://newshopv1.lan/home');
// return redirect('http://bhashsms.com/api/sendmsg.php?user=alberichsoft&pass=123&sender=NAMKRI&phone=7373196889&text=OTP%20-123&priority=ndnd&stype=normal');    

      // if($a == TRUE){
      //   return redirect('/home');
      // }else {
      //   return redirect('/login');
      // }
           
            //$mobile = $request->mobile;
            //$message = 'ರಾಜ್ಯದಲ್ಲಿ ಜೆಡಿಎಸ್ ಪಕ್ಷವನ್ನು ಅಧಿಕಾರಕ್ಕೆ ತಂದು ಕುಮಾರಸ್ವಾಮಿಯವರನ್ನು ಮುಖ್ಯಮಂತ್ರಿ ಮಾಡುವ ಸಂಘಟನೆಯ ಸದಸ್ಯತ್ವವನ್ನು ಪಡೆದುಕೊಂಡಿದಕ್ಕೆ ಧನ್ಯವಾದಗಳು.ನಿಮ್ಮ ಸ್ನೇಹಿತರನ್ನು ಸದಸ್ಯರನ್ನಾಗಿಸುವ  ಮುಖಾಂತರ ನಿಮ್ಮ ಸೇವೆ ನಿರಂತರವಾಗಿರಲಿ.';
            //$type = '1';

            //$message = str_replace(" ","-%-",$message);
            $mobile=8124333173;
            $OTP=12345;
            $message="OTP for Join http://nammakrishnagiri.com/ as- ".$OTP." Please Enter And verify";
            // $type = '1';

            $message = str_replace(" ","%20",$message);

            $smsURL = "http://bhashsms.com/api/sendmsg.php?user=alberichsoft&pass=123&sender=NAMKRI&phone=".$mobile."&text=".$message."&priority=ndnd&stype=normal";

            $smsResult = file_get_contents($smsURL);

             //flash()->overlay('Welcome to JDS Fans Club!', ' Registered Succesfully');
         // return redirect('/')->with('success', 'Registered Succesfully!');
             return redirect('/home');
             //return back();



    }
    public function get_category()
    {
      
       $output=[];
         $products = \DB::table('Category_List')->get();
            // foreach ($products as $key => $value) {
            //     $output[] =['id'=>$value->id,'cat_name'=>$value->cat_name,'cat_tag'=>$value->cat_tag];
            // }
            //print_r($products);
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'cat_name'=>$value->cat_name,'cat_tag'=>$value->cat_tag,'cat_t_name'=>$value->cat_t_name];
             }
            //return response()->json(['cat_list'=>$products]);
            //return Response::json(['hello' => $products],201);
            return response()->json($output);
    }
      public function get_Songs()
    {
       $output=[];
         $products = \DB::table('songs')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Songs_name'=>$value->Songs_txt,'Songs_title'=>$value->Songs_title,'Songs_tag'=>$value->Songs_tag,'Songs_img'=>"/public/images/Songs/".$value->Songs_img];
             }    
            return response()->json($output);
    }
    public function get_Letters()
    {
       $output=[];
         $products = \DB::table('Letters')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Letters_name'=>$value->Letters_name,'Letters_title'=>$value->Letters_title,'Letters_tag'=>$value->Letters_tag,'Letters_img'=>"/public/images/Letters/".$value->Letters_img];
             }    
            return response()->json($output);
    }
 public function get_Numbers()
    {
       $output=[];
         $products = \DB::table('Numbers')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Numbers_title'=>$value->Numbers_title,'Numbers_name'=>$value->Numbers_name,'Numbers_tag'=>$value->Numbers_tag,'Numbers_img'=>"/public/images/Numbers/".$value->Numbers_img];
             }    
            return response()->json($output);
    }
 public function get_Images()
    {
       $output=[];
         $products = \DB::table('Images')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'img_name'=>$value->img_name,'tag_name'=>$value->tag_name];
             }    
            return response()->json($output);
    }
     public function get_Events()
    {
       $output=[];
         $products = \DB::table('Events')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Events_name'=>$value->Events_name,'Events_title'=>$value->Events_title,'Events_tag'=>$value->Events_tag,'Events_img'=>"/public/images/Events/".$value->Events_img];
             }    
            return response()->json($output);
    }
     public function get_Local_Language()
    {
       $output=[];
         $products = \DB::table('Local_Language')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Local_Language_name'=>$value->Local_Language_name,'Local_Language_title'=>$value->Local_Language_title,'Local_Language_tag'=>$value->Local_Language_tag,'Local_Language_img'=>"/public/images/Local_Language/".$value->Local_Language_img];
             }    
            return response()->json($output);
    }
     public function get_Discuss()
    {
       $output=[];
         $products = \DB::table('Discuss')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Discuss_name'=>$value->Discuss_name,'Discuss_title'=>$value->Discuss_title,'Discuss_tag'=>$value->Discuss_tag,'Discuss_img'=>"/public/images/Discuss/".$value->Discuss_img];
             }    
            return response()->json($output);
    }
     public function get_Story()
    {
       $output=[];
         $products = \DB::table('Story')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Story_name'=>$value->Story_name,'Story_title'=>$value->Story_title,'Story_tag'=>$value->Story_tag,'Story_img'=>"/public/images/Story/".$value->Story_img];
             }    
            return response()->json($output);
    }
     public function get_Images_Tag($id)
    {
        
       $output=[];
         $products = \DB::table('Images')->where('tag_name',$id)->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'tag_name'=>$value->tag_name,'img_name'=>"/public/images/Images_all/".$value->img_name];
             }    
            return response()->json($output);
    }
    public function get_Tenth_Poem()
    {
        $output=[];
         $products = \DB::table('Tenth_Poem')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Tenth_Poem_name'=>$value->Tenth_Poem_name,'Tenth_Poem_title'=>$value->Tenth_Poem_title,'Tenth_Poem_tag'=>$value->Tenth_Poem_tag,'Tenth_Poem_img'=>"/public/images/Tenth_Poem/".$value->Tenth_Poem_img];
             }    
            return response()->json($output);
    }
    public function get_Tenth_Suble()
    {
      $output=[];
         $products = \DB::table('Tenth_Suble')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Tenth_Suble_name'=>$value->Tenth_Suble_name,'Tenth_Suble_title'=>$value->Tenth_Suble_title,'Tenth_Suble_tag'=>$value->Tenth_Suble_tag,'Tenth_Suble_img'=>"/public/images/Tenth_Suble/".$value->Tenth_Suble_img];
             }    
            return response()->json($output);   
      }
      public function get_Tenth_Grammer()
    {
        $output=[];
         $products = \DB::table('Tenth_Grammer')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Tenth_Grammer_name'=>$value->Tenth_Grammer_name,'Tenth_Grammer_title'=>$value->Tenth_Grammer_title,'Tenth_Grammer_tag'=>$value->Tenth_Grammer_tag,'Tenth_Grammer_img'=>"/public/images/Tenth_Grammer/".$value->Tenth_Grammer_img];
             }    
         return response()->json($output);
    }    
     public function get_Tenth_Lesson()
    {
        $output=[];
         $products = \DB::table('Tenth_Lesson')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Tenth_Lesson_name'=>$value->Tenth_Lesson_name,'Tenth_Lesson_title'=>$value->Tenth_Lesson_title,'Tenth_Lesson_tag'=>$value->Tenth_Lesson_tag,'Tenth_Lesson_img'=>"/public/images/Tenth_Lesson/".$value->Tenth_Lesson_img];
             }    
            return response()->json($output);
    }
    public function get_Audio()
    {
       $output=[];
         $products = \DB::table('Audio')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Audio_name'=>$value->Audio_name,'Audio_tag'=>$value->Audio_tag];
             }    
            return response()->json($output);
    }
     public function get_Audio_Tag($id)
    {
        $name="Aud_".$id;
       $output=[];
         $products = \DB::table('Audio')->where('Audio_tag',$name)->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Audio_name'=>"/public/Audio/".$value->Audio_name,'Audio_tag'=>$value->Audio_tag];
             }    
            return response()->json($output);
    }
    public function get_Tenth_Audio()
    {
       $output=[];
         $products = \DB::table('Tenth_Audio')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Tenth_Audio_name'=>$value->Tenth_Audio_name,'Tenth_Audio_tag'=>$value->Tenth_Audio_tag,'Tenth_Audio_Title'=>$value->Tenth_Audio_Title];
             }    
            return response()->json($output);
    }
    public function get_Tenth_Video()
    {
       $output=[];
         $products = \DB::table('Tenth_Video')->get();
             foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'Tenth_Video_name'=>$value->Tenth_Video_name,'Tenth_Video_tag'=>$value->Tenth_Video_tag,'Tenth_Video_address'=>$value->Tenth_Video_address];
             }    
            return response()->json($output);
    }
    public function get_home_banner()
    {
         $output="";
       
         $products = \DB::table('home_banner')->get();

        
            foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'banner_name'=>$value->banner_name,'banner_tag'=>$value->banner_tag];
            }
            return response()->json($output);
    }
    public function get_shop_list($id,$limit)
    {
       $output="";
       
      $cat_tag=$this->get_shop_tag_by_name($id);
      //die();
       if (isset($limit)) {
         $products = \DB::table('shop')->where('shop_cat','=', $cat_tag)
                                      ->where('admin_verify','=','Deactivate')
                                      ->take($limit)->get();
           
       }else {
        $products = \DB::table('shop')->where('shop_cat','=', $cat_tag)
                                      ->where('admin_verify','=','Deactivate')
                                      ->take(5)->get();
       }
         

        
            foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'shop_name'=>$value->shop_name,'shop_logo'=>$value->shop_logo,'shop_text'=>$value->shop_txt,'shop_address'=>$value->shop_address];
            }
            return response()->json($output);
            
         
    }
    public function get_shop_tag_by_name($id)
    {
        
    $products = \DB::table('category')->where('cat_name', 'LIKE', '%'.$id.'%')->get();
          foreach ($products as $key => $value) {
             $cat_tag=$value->cat_tag;
          }
         
          return $cat_tag;
    }
    public function get_shop_details($id)
    {
       $output="";
       
         $products = \DB::table('shop')->where('id','=', $id)->get();
            
        
            foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'shop_name'=>$value->shop_name,'shop_logo'=>$value->shop_logo,'shop_text'=>$value->shop_text,'shop_banner'=>$value->shop_banner,'shop_user'=>$this->get_shop_admin($value->user_id),'contact_person'=>$value->contact_person,'contact_mobile'=>$value->contact_mobile,'shop_cat'=>$this->get_shop_cat_name_by_tag($value->shop_cat),'shop_address'=>$value->shop_address,'lat'=>$value->lat,'lng'=>$value->lng];
            }
            return response()->json($output);
            
         
    }
    public function get_category_by_name($id)
    {
         $cat=\DB::table('category')->where('id','=',$id)->get();
        foreach ($cat as $key => $value) {
             $cat_tag=$value->cat_tag;
            $cat_ac_name=$value->cat_name;
        }

        
        $cat_banner=\DB::table('category_banner')->where('cat_tag','=',$cat_tag)->get();

        // print_r($cat_banner);
        // echo $cat_ac_name;
        // die();
        $shop=\DB::table('shop')->where('shop_cat','LIKE', '%'.$cat_tag.'%')->where('admin_verify','=','Deactivate')->get();
        $output="";
    foreach ($shop as $key => $value) {
            $output[] =['id'=>$value->id,'shop_name'=>$value->shop_name,'shop_logo'=>$value->shop_logo,'shop_text'=>$value->shop_text,'shop_banner'=>$value->shop_banner,'shop_user'=>$this->get_shop_admin($value->user_id),'contact_person'=>$value->contact_person,'contact_mobile'=>$value->contact_mobile,'shop_cat'=>$this->get_shop_cat_name_by_tag($value->shop_cat),'shop_address'=>$value->shop_address,'lat'=>$value->lat,'lng'=>$value->lng];
        }
        return response()->json($output);
        // return view('user.search_cat',compact('cat','shop','cat_banner','cat_ac_name'));
    }
    public function get_category_banner_by_tag($id)
    {
         $cat_banner=\DB::table('category_banner')->where('cat_tag','=',$id)->get();
         $output="";
         foreach ($cat_banner as $key => $value) {
             $output[]  = ['id'=>$value->id,'image'=>$value->c_b_name,'cat_name'=>$value->category_name,'cat_tag'=>$value->cat_tag];
         }
         return response()->json($output);

    }
    public function get_shop_cat_name_by_tag($id)
    {
        $products = \DB::table('category')->where('cat_tag', '=', $id)->get();
        foreach ($products as $key => $value) {
             $cat_tag=$value->cat_name;
          }
         
          return $cat_tag;

    }
    public function get_shop_map($id)
    {
      $output="";
       
         $products = \DB::table('shop')->where('id','=', $id)->get();

        
            foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'shop_name'=>$value->shop_name,'lat'=>$value->lat,'lng'=>$value->lng];
            }
            return response()->json($output);
    }
    public function get_shop_admin($id)
    {
      $products = \DB::table('user_Profiles')->where('user_id','=', $id)->get();
      foreach ($products as $key => $value) {
      # code...
       $user_name= $value->name;
       $email=$value->email;
       $mobile_no=$value->mobile_no;
       $profile_pic=$value->image;
    }
    $userdata = array('username' =>$user_name,'email' =>$email,'mobile_no'=>$mobile_no,'profile_pic'=>$profile_pic);
      return $userdata;
    }
    public function get_api_login_post(Request $requests)
    {
        $input = Input::all();
        //print_r($input);
        return response()->json($input);
    }
    public function get_login($id,$pass)
    {
        
         $login = \DB::table('users')->where('mobile_no','=', $id)
                                     ->where('admin_token','=',md5($pass))
                                     ->limit(1)->get();
        // print_r($login);
        // die();
        $output="";                    
        if (count($login) == 1) {
           $products = \DB::table('user_Profiles')->where('mobile_no','=', $id)->get();

           foreach ($products as $key => $value) {
                $output[] =['user_id'=>$value->id,'name'=>$value->name,'mobile_no'=>$value->mobile_no,'email'=>$value->email,'image'=>$value->image];
            }
            return response()->json($output);
        }else {
            $data="Login Failed";
            echo json_encode($data); 
        }
       
    }

    public function get_register($id,$pass,$email,$mobile)
    {
         
        $register=\DB::table('users')->where('mobile_no','=', $mobile)->get();
        $output="";
        if (count($register) < 1) {


            //include('way2sms-api.php');
            $OTP = $this->generatePIN(); 
            //$res = sendWay2SMS('7373196889','8686',$mobile,'OTP for Join http://nammakrishnagiri.com/ as - '.$OTP.' Please Enter And verify');
              //$mobile=8124333173;
            
            $message="OTP for Join http://nammakrishnagiri.com/ as- ".$OTP." Please Enter And verify";
            // $type = '1';

            $message = str_replace(" ","%20",$message);

            $smsURL = "http://bhashsms.com/api/sendmsg.php?user=alberichsoft&pass=123&sender=NAMKRI&phone=".$mobile."&text=".$message."&priority=ndnd&stype=normal";

            $smsResult = file_get_contents($smsURL);



            $a="Register";
            $output[] =['Api_reg_user_name'=>$id,'Api_pass'=>$pass,'Api_email'=>$email,'Api_mobile_no'=>$mobile,'Api_otp'=>$OTP,'user_status'=>$a];
            return response()->json($output);
        }else {
            $a="Login Failed";
            $output[] =['user_status'=>$a];
            return response()->json($output);
        }
    
    }
    public function do_register($id,$pass,$email,$mobile)
    {
        $pass_2=bcrypt($pass);
        
        $output="";
        $insert =\DB::table('users')->insert([
          ['name'=>$id,'password' => $pass_2,'email'=>$email,'mobile_no'=>$mobile,'admin_token'=>md5($pass)]
      ]);
        $user_id = \DB::table('users')->count();
        $insert =\DB::table('user_Profiles')->insert([
          ['user_id'=>$user_id,'name' => $id,'email'=>$email,'mobile_no'=>$mobile]
      ]);

        $products = \DB::table('user_Profiles')->where('mobile_no','=', $mobile)->get();
           foreach ($products as $key => $value) {
                $output[] =['user_id'=>$value->id,'name'=>$value->name,'email'=>$value->email,'mobile_no'=>$value->mobile_no,'image'=>$value->image];
            }
            return response()->json($output);
    }
    public function resend_otp()
    {
        include('Auth/way2sms-api.php');
          $OTP = $this->generatePIN(); 
          $mobile_no=Session::get('mobile_no');
    // $res = sendWay2SMS('8124333173','Q2388B',$mobile_no,'OTP for Join http://nammakrishnagiri.com/ as - '.$OTP.' Please Enter And verify');

     $message="OTP for Join http://nammakrishnagiri.com/ as- ".$OTP." Please Enter And verify";
            // $type = '1';

            $message = str_replace(" ","%20",$message);

            $smsURL = "http://bhashsms.com/api/sendmsg.php?user=alberichsoft&pass=123&sender=NAMKRI&phone=".$mobile_no."&text=".$message."&priority=ndnd&stype=normal";

            $smsResult = file_get_contents($smsURL);

         Session::put('otp',$OTP);   
         return back()->withInput();
    }

     public function generatePIN($digits = 4)
    {
        
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
    }
    public function login_post(Response $request)
    {


    }
     public function search_ajax_new(Response $request)
    {
       // $input = Input::all();
       //  print_r($input);
        

     $q=Input::get('term');
       $output="";
       
         $products = \DB::table('district_info')->where('Pincode','LIKE', '%'.$q.'%')->take(5)->get();

        
            foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'value'=>$value->Pincode];
            }
            return response()->json($output);
            
         
    }
    public function location_auto(Response $request)
    {
       // $input = Input::all();
       //  print_r($input);
        

     $q=Input::get('term');
       $output="";
       
         $products = \DB::table('district_info')->where('Location','LIKE', '%'.$q.'%')->take(5)->get();

        
            foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'value'=>$value->Location];
            }
            return response()->json($output);
            
         
    }
     public function taluk_auto(Response $request)
    {
       // $input = Input::all();
       //  print_r($input);
        

     $q=Input::get('term');
       $output="";
       
         $products = \DB::table('krishnagiri_taluk')->where('taluk_name','LIKE', '%'.$q.'%')->take(5)->get();

        
            foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'value'=>$value->taluk_name];
            }
            return response()->json($output);
            
         
    }
     public function blood_auto(Response $request)
    {
       // $input = Input::all();
       //  print_r($input);
        

     $q=Input::get('term');
       $output="";
       
         $products = \DB::table('blood_group')->where('Blood_group_name','LIKE', '%'.$q.'%')->take(5)->get();

        
            foreach ($products as $key => $value) {
                $output[] =['id'=>$value->id,'value'=>$value->Blood_group_name];
            }
            return response()->json($output);
            
         
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
    public function remove_img()
    {

        

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

