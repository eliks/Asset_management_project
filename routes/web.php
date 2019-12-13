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

Auth::routes();

Route::get('login', function () {
    return view('welcome');
})->name('login');

Route::get('home', 'HomeController@index')->name('home');
Route::get('assets/register_via_closed_link/{token}', 'AssetsController@createViaLink')->name('assets.register_via_closed_link');
Route::get('assets/register_via_opened_link/{token}', 'AssetsController@createViaLink')->name('assets.register_via_opened_link');
Route::post('assets/store_via_closed_link/{token}', 'AssetsController@storeViaLink')->name('assets.store_via_closed_link');
Route::post('assets/store_via_opened_link/{token}', 'AssetsController@storeViaLink')->name('assets.store_via_opened_link');
	
Route::group(['middleware' => ['auth']], function () {
 
	Route::get('assets/{asset}/create_maintenance', 'AssetsController@createMaintenance')->name('assets.create-maintenance');
	Route::get('assets/{asset}/schedule', 'AssetsController@schedule')->name('assets.schedule');
	Route::patch('assets/{asset}/schedule', 'AssetsController@scheduleMaintenance')->name('patch.assets.schedule');
	Route::resource('assets', 'AssetsController');
	Route::resource('asset_registration_links', 'AssetRegistrationLinkController');
	Route::resource('location', 'LocationController');
	Route::resource('users', 'UsersTableController');
	Route::resource('maintenance', 'MaintenanceActivitiesController');
	Route::resource('userslocation', 'UsersLocationController');

	Route::get('api/maintenance_trend', 'MaintenanceActivitiesController@apiMaintenanceTrend')->name('api.maintenance_trend');

});


Route::get('/', function () {
    return view('welcome');
});

