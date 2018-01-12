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

//Route::get('register',function () {
//    return view('register');
//})->name('register');
//
Route::get('register',"MainController@getRegisterPage")->name('register');

//Route::get('menu',function () {
//    return view('menu');
//})->name('menu');
Route::get('menu',"MainController@getMenuPage")->name('menu');

Route::get('geocomplete',function () {
    return view('geocomplete');
})->name('geocomplete');

Route::get('checkin',function () {


    return view('checkin');
    })->name('checkin');



Route::get('attendee',"MainController@getAttendees");

Route::get('employees',"MainController@getEmployees");
Route::get('employees/{empid}',"MainController@getEmployee");
Route::post('employees/{empid}/register',"MainController@registerEmployee");


Route::get('setDB',function(){

    $employees = DB::table("Employees")->select("*")->get();

    $test[] = $employees->each( function ($item,$key){

        if($key % 3 == 0 ){

            $empno = $item->empno;

            DB::table('Employees')
                ->where('empno', $empno)
                ->update(['registedstatus' => 1 ,'follower'=> rand(0,4) ]);
        }



    });





});

Route::get('test',function(){

   return ('MainController@getAttendees');
});




