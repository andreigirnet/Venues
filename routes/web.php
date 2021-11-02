<?php

use App\Http\Controllers\ClientVenueController;
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
Route::get('/', [HomeController::class, 'index']);


    Route::group(['prefix'=>'user'], function(){
    Route::get('event-type/{slug}', [EventTypeController::class, 'index'])->name('event_type');
    Route::get('location/{slug}', [LocationController::class, 'index'])->name('location');
    Route::get('venues/{slug}/{id}', [VenueController::class, 'show'])->name('venue.show');
    Route::get('search', [SearchController::class, 'index'])->name('search');
    Route::get('about', function () {
        return view('about');
    })->name('about');
    Route::get('contact', function () {
        return view('contact');
    })->name('contact');
    });



Route::group(['middleware'=>'auth'],function() {
    //Create a venue by user only registered
    Route::get('/user/create/venue', [ClientVenueController::class, 'create'])->name('user.create');
    Route::post('/user/store/venue', [ClientVenueController::class, 'store'])->name('user.store');
    //User-Dashboard
    Route::get('/user/dashboard', [ClientVenueController::class, 'index'])->name('user.index');
    Route::get('/user/profile/edit/{user}', [ClientVenueController::class, 'profile_edit'])->name('user.profile.edit');
    Route::patch('/user/profile/edit/{user}', [ClientVenueController::class, 'profile_update'])->name('user.profile.update');
//Back end routes
    Route::group([
        'middleware'=>'is_admin',
        'prefix'=>'admin',
   //     'as'=>'admin.' if you want to name all the routes with .admin for not repeating
    ], function(){
    Route::get('admin/admin', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.home');
    // Permissions
    Route::get('admin/permissions', 'App\Http\Controllers\Admin\PermissionsController@index')->name('permissions.index');
    Route::get('admin/create', 'App\Http\Controllers\Admin\PermissionsController@create')->name('permissions.create');
    Route::post('admin/store', 'App\Http\Controllers\Admin\PermissionsController@store')->name('permissions.store');
    Route::get('admin/edit/{permission}', 'App\Http\Controllers\Admin\PermissionsController@edit')->name('permissions.edit');
    Route::patch('admin/update/{permission}', 'App\Http\Controllers\Admin\PermissionsController@update')->name('permissions.update');
    Route::delete('admin/permissions/destroy/{permission}', 'App\Http\Controllers\Admin\PermissionsController@destroy')->name('permissions.destroy');

    // Roles
    Route::delete('admin/roles/destroy', 'App\Http\Controllers\Admin\RolesController@massDestroy')->name('roles.massDestroy');
    Route::get('admin/roles', 'App\Http\Controllers\Admin\RolesController@index')->name('roles.index');
    Route::get('admin/roles/create', 'App\Http\Controllers\Admin\RolesController@create')->name('roles.create');
    Route::post('admin/roles/store', 'App\Http\Controllers\Admin\RolesController@store')->name('roles.store');
    Route::get('admin/roles/edit/{role}', 'App\Http\Controllers\Admin\RolesController@edit')->name('roles.edit');
    Route::patch('admin/roles/update/{role}', 'App\Http\Controllers\Admin\RolesController@update')->name('roles.update');
    Route::delete('admin/roles/destroy/{role}', 'App\Http\Controllers\Admin\RolesController@destroy')->name('roles.destroy');

    // Users
    Route::delete('admin/users/destroy', 'App\Http\Controllers\Admin\UsersController@massDestroy')->name('users.massDestroy');
    Route::get('admin/users', 'App\Http\Controllers\Admin\UsersController@index')->name('users.index');
    Route::get('admin/users/create', 'App\Http\Controllers\Admin\UsersController@create')->name('users.create');
    Route::post('admin/users/store', 'App\Http\Controllers\Admin\UsersController@store')->name('users.store');
    Route::get('admin/users/edit/{user}', 'App\Http\Controllers\Admin\UsersController@edit')->name('users.edit');
    Route::patch('admin/users/update/{user}', 'App\Http\Controllers\Admin\UsersController@update')->name('users.update');
    Route::delete('admin/users/destroy/{user}', 'App\Http\Controllers\Admin\UsersController@destroy')->name('users.destroy');

    // Locations
    Route::post('admin/locations/media', 'App\Http\Controllers\Admin\LocationsController@storeMedia')->name('locations.storeMedia');
    Route::get('admin/locations', 'App\Http\Controllers\Admin\LocationsController@index')->name('locations.index');
    Route::get('admin/location/{location}', 'App\Http\Controllers\Admin\LocationsController@show')->name('locations.show');
    Route::get('admin/locations/create', 'App\Http\Controllers\Admin\LocationsController@create')->name('locations.create');
    Route::post('admin/locations/store', 'App\Http\Controllers\Admin\LocationsController@store')->name('locations.store');
    Route::get('admin/locations/edit/{location}', 'App\Http\Controllers\Admin\LocationsController@edit')->name('locations.edit');
    Route::patch('admin/locations/update/{location}', 'App\Http\Controllers\Admin\LocationsController@update')->name('locations.update');
    Route::delete('admin/locations/destroy/{location}', 'App\Http\Controllers\Admin\LocationsController@destroy')->name('locations.destroy');

    // Event Types
    Route::get('admin/event-types', 'App\Http\Controllers\Admin\EventTypesController@index')->name('event-types.index');
    Route::get('admin/event-types/{eventType}', 'App\Http\Controllers\Admin\EventTypesController@show')->name('event-types.show');
    Route::get('admin/admin/event-types/create', 'App\Http\Controllers\Admin\EventTypesController@create')->name('admin.event-types.create');
    Route::post('admin/event-types/store', 'App\Http\Controllers\Admin\EventTypesController@store')->name('event-types.store');
    Route::get('admin/event-types/edit/{eventType}', 'App\Http\Controllers\Admin\EventTypesController@edit')->name('event-types.edit');
    Route::patch('admin/event-types/update/{eventType}', 'App\Http\Controllers\Admin\EventTypesController@update')->name('event-types.update');
    Route::delete('admin/event-types/destroy/{eventType}', 'App\Http\Controllers\Admin\EventTypesController@destroy')->name('event-types.destroy');

    // Venues
    Route::get('admin/venues', 'App\Http\Controllers\Admin\VenuesController@index')->name('venues.index');
    Route::get('admin/venues/create', 'App\Http\Controllers\Admin\VenuesController@create')->name('venues.create');
    Route::get('admin/admin/venues/show/{venue}', 'App\Http\Controllers\Admin\VenuesController@show')->name('venues.show');
    Route::post('admin/venues/store', 'App\Http\Controllers\Admin\VenuesController@store')->name('venues.store');
    Route::get('admin/venues/edit/{venue}', 'App\Http\Controllers\Admin\VenuesController@edit')->name('venues.edit');
    Route::patch('admin/venues/edit/{venue}', 'App\Http\Controllers\Admin\VenuesController@update')->name('venues.update');
    Route::delete('admin/venues/destroy/{venue}', 'App\Http\Controllers\Admin\VenuesController@destroy')->name('venues.destroy');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
require __DIR__ . '/auth.php';
Auth::routes();
