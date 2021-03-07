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


//redirect to the students resource controller
// Route::get('/', function () {
//     return redirect('/reports');
// });



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();


/**
 * all admin routes
 */
Route::group(['middleware' => ['\App\Http\Middleware\Admin']] , function(){
    /**
     * the dashboard
     */
    Route::get('/home', 'ReportsController@index')->name('home');
    Route::resource('reports','ReportsController');
    Route::get('filterdata', 'ReportsController@getAjaxdatum');
    Route::get('ratifing', 'ReportsController@ratifing');

    Route::resource('results','ResultsController');
    Route::get('filterdata_result', 'ResultsController@getAjaxdatum');
    Route::get('result_ratifing', 'ResultsController@ratifing');

    Route::resource('invoice','InvoiceController');
    Route::get('filterdata_invoice', 'InvoiceController@getAjaxdatum');
    Route::get('invoice_ratifing', 'InvoiceController@ratifing');
    
    
});
