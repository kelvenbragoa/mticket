<?php

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


Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/',[\App\Http\Controllers\RootController::class,'index']);

Route::get('/ser-promotor',[\App\Http\Controllers\RootController::class,'bepromotor']);

Route::get('/acerca-nos', [App\Http\Controllers\RootController::class, 'aboutus'])->name('aboutus');
Route::get('/faqs', [App\Http\Controllers\RootController::class, 'faq'])->name('faq');
Route::get('/contactos', [App\Http\Controllers\RootController::class, 'contact'])->name('contact');
Route::get('/ajuda', [App\Http\Controllers\RootController::class, 'help'])->name('help');
Route::get('/como-funciona', [App\Http\Controllers\RootController::class, 'howitworks'])->name('howitworks');
Route::get('/termos-privacidade', [App\Http\Controllers\RootController::class, 'politicas'])->name('politicas');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/todos-eventos', [App\Http\Controllers\User\EventsController::class, 'frontedAllEvents']);
Route::get('/todas-categorias', [App\Http\Controllers\User\EventsController::class, 'frontedAllCategories']);
Route::get('/categoria/{categoria}/eventos', [App\Http\Controllers\RootController::class, 'eventsCategory']);
Route::get('/provincia/{provincia}/eventos', [App\Http\Controllers\RootController::class, 'eventsProvince']);



//SUPERADMIN CONTROLLERS

Route::group(['middleware'=>['auth','superadmin']], function(){

    Route::resource('gender', 'App\Http\Controllers\SuperAdmin\GenderController');
    Route::resource('city', 'App\Http\Controllers\SuperAdmin\CityController');
    Route::resource('province', 'App\Http\Controllers\SuperAdmin\ProvinceController');
    Route::resource('user', 'App\Http\Controllers\SuperAdmin\UserController');
    Route::resource('category', 'App\Http\Controllers\SuperAdmin\CategoryController');
    Route::resource('events', 'App\Http\Controllers\SuperAdmin\EventsController');

});


Route::resource('carrinho', 'App\Http\Controllers\User\CartController');
Route::resource('review', 'App\Http\Controllers\User\ReviewController');
Route::resource('eventos', 'App\Http\Controllers\User\EventsController');
Route::resource('vendas', 'App\Http\Controllers\User\SellController');
Route::resource('painel', 'App\Http\Controllers\User\DashboardController');
Route::resource('tickets', 'App\Http\Controllers\User\TicketController');
Route::resource('lineup', 'App\Http\Controllers\User\LineupController');
Route::post('/likeevent/{event_id}',[\App\Http\Controllers\User\EventsController::class,'likeevent']);

//Profiles controller
Route::resource('profile', 'App\Http\Controllers\User\ProfileController');
Route::post('/changepassword',[\App\Http\Controllers\User\ProfileController::class,'changepassword']);

//lineups
Route::get('/lineup/{evento}/add', [App\Http\Controllers\User\LineupController::class, 'create']);
Route::get('/lineup/{evento}/evento', [App\Http\Controllers\User\LineupController::class, 'index']);
Route::get('/lineup/{evento}/evento/{lineup}/edit', [App\Http\Controllers\User\LineupController::class, 'edit']);

//bilhete
Route::get('/bilhete/{evento}/evento', [App\Http\Controllers\User\TicketController::class, 'index']);
Route::get('/bilhete/{evento}/add', [App\Http\Controllers\User\TicketController::class, 'create']);
Route::get('/bilhete/{evento}/evento/{bilhete}/edit', [App\Http\Controllers\User\TicketController::class, 'edit']);


//eventos




Route::get('/detalhes/{evento}/evento', [App\Http\Controllers\User\EventsController::class, 'detailevents']);


Route::get('/checkout/{evento}/evento', [App\Http\Controllers\User\CheckOutController::class, 'checkout']);
Route::resource('checkout', 'App\Http\Controllers\User\CheckOutController');


