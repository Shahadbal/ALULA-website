<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/admin',function () {
    return view('dashboard.controlpanel');
})->name('loginadmin')->middleware('admin');



Route::get('/cpanel', function () {
    return view('dashboard.controlpanel');
})->name('cpanel');
Route::get('/GetSports', [MainController::class, 'GetSports'])->name('GetSports')->middleware('admin');
Route::post('/savesport',[MainController::class, 'SaveSport'])->name('saveSport')->middleware('admin');
Route::get('/delete/{x}', [MainController::class, 'DelSport'])->name('del')->middleware('admin');
Route::get('/edit/{x}', [MainController::class, 'EditSport'])->name('edit')->middleware('admin');
Route::post('/update',[MainController::class, 'UpdateSport'])->name('update')->middleware('admin');
///////////////
Route::get('/GetAdventure', [MainController::class, 'GetAdventure'])->name('GetAdventure')->middleware('admin');
Route::post('/saveadventure',[MainController::class, 'SaveAdventure'])->name('saveAdventure')->middleware('admin');
Route::get('/deleteA/{x}', [MainController::class, 'DelAdventure'])->name('delA')->middleware('admin');
Route::get('/editA/{x}', [MainController::class, 'EditAdventure'])->name('editA')->middleware('admin');
Route::post('/updateA',[MainController::class, 'UpdateAdventure'])->name('updateA')->middleware('admin');
//////////////
Route::get('/GetTours', [MainController::class, 'GetTours'])->name('GetTours')->middleware('admin');
Route::post('/savetours',[MainController::class, 'SaveTours'])->name('saveTours')->middleware('admin');
Route::get('/deleteT/{x}', [MainController::class, 'DelTours'])->name('delT')->middleware('admin');
Route::get('/editT/{x}', [MainController::class, 'EditTours'])->name('editT')->middleware('admin');
Route::post('/updateT',[MainController::class, 'UpdateTours'])->name('updateT')->middleware('admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout',[MainController::class, 'logout'])->name('logout');
/////////////////////////////////////
Route::get('/sport',[MainController::class, 'spor'] )->name('spor');
Route::get('/tours',[MainController::class, 'tour'] )->name('tour');
Route::get('/adventure',[MainController::class, 'adv'] )->name('adv');
////////////////////////////////////
Route::get('/book/{id}',[MainController::class, 'GetInfo'] )->name('book')->middleware('auth');
Route::post('/c',[MainController::class, 'AddToCart'] )->name('AddToCart');
Route::get('/checkout',[MainController::class, 'checkout'] )->name('checkout')->middleware('auth');
Route::get('/done',[MainController::class, 'saveOrder'] )->name('done')->middleware('auth');
Route::get('/bills',[MainController::class, 'GetBills'] )->name('GetBills')->middleware('auth');