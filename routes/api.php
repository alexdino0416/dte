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
            ->get()
        )
        ->toJson();
});

Route::get('chart', function () {
    $calification = App\People::select('calification', DB::raw('count(calification) as valor'))
    ->groupBy('calification')
    ->orderBy('calification', 'ASC')
    ->get();
    return $calification;
});
