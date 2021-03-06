<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('index',function () {
    return view('index');
});

Route::get('home',function () {
    return view('home');
})->name('home');

Route::get('agenda',function () {
    return view('agenda');
})->name('agenda');


Route::get('reward',function () {
    return view('reward');
})->name('reward');


Route::get('map',function () {
    return view('map');
})->name('map');

Route::get('form',function () {
    return view('form');
})->name('form');

Route::get('contact-phone',function () {
    return view('contact-phone');
})->name('contact-phone');

Route::get('bus',function () {
    return view('bus');
})->name('bus');

Route::get('winners',function () {
    return view('winners');
})->name('winners');

//Route::get('register',function () {
//    return view('register');
//})->name('register');
//
Route::get('register',"MainController@getRegisterPage")->name('register');

//Route::get('menu',function () {
//    return view('menu');
//})->name('menu');
Route::get('menu/{register?}',"MainController@getMenuPage")->name('menu');

Route::get('geocomplete',function () {
    return view('geocomplete');
})->name('geocomplete');

Route::get('checkin',function () {


    return view('checkin');
    })->name('checkin');



Route::get('9DE4A97425678C5B1288AA70C1669A64',function(){

    return "";

})->name('register');

Route::get('9DE4A97425678C5B1288AA70C1669A64',"MainController@getRegisterPage")->name('register');
Route::get('attendee',"MainController@getAttendees");

Route::get('employees',"MainController@getEmployees");
Route::get('employees/{empid}',"MainController@getEmployee");
Route::post('employees/{empid}/register',"MainController@registerEmployee");


Route::get('setDB',function(){

    $employees = DB::table("Survey")->select("*")->get();



//    DB::table('Employees')
////                ->where('empno', $empno)
//        ->update(['registedstatus' => 0 ,'follower'=> 0 ]);

    $employees->each( function ($item,$key){



            $empno = $item->EmpID;
            $follower = $item->Follower;

            DB::table('Employees')
                ->where('empno', $empno)
                ->update(['registedstatus' => 1 ,'follower'=> $follower ]);






    });





});

Route::get('checkinstatus','MainController@getCheckin');


Route::get('getLuckyDraw','MainController@getLuckyDraw');







