<?php

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


/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/


Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::group(
	[
		'middleware' => ['auth:sanctum'],
	], function()
	{
		Route::get('/home', 'HomeController@index')->name('home');

		Route::group(
		[
			'prefix' => 'admin',
			'namespace' => 'Admin',
			'middleware' => ['admin'],
		], function()
		{
			Route::get('/dashboard', function () {
				return view('admin/dashboard');
			})->name('dashboard');

			Route::resource('countries', 'CountryController');
			Route::resource('cities', 'CityController');
			Route::resource('categories', 'CategoryController');
			Route::resource('restaurants', 'RestaurantController');
			Route::get('addrestaurants', 'RestaurantController@addrestaurants');

		});	

		Route::group(
		[
			'prefix' => 'customer',
			//'namespace' => 'Admin',
		], function()
		{
		});	
	});
});