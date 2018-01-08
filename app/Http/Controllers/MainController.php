<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //


    public function getEmployee($empid){

        print DB::table("employees")->count();

    }
}
