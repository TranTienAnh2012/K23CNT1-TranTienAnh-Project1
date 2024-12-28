<?php
use App\Http\Controllers\TTa_QuanTri_controller;
use App\Http\Controllers\ttaSP;
use App\Http\Controllers\TTa_SanPham_Controller;
use App\Http\Controllers\tta_khachHang_controller;
use App\Http\Controllers\tta_hoadon_controller;
use App\Http\Controllers\tta_cthoadon_controller;
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
Route::get('/ttaAdmins/tta-loai-san-pham/tta-editlsp/{id}',[ttaSP::class,'ttaedit'])->name('admin-tta.edit');
Route::post('/ttaAdmins/tta-loai-san-pham/tta-editlsp/{id}',[ttaSP::class,'ttaeditsubmit'])->name('admin-tta.editsubmit');
#xóa loại
Route::get('/ttaAdmins/tta-loai-san-pham/tta-deletelsp/{id}', [ttaSP::class, 'ttadelete'])->name('admin-tta.delete');
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
# sửa
Route::get('/ttaAdmins/tta-loai-san-pham/tta-edit/{id}',[TTa_QuanTri_controller::class,'ttaeditqt'])->name('admin.editQT');
# sửa submit
Route::post('/ttaAdmins/tta-loai-san-pham/tta-edit/{id}',[TTa_QuanTri_controller::class,'ttaeditsubmit'])->name('admin.editsubmitQT');
# delete
Route::get('/ttaAdmins/tta-loai-san-pham/tta-delete/{id}',[TTa_QuanTri_controller::class,'ttaQTdelete'])->name('admin.deleteQT');
#---------------------------------------------------------------------------------------------------------------------------------------------
#Sản Phẩm
#tim kiếm
Route::get('/ttaAdminsp/tta-san-pham/timkiem', [TTa_SanPham_Controller::class, 'search'])->name('productTypes.timkiem');
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
#create 
Route::get('/TTaAdmin_HD/ttaHoaDon/tta-craeteHD',[tta_hoadon_controller::class,'ttacreathd'])->name('tta.createHD');
#create submit
Route::post('/TTaAdmin_HD/ttaHoaDon/tta-craeteHD',[tta_hoadon_controller::class,'ttacreathdsubmit'])->name('tta.createsubmitHD');
#chi tiết hóa đơn
Route::get('/TTaAdmin_HD/ttaHoaDon/chitiet/{id}', [tta_hoadon_controller::class,'ttchitiethd'])->name('tta.chitietHD');
#edit
Route::get('/TTaAdmin_HD/ttaHoaDon/tta_editHD/{id}', [tta_hoadon_controller::class, 'ttaedithd'])
    ->name('tta.editHD');
#edit submit
Route::post('/TTaAdmin_HD/ttaHoaDon/tta_editHD/{id}', [tta_hoadon_controller::class, 'ttaeditHDsubmit'])
    ->name('tta.editHDsubmit');
#delete hoa đơn
Route::get('/TTaAdmin_HD/ttaHoaDon/tta-deleteHD/{id}',[tta_hoadon_controller::class,'ttaHDdelete'])->name('tta.deleteHd');
#---------------------------------------------------------------------------------------------------------------------------------------------------------
# líst
Route::get('/TTaAdmin_CTHD/ttaCTHoaDon',[tta_cthoadon_controller::class,'ttalistCTHD'])->name('tta.listCTHD');
# thêm mới
Route::get('/TTaAdmin_CTHD/ttaCTHoaDon/Create-CTHD',[tta_cthoadon_controller::class,'ttacreatecthd'])->name('tta.createCTHD');
# thêm mới submit
Route::post('/TTaAdmin_CTHD/ttaCTHoaDon/Create-CTHD',[tta_cthoadon_controller::class,'ttacreatecthdsubmit'])->name('tta.createsubmitCTHD');
# chi tiết
Route::get('/TTaAdmin_CTHD/ttaCTHoaDon/ChiTiet-CTHD/{id}', [tta_cthoadon_controller::class, 'ttachitietcthd'])->name('tta.chitietCTHD');
# edit
Route::get('/TTaAdmin_CTHD/ttaCTHoaDon/Edit-CTHD/{id}', [tta_cthoadon_controller::class, 'ttaeditcthd'])->name('tta.editCTHD');
# edit submit
Route::post('/TTaAdmin_CTHD/ttaCTHoaDon/Edit-CTHD/{id}', [tta_cthoadon_controller::class, 'ttaeditCTHDsubmit'])->name('tta.editsubmitCTHD');
# delete
Route::get('/TTaAdmin_CTHD/ttaCTHoaDon/delete-CTHD/{id}', [tta_cthoadon_controller::class, 'ttaCTHDdelete'])->name('tta.deleteCTHD');
#---------------------------------------------------------------------------------------------------------------------------------------------
Route::get('/ttaweb/ThôngTinTT', function () {
    return view('TTausers.ThôngTin.ttaGTSP');
});
Route::get('/ttaweb/GioiThieuTT', function () {
    return view('TTausers.SanPham.ttaGTSPimages');
});
Route::get('/ttaweb', function () {
    return view('_layouts.usres.tta_master');
});