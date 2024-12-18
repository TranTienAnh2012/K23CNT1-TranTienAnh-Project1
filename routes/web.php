<?php
use App\Http\Controllers\TTa_QuanTri_controller;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/tvc-login',[TTa_QuanTri_controller::class,'ttaLogin'])->name('login.ttalog');
Route::post('/admin/tvc-login',[TTa_QuanTri_controller::class,'ttaLoginsubmit'])->name('login.ttalogsubmit');
