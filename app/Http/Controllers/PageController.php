<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function index(){
     //
    }
    public function songs(){
        return view('page.songs');
    }

}
