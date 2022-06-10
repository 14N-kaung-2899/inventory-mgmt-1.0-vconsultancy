<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Address Related Controller Importing
use app\Http\Controllers\CountryController;
use app\Http\Controllers\CityController;
use app\Http\Controllers\DistrictController;
use app\Http\Controllers\SubdistrictController;

//Item Related Controller Importing
use app\Http\Controllers\CategoryController;
use app\Http\Controllers\StorageController;
use app\Http\Controllers\ItemController;

//Employee Related Controller Importing
use app\Http\Controllers\EmployeeController;
use app\Http\Controllers\EmploymentController;
use app\Http\Controllers\RoleController;
use app\Http\Controllers\EmergencyController;
use app\Http\Controllers\KpiController;
use app\Http\Controllers\OfficedocController;
use app\Http\Controllers\PayrollController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(array('before' => 'auth'), function()
{
    Route::resource('userregister', 'App\Http\Controllers\UserRegisterController');

    Route::resource('item', 'App\Http\Controllers\ItemController');

    Route::resource('country', 'App\Http\Controllers\CountryController');
    Route::resource('city', 'App\Http\Controllers\CityController');
    Route::resource('district', 'App\Http\Controllers\DistrictController');
    Route::resource('subdistrict', 'App\Http\Controllers\SubdistrictController');

    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::resource('storage', 'App\Http\Controllers\StorageController');

    Route::resource('employee', 'App\Http\Controllers\EmployeeController');
    Route::resource('employment', 'App\Http\Controllers\EmploymentController');
    Route::resource('role', 'App\Http\Controllers\RoleController');
    Route::resource('emergency', 'App\Http\Controllers\EmergencyController');
    Route::resource('kpi', 'App\Http\Controllers\KpiController');
    Route::resource('officedoc', 'App\Http\Controllers\OfficedocController');
    Route::resource('payroll', 'App\Http\Controllers\PayrollController');

    Route::resource('office', 'App\Http\Controllers\OfficeController');
    Route::resource('location', 'App\Http\Controllers\LocationController');
});




