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
    return datatables()->query(
        DB::table('people')
            ->join('cities', 'people.city_id', '=', 'cities.id')
            ->join('jobs', 'people.job_id', '=', 'jobs.id')
            ->select('people.*', 'cities.name', 'jobs.name')
            ->get()
        )
        ->toJson();
    });
