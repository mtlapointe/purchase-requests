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
    return redirect('login');
});

Auth::routes(['register' => false]);

Route::get('/public/data', 'PurchaseRequestLineController@allData')->name('purchase-request-lines-all-data');

Route::middleware(['auth'])->group(function() {

    // Purchase Requests
    Route::get('/purchase-requests', 'PurchaseRequestController@index')->name('purchase-requests');
    Route::get('/purchase-requests/data', 'PurchaseRequestController@data')->name('purchase-requests-data');
    Route::post('/purchase-requests/update', 'PurchaseRequestController@update')->name('purchase-requests-update');
    Route::get('/purchase-requests/select/data', 'PurchaseRequestController@selectData')->name('get-select-purchase-requests');
    Route::get('/purchase-requests/select/{id}', 'PurchaseRequestController@select');

    // Purchase Request Lines
    Route::post('/purchase-request-lines/data', 'PurchaseRequestLineController@data')->name('purchase-request-lines-data');
    Route::post('/purchase-request-lines/update', 'PurchaseRequestLineController@update')->name('purchase-request-lines-update');

    Route::get('/purchase-requests-lines-all', 'PurchaseRequestLineController@allIndex')->name('purchase-requests-lines-all');
    Route::get('/purchase-request-lines-all/data', 'PurchaseRequestLineController@allData')->name('purchase-request-lines-all-data');
    Route::post('/purchase-request-lines-all/update', 'PurchaseRequestLineController@allUpdate')->name('purchase-request-lines-all-update');
    Route::post('/purchase-request-line/buyers-notes/{id}', 'PurchaseRequestLineController@updateBuyersNotes');
    Route::post('/purchase-request-line/approve', 'PurchaseRequestLineController@approve');
    Route::post('/purchase-request-line/import', 'PurchaseRequestLineController@import');

    //Projects
    Route::get('/projects', 'ProjectController@index')->name('projects');
    Route::get('/projects/data', 'ProjectController@data')->name('projects-data');
    Route::post('/projects/update', 'ProjectController@update')->name('projects-update');
    //Tasks
    Route::get('/tasks/data', 'TaskController@data')->name('tasks-data');
    Route::post('/tasks/update', 'TaskController@update')->name('tasks-update');

    //Suppliers
    Route::get('/suppliers', 'SupplierController@index')->name('suppliers');
    Route::get('/suppliers/data', 'SupplierController@data')->name('suppliers-data');
    Route::post('/suppliers/update', 'SupplierController@update')->name('suppliers-update');

    //UOMS
    Route::get('/uoms', 'UomController@index')->name('uoms');
    Route::get('/uoms/data', 'UomController@data')->name('uoms-data');
    Route::post('/uoms/update', 'UomController@update')->name('uoms-update');

    Route::middleware(['admin'])->group(function(){
        //Users
        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/users/data', 'UserController@data')->name('users-data');
        Route::post('/users/update', 'UserController@update')->name('users-update');
    });
});


