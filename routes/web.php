<?php
use App\Http\Controllers\Visitor\PagesController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', [PagesController::class , 'showAll'])->name('visitor.');
Route::get('men', [PagesController::class , 'showMen'])->name('visitor.men');
Route::get('kids', [PagesController::class , 'showkids'])->name('visitor.kids');
Route::get('women', [PagesController::class , 'showwomen'])->name('visitor.women');
Route::get('shope', [PagesController::class , 'index'])->name('visitor.shope');
Route::get('show/{id}', [PagesController::class , 'show'])->name('visitor.show');
