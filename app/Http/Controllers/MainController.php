<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //


    public function getEmployee($empno){

        return DB::table("Employees")->select("*")->where("empno",$empno)->get();

    }
    public function getEmployeeStatus($empno){

        return DB::table("Employees")->select("*")->where("empno",$empno)->get();

    }
    public function getEmployeeRegisted($empno){

        return DB::table("Employees")->select("*")->where("empno",$empno)->get();

    }
    public function registerEmployee($empno){


        DB::table('Employees')
            ->where('empno', $empno)
            ->update(['registedstatus' => 1]);

        return 1;


    }
}
