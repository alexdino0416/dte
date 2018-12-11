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
    // $peoples = DB::table('people')
    // ->join('cities', 'people.city_id', '=', 'cities.id')
    // ->join('jobs', 'people.job_id', '=', 'jobs.id')
    // ->select('people.*', 'cities.name as "city_name"', 'jobs.name as "job_name"')
    // ->limit(100)
    // ->get();
    return view('welcome');
});
Route::get('/chart', function () {
    $total = App\People::count();
    return view('chart', compact('total'));
});