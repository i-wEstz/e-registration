<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //



    public function getRegisterPage(){


    $result = $this->getAttendees();

    return view('register',["result"=>$result]);
}

    public function getMenuPage(){


        $result = $this->getAttendees();

        return view('menu',["result"=>$result]);
    }



    public function getEmployee($empno)
    {

        $result = DB::table("Employees")->select("*")->where("empno", $empno)->get();


        if ($result->count() == 0) {

            return 0;

        }

        return $result;

    }

    public function getEmployeeStatus($empno)
    {

        return DB::table("Employees")->select("*")->where("empno", $empno)->get();

    }

    public function getEmployeeRegister($empno)
    {


        return DB::table("Employees")->count();

    }

    public function registerEmployee($empno)
    {


        DB::table('Employees')
            ->where('empno', $empno)
            ->update(['registedstatus' => 1]);

        return 1;


    }

    public function getEmployees()
    {


        return DB::table("Employees")->select("*")->get();

    }

    public function getAttendees()
    {


        $registered = DB::table("Employees")->sum("registedstatus");
        $follower = DB::table("Employees")->sum("follower");

        $result = array(

            "registered" => $registered,
            "follower" => $follower,
            "summary"=> $registered + $follower

        );


        return $result;
    }
}
