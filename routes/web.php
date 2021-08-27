<?php

use App\Http\Controllers\Admin\VenuesController;
use App\Http\Controllers\Admin\EventTypesController;
use App\Http\Controllers\Admin\LocationsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//Front end routes
Route::get('/',[HomeController::class, 'index']);
Route::get('event-type/{slug}',[EventTypeController::class, 'index'])->name('event_type');
Route::get('location/{slug}',[LocationController::class, 'index'])->name('location');
Route::get('venues/{slug}/{id}',[VenueController::class,'show'])->name('venue.show');
Route::get('search',[SearchController::class, 'index'])->name('search');
Route::get('about',function(){return view('about');})->name('about');
Route::get('contact',function(){return view('contact');})->name('contact');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';



//Back end routes
Auth::routes(['register' => false]);


    Route::get('/admin', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.home');
    // Permissions
    Route::get('/permissions', 'App\Http\Controllers\Admin\PermissionsController@index')->name('permissions.index');
    Route::get('/create', 'App\Http\Controllers\Admin\PermissionsController@create')->name('permissions.create');
    Route::post('/store', 'App\Http\Controllers\Admin\PermissionsController@store')->name('permissions.store');
    Route::get('/edit/{permission}', 'App\Http\Controllers\Admin\PermissionsController@edit')->name('permissions.edit');
    Route::patch('/update/{permission}', 'App\Http\Controllers\Admin\PermissionsController@update')->name('permissions.update');
    Route::delete('permissions/destroy/{permission}', 'App\Http\Controllers\Admin\PermissionsController@destroy')->name('permissions.destroy');

    // Roles
    Route::delete('roles/destroy', 'App\Http\Controllers\Admin\RolesController@massDestroy')->name('roles.massDestroy');
    Route::get('/roles', 'App\Http\Controllers\Admin\RolesController@index')->name('roles.index');
    Route::get('/roles/create', 'App\Http\Controllers\Admin\RolesController@create')->name('roles.create');
    Route::post('roles/store', 'App\Http\Controllers\Admin\RolesController@store')->name('roles.store');
    Route::get('roles/edit/{role}', 'App\Http\Controllers\Admin\RolesController@edit')->name('roles.edit');
    Route::patch('roles/update/{role}', 'App\Http\Controllers\Admin\RolesController@update')->name('roles.update');
    Route::delete('roles/destroy/{role}', 'App\Http\Controllers\Admin\RolesController@destroy')->name('roles.destroy');

    // Users
    Route::delete('users/destroy', 'App\Http\Controllers\Admin\UsersController@massDestroy')->name('users.massDestroy');
    Route::get('/users', 'App\Http\Controllers\Admin\UsersController@index')->name('users.index');
    Route::get('/users/create', 'App\Http\Controllers\Admin\UsersController@create')->name('users.create');
    Route::post('users/store', 'App\Http\Controllers\Admin\UsersController@store')->name('users.store');
    Route::get('users/edit/{user}', 'App\Http\Controllers\Admin\UsersController@edit')->name('users.edit');
    Route::patch('users/update/{user}', 'App\Http\Controllers\Admin\UsersController@update')->name('users.update');
    Route::delete('users/destroy/{user}', 'App\Http\Controllers\Admin\UsersController@destroy')->name('users.destroy');

    // Locations
    Route::post('locations/media', 'App\Http\Controllers\Admin\LocationsController@storeMedia')->name('locations.storeMedia');
    Route::get('admin/locations', 'App\Http\Controllers\Admin\LocationsController@index')->name('locations.index');
    Route::get('admin/location/{location}', 'App\Http\Controllers\Admin\LocationsController@show')->name('locations.show');
    Route::get('admin/locations/create', 'App\Http\Controllers\Admin\LocationsController@create')->name('locations.create');
    Route::post('admin/locations/store', 'App\Http\Controllers\Admin\LocationsController@store')->name('locations.store');
    Route::get('admin/locations/edit/{location}', 'App\Http\Controllers\Admin\LocationsController@edit')->name('locations.edit');
    Route::patch('/locations/update/{location}', 'App\Http\Controllers\Admin\LocationsController@update')->name('locations.update');
    Route::delete('locations/destroy/{location}', 'App\Http\Controllers\Admin\LocationsController@destroy')->name('locations.destroy');

    // Event Types
    Route::delete('admin/event-types/destroy', 'App\Http\Controllers\Admin\EventTypesController@massDestroy')->name('event-types.massDestroy');
    Route::post('admin/event-types/media', 'App\Http\Controllers\Admin\EventTypesController@storeMedia')->name('event-types.storeMedia');
    Route::get('admin/event-types', 'App\Http\Controllers\Admin\PermissionsController@index')->name('admin.event-types.index');
    Route::get('admin/event-types/create', 'App\Http\Controllers\Admin\PermissionsController@create')->name('admin.event-types.create');
    Route::post('admin/event-types/store', 'App\Http\Controllers\Admin\PermissionsController@store')->name('admin.event-types.store');
    Route::get('admin/event-types/edit', 'App\Http\Controllers\Admin\PermissionsController@edit')->name('admin.event-types.edit');

    // Venues
    Route::delete('venues/destroy', 'App\Http\Controllers\Admin\VenuesController@massDestroy')->name('venues.massDestroy');
    Route::post('venues/media', 'App\Http\Controllers\Admin\VenuesController@storeMedia')->name('venues.storeMedia');
    Route::get('/venues', 'App\Http\Controllers\Admin\PermissionsController@index')->name('admin.venues.index');
    Route::get('/venues/create', 'App\Http\Controllers\Admin\PermissionsController@create')->name('admin.venues.create');
    Route::post('/venues/store', 'App\Http\Controllers\Admin\PermissionsController@store')->name('admin.venues.store');
    Route::get('/venues/edit', 'App\Http\Controllers\Admin\PermissionsController@edit')->name('admin.venues.edit');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
