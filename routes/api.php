<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('people', function() {
    // return datatables()->eloquent(App\people::query())->toJson();
    return datatables()->collection(
        DB::table('people')
            ->join('cities', 'people.city_id', '=', 'cities.id')
            ->join('jobs', 'people.job_id', '=', 'jobs.id')
            ->select('people.*', 'cities.name as city_name', 'jobs.name as job_name')
            ->orderBy('id', 'DESC')
            ->get()
        )
        ->toJson();
});

Route::get('chart', function () {
    $calification = App\People::select('calification', DB::raw('count(calification) as value'))
    ->groupBy('calification')
    ->orderBy('calification', 'ASC')
    ->get();
    return $calification;
});
Route::get('gender', function () {
    $gender = App\People::select('calification', 'gender', DB::raw('count(gender) as value'))
    ->groupBy('calification','gender')
    ->orderBy('calification', 'ASC')
    ->get();
    return $gender;
});
