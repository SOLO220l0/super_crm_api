<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Xml\Tests;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get("/test", function ($request) {

    $data = Tests::all();
    return response()->json($data);
});


Route::post('/test/insert', function ($request) {
    $data = $request->validate([
        'test_name' => 'string',
        'test_date' => 'date'
    ]);

    $result = Tests::create($data);
    return response("Data Inserted Successfull");
});