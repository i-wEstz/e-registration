<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MainController extends Controller
{
    //


    public function getLuckyDraw()
    {



        $pool = "CheckIn";
//        $pool = "Employees";

//        dd(DB::table("Luckydraw")->count());

        $lCount = DB::table("Luckydraw")->count();

        if ($lCount == 0) {

            $newlucky = DB::table($pool)->get()->random()->empno;

        } else {

            $luckied = array();

            $lCollection = DB::table('Luckydraw')->get();

//            dd($lCollection->toArray());

            foreach ($lCollection->toArray() as $k => $v) {


                $luckied[] = $v->EmpID;

            }


            // get randaom

//            dd($luckied);


            $newlucky = DB::table($pool)->whereNotIn("empno", $luckied)->get()->random()->empno;

        }
//        dd($newlucky);

        // insert in to luckied

        DB::table('Luckydraw')
            ->insert([

                "EmpID" => $newlucky

            ]);


        return DB::table('Employees')->where('empno', $newlucky)->get();


        // send data back


        // exclude data from db
//      DB::table("Luckydraw")->sum("registedstatus");


//        dd(DB::table('CheckIn')->get()->random());
//        dd(DB::table('Employees')->get()->random());


        //

    }

    public function getRegisterPage()
    {


        $result = $this->getCheckin();
        if(isset($_COOKIE["registered"])) {
        $cookie_value = $_COOKIE["registered"];
            if($cookie_value == "Yes"){
                return view('menu');

            }else{
                return view('register', ["result" => $result]);
            }
        }
        else{
            return view('register', ["result" => $result]);
        }

    }

    public function getCheckin()
    {

        $empcount = DB::table('CheckIn')->count();

        $followercount = DB::table('CheckIn')->sum('follower');

        $result = $this->getAttendees();

        $result['checkinemp'] = $empcount;

        $result['checkinsummary'] = $empcount + $followercount;


        return $result;

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

    public function getMenuPage($register = null)
    {


        $result = $this->getCheckin();

//        dd($result);

        return view('menu', ["result" => $result]);
    }

    public function setCookie(){
        return response('Cookie set!')->withCookie(cookie('registered', 'Yes', 600));
    }

    public function getEmployee($empno)
    {

        $result = DB::table("Employees")->select("*")->where([['empno', $empno], ["registedstatus", 1]])->get();


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

    public function registerEmployee($empno, Request $request)
    {


        $count = DB::table('Employees')
            ->where([['empno', $empno], ["registedstatus", 1]])->count();


//        $follower = 2;
        $follower = $request->input('follower');

        if ($count == 1) {


            $checkDup = DB::table('CheckIn')
                ->where('empno', $empno)->count();


            if ($checkDup == 0) {

                DB::table('CheckIn')
                    ->insert([

                        "timestamp" => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . "+7 hours")),
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
}
