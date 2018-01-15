<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //


    public function getRegisterPage()
    {


        $result = $this->getCheckin();

        return view('register', ["result" => $result]);
    }

    public function getAttendees()
    {


        $registered = DB::table("Employees")->sum("registedstatus");
        $follower = DB::table("Employees")->sum("follower");

        $result = array(

            "registered" => $registered,
            "follower" => $follower,
            "summary" => $registered + $follower

        );


        return $result;
    }

    public function getMenuPage()
    {


        $result = $this->getCheckin();

//        dd($result);

        return view('menu', ["result" => $result]);
    }

    public function getEmployee($empno)
    {

        $result = DB::table("Employees")->select("*")->where([['empno', $empno],["registedstatus",1]])->get();


        if ($result->count() == 0) {

            return -1;

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


        $count =  DB::table('Employees')
            ->where([['empno', $empno],["registedstatus",1]])->count();



        $follower = 2;

        if ($count == 1){


            $checkDup = DB::table('CheckIn')
                ->where('empno', $empno)->count();


            if($checkDup == 0) {

                DB::table('CheckIn')
                    ->insert([

                        "timestamp" => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')."+7 hours")),
                        "empno" => $empno,
                        "follower" => $follower

                    ]);


            } else {

                $count = -1;
            }
        }

        if ($count == 0) $count = -1;
//        DB::table('Employees')
//            ->where('empno', $empno)
//            ->update(['registedstatus' => 1]);

        return $count;


    }

    public function getEmployees()
    {


        return DB::table("Employees")->select("*")->get();

    }

    public function getCheckin(){

        $empcount =  DB::table('CheckIn')->count();

        $followercount = DB::table('CheckIn')->sum('follower');

        $result = $this->getAttendees();

        $result['checkinemp'] = $empcount;

        $result['checkinsummary'] = $empcount + $followercount;



        return $result;

    }
}
