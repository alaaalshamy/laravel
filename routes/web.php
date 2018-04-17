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
    return view('welcome');
});
Route::get('/map', function(){
    $config = array();
    $config['center'] = 'auto';
    $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

    app('map')->initialize($config);

    // set up the marker ready for positioning
    // once we know the users location
    $marker = array();
    app('map')->add_marker($marker);

    $map = app('map')->create_map();
   
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return view('home');
});
Route::get("/addindex", "EmployeeController@store");
Route::post("/addindex", "EmployeeController@store");
Route::get("/index", "EmployeeController@show");
Route::get('/deleteEmployee/{id}',"EmployeeController@destroy");
Route::get('/editEmployee/{id}',"EmployeeController@edit");
Route::get('/saveEdit/{id}',"EmployeeController@update");
