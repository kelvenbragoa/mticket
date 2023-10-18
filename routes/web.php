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
Route::get('/recargas',[\App\Http\Controllers\RootController::class,'recargas']);

Route::get('/acerca-nos', [App\Http\Controllers\RootController::class, 'aboutus'])->name('aboutus');
Route::get('/faqs', [App\Http\Controllers\RootController::class, 'faq'])->name('faq');
Route::get('/contactos', [App\Http\Controllers\RootController::class, 'contact'])->name('contact');
Route::get('/ajuda', [App\Http\Controllers\RootController::class, 'help'])->name('help');
Route::get('/como-funciona', [App\Http\Controllers\RootController::class, 'howitworks'])->name('howitworks');
Route::get('/termos-privacidade', [App\Http\Controllers\RootController::class, 'politicas'])->name('politicas');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/perfil', [App\Http\Controllers\ProfileController::class, 'perfil'])->name('perfil');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);

Route::get('/todos-eventos', [App\Http\Controllers\User\EventsController::class, 'frontedAllEvents']);
Route::get('/todas-categorias', [App\Http\Controllers\User\EventsController::class, 'frontedAllCategories']);
Route::get('/categoria/{categoria}/eventos', [App\Http\Controllers\RootController::class, 'eventsCategory']);
Route::get('/provincia/{provincia}/eventos', [App\Http\Controllers\RootController::class, 'eventsProvince']);
Route::get('/pesquisar-eventos', [App\Http\Controllers\User\EventsController::class, 'search']);
Route::resource('profile', 'App\Http\Controllers\ProfileController');

//eventos


Route::get('/updatedataprice', [App\Http\Controllers\RootController::class, 'updatedataprice']);
// Route::get('/damasio', [App\Http\Controllers\RootController::class, 'damasio']);
Route::get('/detalhes/{evento}/evento', [App\Http\Controllers\User\EventsController::class, 'detailevents']);


Route::get('/checkout/{evento}/evento', [App\Http\Controllers\User\CheckOutController::class, 'checkout']);
Route::resource('checkout', 'App\Http\Controllers\User\CheckOutController');
//SUPERADMIN CONTROLLERS

Route::group(['middleware'=>['auth','superadmin']], function(){

    Route::resource('gender', 'App\Http\Controllers\SuperAdmin\GenderController');
    Route::resource('city', 'App\Http\Controllers\SuperAdmin\CityController');
    Route::resource('province', 'App\Http\Controllers\SuperAdmin\ProvinceController');
    Route::resource('user', 'App\Http\Controllers\SuperAdmin\UserController');
    Route::resource('category', 'App\Http\Controllers\SuperAdmin\CategoryController');
    Route::resource('events', 'App\Http\Controllers\SuperAdmin\EventsController');
    Route::resource('protocols', 'App\Http\Controllers\SuperAdmin\ProtocolsController');
    Route::resource('barman', 'App\Http\Controllers\SuperAdmin\BarmanController');
    Route::get('/bar-report/{evento_id}', [App\Http\Controllers\SuperAdmin\EventsController::class, 'bar_report']);
    Route::get('/barstore-report/{bar_store_id}', [App\Http\Controllers\SuperAdmin\EventsController::class, 'bar_store_report']);

   
    Route::get('/ticket-report/{evento_id}', [App\Http\Controllers\SuperAdmin\EventsController::class, 'ticket_report']);
    Route::get('/event-ticket-report/{evento_id}', [App\Http\Controllers\SuperAdmin\EventReportController::class, 'tickets_report']);
    Route::get('/event-card-report/{evento_id}', [App\Http\Controllers\SuperAdmin\EventReportController::class, 'card_report']);
    Route::get('/updateallcard', [App\Http\Controllers\SuperAdmin\EventReportController::class, 'updatecard']);

    Route::get('/barman-report/{barman_id}', [App\Http\Controllers\SuperAdmin\EventsController::class, 'barmanreport']);

    Route::get('/barstore-excel-report', [App\Http\Controllers\SuperAdmin\EventsController::class, 'exportExcel']);



});


Route::group(['middleware'=>['auth','user']], function(){

    
Route::resource('carrinho', 'App\Http\Controllers\User\CartController');
Route::resource('review', 'App\Http\Controllers\User\ReviewController');
Route::resource('eventos', 'App\Http\Controllers\User\EventsController');
Route::resource('vendas', 'App\Http\Controllers\User\SellController');
Route::resource('bar', 'App\Http\Controllers\User\BarController');
Route::resource('barstore', 'App\Http\Controllers\User\BarStoreController');
Route::resource('painel', 'App\Http\Controllers\User\DashboardController');
Route::resource('tickets', 'App\Http\Controllers\User\TicketController');
Route::resource('package', 'App\Http\Controllers\User\PackageController');
Route::resource('produtos', 'App\Http\Controllers\User\ProductsController');
Route::resource('lineup', 'App\Http\Controllers\User\LineupController');
Route::post('/likeevent/{event_id}',[\App\Http\Controllers\User\EventsController::class,'likeevent']);
Route::get('/user-bar-report/{evento_id}', [App\Http\Controllers\User\BarController::class, 'bar_report']);
Route::get('/user-ticket-report/{evento_id}', [App\Http\Controllers\User\BarController::class, 'ticket_report']);

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

//pacote
Route::get('/pacote/{evento}/evento', [App\Http\Controllers\User\PackageController::class, 'index']);
Route::get('/pacote/{evento}/add', [App\Http\Controllers\User\PackageController::class, 'create']);
Route::get('/pacote/{evento}/evento/{pacote}/edit', [App\Http\Controllers\User\PackageController::class, 'edit']);

//produtos
Route::get('/produtos/{evento}/evento', [App\Http\Controllers\User\ProductsController::class, 'index']);
Route::get('/produtos/{evento}/add', [App\Http\Controllers\User\ProductsController::class, 'create']);
Route::get('/produtos/{evento}/evento/{produtos}/edit', [App\Http\Controllers\User\ProductsController::class, 'edit']);

//barstore
Route::get('/barstore/{evento}/evento', [App\Http\Controllers\User\BarStoreController::class, 'index']);
Route::get('/barstore/{evento}/add', [App\Http\Controllers\User\BarStoreController::class, 'create']);
Route::get('/barstore/{evento}/evento/{barstore}/edit', [App\Http\Controllers\User\BarStoreController::class, 'edit']);



Route::resource('meusbilhetes', 'App\Http\Controllers\User\MyTicketController');
Route::get('/meusbilhetes/{evento}/download', [App\Http\Controllers\User\MyTicketController::class, 'download']);

});






