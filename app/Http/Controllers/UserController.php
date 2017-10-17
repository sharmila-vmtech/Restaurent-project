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




class UserController extends Controller

{

     public function __construct()
    {
       
    }
    public function index()
    {
      return view('user.login');
    }
    public function login(Request $request)
    {
       //     $input = Input::all();
       // print_r($input);
       //  die();
        $name=$request->name;
        $password=$request->password;
        $cat= \DB::table('usermaster')->where('username','=',$name)->where('password','=',$password)->count();
        if ($cat == 1) {
          $cat= \DB::table('usermaster')->where('username','=',$name)->where('password','=',$password)->get();
          foreach ($cat as $key => $value) {
            $name=$value->username;
            $role=$value->role;
            $id=$value->id;
            Session::put('name', $name);
            Session::put('role', $role);
            Session::put('member_id', $id);


          }
          if ($role == 'Accountant Manager') {
              return redirect('/accountant');
          }elseif($role == 'User(waiter)'){
            return redirect('/home_index');
          }elseif($role == 'Kitchen Manager') {
            return redirect('/man_kitchenHome');
          }elseif($role == 'Admin') {
            return redirect('/admin');
          }
          
        }else
        {
          return redirect('/user/login');
        }
    }
    public function home_index(Request $request)
    {
      $cat= \DB::table('tablemaster')->where('tablestatus','=','1')->get();
      return view('home.index',compact('cat'));
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

