<?php
use App\Http\Controllers\TTa_QuanTri_controller;
use App\Http\Controllers\ttaSP;
use App\Http\Controllers\TTa_SanPham_Controller;
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
#Admin route
Route::get('/tta-admins',function(){
    return view('TTaAdmins.index');
});
#list
Route::get('/ttaAdmins/tta-loai-san-pham',[ttaSP::class,'ttalist'])->name('admin-tta.list');
#insert
Route::get('/ttaAdmins/tta-loai-san-pham/tta-create',[ttaSP::class,'ttacreat'])->name('admin-tta.create');
#insert submit
Route::post('/ttaAdmins/tta-loai-san-pham/tta-create',[ttaSP::class,'ttacreatsubmit'])->name('admin-tta.createsubmit');
#chi tiết
Route::get('/ttaAdmins/tta-loai-san-pham/tta-chitiet/{id}',[ttaSP::class,'ttachitiet'])->name('admin-tta.chitiet');
#edit
Route::get('/ttaAdmins/tta-loai-san-pham/tta-edit/{id}',[ttaSP::class,'ttaedit'])->name('admin-tta.edit');
Route::post('/ttaAdmins/tta-loai-san-pham/tta-edit/{id}',[ttaSP::class,'ttaeditsubmit'])->name('admin-tta.editsubmit');
#xóa
Route::get('/ttaAdmins/tta-loai-san-pham/tta-delete/{id}', [ttaSP::class, 'ttadelete'])->name('admin-tta.delete');
#trangchủ
Route::get('/ttaAdmins/tta-loai-san-pham/tta-trangchu', [ttaSP::class, 'ttatrangchu'])->name('admin-tta.loaisanpham.trangchu');
#databoard
Route::get('/ttaAdmins/tta-trangchu', [ttaSP::class, 'datataboard'])->name('admin-tta.trangchu');
#login
Route::get('/ttaAdmins/tta-login', [TTa_QuanTri_controller::class, 'ttaLogin'])->name('admin-tta.login');
Route::post('/ttaAdmins/tta-login', [TTa_QuanTri_controller::class, 'ttaLoginsubmit'])->name('admin-tta.loginsubmit');
#home-logout
Route::get('/home', [TTa_QuanTri_controller::class, 'ttalogout'])->name('home');
#list quan tri
Route::get('/ttaAdmins/tta-listqt',[TTa_QuanTri_controller::class,'ttalistQT'])->name('tta-admins-listQT');
#insert
Route::get('/ttaAdmins/tta-loai-san-pham/tta-createQT',[TTa_QuanTri_controller::class,'ttacreatQT'])->name('admin-tta.createQT');
#insert submit
Route::post('/ttaAdmins/tta-loai-san-pham/tta-createQT',[TTa_QuanTri_controller::class,'ttacreatQTsubmit'])->name('admin-tta.createsubmitQT');
#chi tiết
Route::get('/ttaAdmins/tta-loai-san-pham/tta-chitietQTQT/{id}',[TTa_QuanTri_controller::class,'ttachitietqt'])->name('admin-tta.chitietqt');
#List sản phẩm
Route::get('/ttaAdminsp/tta-san-pham', [TTa_SanPham_Controller::class, 'ttalistSP'])->name('ttalist.sanpham');
#thêm mới sản phẩm
Route::get('/ttaAdminsp/tta-san-pham/tta-createsp',[TTa_SanPham_Controller::class,'ttacreatsp'])->name('tta.createsp');
#insert submit
Route::post('/ttaAdminsp/tta-san-pham/tta-createsp',[TTa_SanPham_Controller::class,'ttacreatspsubmit'])->name('tta.createspsubmit');