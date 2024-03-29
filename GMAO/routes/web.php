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

Route::get('/','HomeController@index')->name('home')->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/homet', 'HomeController@indextechnicien')->middleware('auth');
Route::get('/equipements','EquipementsController@index')->middleware('auth');

/* Users route */
Route::get('/profile','UsersController@profile')->middleware('auth');
Route::get('/profile/mod','UsersController@profilemod')->middleware('auth');
Route::post('/modprofile','UsersController@modprofile')->middleware('auth');
Route::get('/users','UsersController@index')->middleware('auth');
Route::get('/user/add','UsersController@create')->middleware('auth');
Route::post('/adduser','UsersController@store')->middleware('auth');
Route::post('/user/filter','UsersController@filter')->middleware('auth');
Route::get('/user/{id}','UsersController@show')->middleware('auth');
Route::post('/moduser/{id}','UsersController@update')->middleware('auth');
Route::get('/user/delete/{id}','UsersController@destroy')->middleware('auth');

/* Equipements route */

Route::get('/equipement/add','EquipementsController@create')->middleware('auth');
Route::post('/addequipement','EquipementsController@store')->middleware('auth');
Route::post('/equipement/filter','EquipementsController@filter')->middleware('auth');
Route::get('/equipement/{id}','EquipementsController@show')->middleware('auth');
Route::get('/equipement/mod/{id}','EquipementsController@edit')->middleware('auth');
Route::get('/equipement/del/{id}','EquipementsController@delete')->middleware('auth');
Route::post('/modequipement/{id}','EquipementsController@update')->middleware('auth');

/* Demande d'intervention route */
Route::get('/di','OinterventionsController@index')->middleware('auth');
Route::get('/di/add','OinterventionsController@create')->middleware('auth');
Route::post('/addoi','OinterventionsController@store')->middleware('auth');
Route::post('/oi/filter','OinterventionsController@filter')->middleware('auth');
Route::get('/di/{id}','OinterventionsController@show')->middleware('auth');
Route::get('/di/valider/{id}','OinterventionsController@valider')->middleware('auth');


Route::get('/ot/{id}','OinterventionsController@ordretravaille')->middleware('auth');
Route::get('/otoi/show/{id}','OinterventionsController@ordretravailleshow')->middleware('auth');
Route::get('/otmp/show/{id}','OinterventionsController@ordretravaillempshow')->middleware('auth');
Route::get('/otmp/historique/{id}','OinterventionsController@historiquempshow')->middleware('auth');
Route::get('/ot/refus/{id}','OinterventionsController@ordrerefus')->middleware('auth');
Route::get('/otmp/refus/{id}','OinterventionsController@ordremprefus')->middleware('auth');
Route::post('/ot/addobservation/{id}','OinterventionsController@addobservationoi')->middleware('auth');
Route::post('/otmp/addobservation/{id}','OinterventionsController@addobservationmp')->middleware('auth');

Route::get('/notification/seen/{id}','NotificationsController@seen')->middleware('auth');




/* maintenance preventives route */
Route::get('/mp','MpreventivesController@index')->middleware('auth');
Route::get('/mp/show/{id}','MpreventivesController@show')->middleware('auth');
Route::get('/m/{id}','MaintenancesController@show')->middleware('auth');
Route::get('/mp/add','MpreventivesController@create')->middleware('auth');
Route::post('/addmp','MpreventivesController@store')->middleware('auth');
Route::post('/mp/filter','MpreventivesController@filter')->middleware('auth');

/* plan maintenance route */
Route::get('/pm','PlanmaintenancesController@index')->middleware('auth');

/* Contrats du maintenance route */
Route::get('/cm','ContratsController@index')->middleware('auth');

Route::get('/cm/create','ContratsController@create')->middleware('auth');
Route::post('/cm/filter','ContratsController@filter')->middleware('auth');
Route::post('/addcontrat','ContratsController@add')->middleware('auth');
Route::get('/cm/del/{id}','ContratsController@destroy')->middleware('auth');
Route::get('/cm/mod/{id}','ContratsController@modification')->middleware('auth');
Route::post('/cm/mod/{id}','ContratsController@modification')->middleware('auth');
Route::post('/cm/mod/{id}/valide','ContratsController@edit')->middleware('auth');



/* Messages Route */

Route::get('/messages',"MessagesController@index")->middleware('auth');
Route::get('/conversation/{id}',"MessagesController@conversation")->middleware('auth');
Route::post('/addmessage',"MessagesController@store")->middleware('auth');

/* Departments routes */

Route::post('/department/filter',"DepartmentsController@filter")->middleware('auth');
Route::get('/department/create',"DepartmentsController@create")->middleware('auth');
Route::post('/department/add',"DepartmentsController@add")->middleware('auth');
Route::post('/department/mod/{id}',"DepartmentsController@update")->middleware('auth');
Route::get('/department/change/{id}',"DepartmentsController@change")->middleware('auth');
Route::get('/departments',"DepartmentsController@index")->middleware('auth');
Route::get('/department/delete/{id}',"DepartmentsController@destroy")->middleware('auth');