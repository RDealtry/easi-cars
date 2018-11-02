<?php

/**
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get(
    '/', function () {
        return view('welcome'); // Old route
        //return view('pages.home');
    }
);

Route::get(
    'tables', function () {
        return view('pages.tables');
    }
);

Route::get(
    'reports', function () {
        return view('pages.reports');
    }
);

Route::get(
    'about', function () {
        return view('pages.about');
    }
);

Route::get(
    'help', function () {
        return view('pages.help');
    }
);

// Display view
Route::get('datatable', 'DataTableController@datatable');
// Get Data
Route::get('datatable/getdata', 'DataTableController@getPosts')->name('datatable/getdata');

// Old Attempt - but may be useful in future?
//Route::get('create', 'DatatablesController@create');
//Route::get('index', 'DatatablesController@index');

Auth::routes();

// Checking if this is closure prob when clearing cache
Route::get('/home', 'HomeController@index')->name('home');


Route::group(
    ['prefix' => 'admin'], function () {
        Voyager::routes();
    }
);

//Route::get('/', function () {
//    return view('houses.index');
//});

Route::resource('casenotes', 'CasenoteController');
Route::get('casenotes_data/get_data', 'CasenoteGetController@index');
Route::resource('houses', 'HouseController');
Route::get('houses_data/get_data', 'HouseGetController@index');
Route::resource('warnings', 'WarningController');
Route::get('warnings_data/get_data', 'WarningGetController@index');
Route::resource('certificates', 'CertificateController');
Route::get('certificates_data/get_data', 'CertificateGetController@index');

//Route::get('/test', 'testcontroller@test_query');


Route::get(
    '/test', function () {
        //$houses = \App\House::all();
        //return view('test_blade')->with(['houses' => $houses]);
        $testvar = 1;
        //$test = new Item;
        $test = $testvar;

        dd($test);
        //Log::info($test);
        //var_dump($test);


    }
);


// To populate houses drop down in certificates "add" form
// https://stackoverflow.com/questions/45783086/laravel-how-to-populate-select-box-from-database
Route::get(
    '/certificates', function () {
        $myhouses = \App\House::all();
        return view('certificates/index')
            ->with(['myhouses' => $myhouses]);
//            ->with(['MyHouse' => $MyHouse]);
    }
);
