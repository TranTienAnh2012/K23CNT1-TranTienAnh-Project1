<?php
use App\Http\Controllers\TTa_QuanTri_controller;
use App\Http\Controllers\ttaSP;
use App\Http\Controllers\TTa_SanPham_Controller;
use App\Http\Controllers\tta_khachHang_controller;
use App\Http\Controllers\tta_hoadon_controller;
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
// Route::get('/admin/tvc-login',[TTa_QuanTri_controller::class,'ttaLogin'])->name('login.ttalog');
// Route::post('/admin/tvc-login',[TTa_QuanTri_controller::class,'ttaLoginsubmit'])->name('login.ttalogsubmit'); không cần nhưng lười xóa
#Admin route
Route::get('/tta-admins',function(){
    return view('TTaAdmins.index');
});
#--------------------------------------------------------------------------------------------------------------------------------------------
# loại sản phẩm
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
#xóa loại
Route::get('/ttaAdmins/tta-loai-san-pham/tta-delete/{id}', [ttaSP::class, 'ttadelete'])->name('admin-tta.delete');
#trangchủ
Route::get('/ttaAdmins/tta-loai-san-pham/tta-trangchu', [ttaSP::class, 'ttatrangchu'])->name('admin-tta.loaisanpham.trangchu');
#databoard
Route::get('/ttaAdmins/tta-trangchu', [ttaSP::class, 'datataboard'])->name('admin-tta.trangchu');
#--------------------------------------------------------------------------------------------------------------------------------------------
#Quản Trị
#login
Route::get('/ttaAdmins/tta-login', [TTa_QuanTri_controller::class, 'ttaLogin'])->name('admin-tta.login');
#login-submin
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
#---------------------------------------------------------------------------------------------------------------------------------------------
#Sản Phẩm
#List sản phẩm
Route::get('/ttaAdminsp/tta-san-pham', [TTa_SanPham_Controller::class,'ttalistSP'])->name('ttalist.sanpham');
#thêm mới sản phẩm
Route::get('/ttaAdminsp/tta-san-pham/tta-create', [TTa_SanPham_Controller::class, 'ttacreatsp'])->name('tta.createsp');
#insert submit
Route::post('/ttaAdminsp/tta-san-pham/tta-create', [TTa_SanPham_Controller::class, 'ttacreatspsubmit'])->name('tta.createspsubmit');
#chi tiết sản phẩm
Route::get('/ttaAdminsp/tta-san-pham/chitietsp/{ttaID}', [TTa_SanPham_Controller::class, 'ttachitietsp'])->name('tta.chitietsp');
#edit
Route::get('/ttaAdminsp/tta-san-pham/editsp/{ttaID}',[TTa_SanPham_Controller::class, 'ttaeditsp'])->name('tta.editsanpham');
#edit submit
Route::post('/ttaAdminsp/tta-san-pham/editsp/{ttaID}',[TTa_SanPham_Controller::class, 'ttaeditspsubmit'])->name('tta.editsanphamsubmit');
#xóa sản phẩm
Route::get('/ttaAdminsp/tta-san-pham/tta-delete/{id}', [TTa_SanPham_Controller::class, 'ttadeletesp'])->name('admin-tta.deletesp');
#-----------------------------------------------------------------------------------------------------------------------------------------------
#Khách Hàng   
Route::get('/TTaAdmin_KH/ttaKhachHang',[tta_khachHang_controller::class, 'ttalistKH'])->name('tta.listkhachhang');
#create khach hang
Route::get('/TTaAdmin_KH/ttaKhachHang/createkhachHang',[tta_khachHang_controller::class,'ttacreateKH'])->name('tta.craeteKHcreate');
#create submit
Route::post('/TTaAdmin_KH/ttaKhachHang/createkhachHang',[tta_khachHang_controller::class,'ttacreateKHsubmit'])->name('tta.createKH.createsubmit');
#chi tiệt
Route::get('/TTaAdmin_KH/ttaKhachHang/chitiet/{id}',[tta_khachHang_controller::class,'ttachitietkh'])->name('tta.chitietkh');
#edit
Route::get('/TTaAdmin_KH/ttaKhachHang/editkhachHang/{id}', [tta_khachHang_controller::class, 'ttaeditKH'])->name('tta.editKH');
#edit submit
Route::post('/TTaAdmin_KH/ttaKhachHang/editkhachHang/{id}', [tta_khachHang_controller::class, 'ttaeditsubmit'])->name('tta.editKHsubmit');
#delete
Route::get('/TTaAdmin_KH/ttaKhachHang/deletekhachhang/{id}',[tta_khachHang_controller::class,'ttaKHdelete'])->name('tta.deleteKH');
#----------------------------------------------------------------------------------------------------------------------------------------------------
#Hóa Đơn 
Route::get('/TTaAdmin_HD/ttaHoaDon',[tta_hoadon_controller::class,'ttalistHD'])->name('tta.listHD');