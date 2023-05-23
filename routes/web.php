<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardConroller;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\HotelController;

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
            //*** Group LoginController  ***//
Route::controller(LoginController::class)->middleware(['guest'])->group(function(){
    Route::get('/register','Registerform')->name('register');
    Route::post('/register','process_register');
    Route::get('/login','Loginform')->name('login');
    Route::post('/login','authenticate_user_login');
    Route::get('/forget','forget_password')->name('forgot_password'); 
});
Route::post('/get_province', [CountriesController::class, 'get_province']);
Route::post('/get_city', [CountriesController::class, 'get_city']);

Route::get('/countries/fetch_cities/{country_id}', [CountriesController::class, 'fetch_cities']);
// Route::post('/get_filter', [CountriesController::class, 'get_filter']);
 //*** Single LoginController  ***//

//  -> middleware (user must be login other-wise redirect to login page)
Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [DashboardConroller::class, 'dashboard'])->name('admin.dashboard');
  Route::resource('countries',CountriesController::class)->except(['show']);
  Route::resource('cities',CitiesController::class)->except(['show']);
  Route::resource('amenities',AmenitiesController::class)->except(['show']);
  Route::resource('services',ServicesController::class)->except(['show']);
  Route::resource('hotels',HotelController::class)->except(['show']);
  // Using prefix  
  Route::prefix('admin')->group(function () {
      Route::get('/books', [BookController::class, 'index'])->name('admin.books');
      Route::post('/books', [BookController::class, 'store'])->name('book.store');
      Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
      Route::delete('/books/delete/{id}', [BookController::class, 'destroy'])->name('book.delete');
  });
});
  Route::get('csv_export',[AmenitiesController::class,'exportCSV']);
  Route::get('import-form',[AmenitiesController::class,'importForm']);
  Route::post('import-form',[AmenitiesController::class,'saveimportFile']);
  Route::get('/employee/pdf', [AmenitiesController::class, 'createPDF']);
  Route::get('/currency',[AmenitiesController::class,'currency'])->name('currency');




  