<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tta_KhachHang_model;
class tta_khachHang_controller extends Controller
{
    // List sản phẩm
    public function ttalistKH()
    {
        $ttakhachhang = tta_KhachHang_model::all();
        return view('TTaAdmin_KH.ttaKhachHang.tta-listKH', ['ttakhachhang' => $ttakhachhang]);
    }
    //them mowi
    public function ttacreateKH(){
        return view('TTaAdmin_KH.ttaKhachHang.tta-createkh');
    }
    public function ttacreateKHsubmit(Request $request)
    {
        // Validate dữ liệu nhập vào
        $request->validate([
            'ttaMakhachhang' => 'required|unique:tta__khach__hang,ttaMakhachhang|max:255',
            'ttaHotenkhachhang' => 'required|max:255',
            'ttaEmail' => 'required|email|unique:tta__khach__hang,ttaEmail|max:255',
            'ttaDienThoai' => 'required|unique:tta__khach__hang,ttaDienThoai|max:255',
            'ttaDiaChi' => 'required|max:255',
            'ttaNgayDK' => 'required|date',
            'ttaTrangThai' => 'required|boolean',
        ]);
    
        // Tạo một đối tượng mới của model
        $khachHang = new tta_KhachHang_model();
        $khachHang->ttaMakhachhang = $request->ttaMakhachhang;
        $khachHang->ttaHotenkhachhang = $request->ttaHotenkhachhang;
        $khachHang->ttaEmail = $request->ttaEmail;
        $khachHang->ttaDienThoai = $request->ttaDienThoai;
        $khachHang->ttaDiaChi = $request->ttaDiaChi;
        $khachHang->ttaNgayDK = $request->ttaNgayDK;
        $khachHang->ttaTrangThai = $request->ttaTrangThai;
    
        // Lưu dữ liệu vào bảng
        $khachHang->save();
    
        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('tta.listkhachhang')->with('success', 'Khách hàng được tạo thành công!');
    }
     #chi tiết
     public function ttachitietkh($id)
     {
         // Tìm bản ghi theo id
         $khachHang = tta_KhachHang_model::find($id);
     
         // Kiểm tra nếu không tìm thấy bản ghi
         if (!$khachHang) {
             return redirect('/TTaAdmin_KH/ttaKhachHang')->with('error', 'Không tìm thấy thông tin sản phẩm.');
         }
     
         // Trả về view với dữ liệu
         return view('TTaAdmin_KH.ttaKhachHang.tta-chitietkh', ['khachHang' => $khachHang]);
     }

#edit
    public function ttaeditKH($id)
    {
        $khachHang = tta_KhachHang_model::find($id);
    
        if (!$khachHang) {
            return redirect()->route('tta.listkhachhang')->with('error', 'Khách hàng không tồn tại.');
        }
    
        return view('TTaAdmin_KH.ttaKhachHang.tta-edit', compact('khachHang'));
    }
#edit submit
    public function ttaeditsubmit(Request $request, $id)
    {
        $request->validate([
            'ttaHotenkhachhang' => 'required|string|max:255',
            'ttaEmail' => 'required|email|max:255',
            'ttaDienThoai' => 'required|string|max:255',
            'ttaDiaChi' => 'required|string|max:255',
            'ttaNgayDK' => 'required|date',
            'ttaTrangThai' => 'required|boolean',
        ]);

        $khachHang = tta_KhachHang_model::find($id);

        if (!$khachHang) {
            return redirect()->route('tta.listkhachhang')->with('error', 'Khách hàng không tồn tại.');
        }

        $khachHang->ttaHotenkhachhang = $request->ttaHotenkhachhang;
        $khachHang->ttaEmail = $request->ttaEmail;
        $khachHang->ttaDienThoai = $request->ttaDienThoai;
        $khachHang->ttaDiaChi = $request->ttaDiaChi;
        $khachHang->ttaNgayDK = $request->ttaNgayDK;
        $khachHang->ttaTrangThai = $request->ttaTrangThai;

        $khachHang->save();

        return redirect()->route('tta.listkhachhang')->with('success', 'Khách hàng đã được cập nhật thành công.');
    }
    #delete
    public function ttaKHdelete($id){
        $khachHang = tta_KhachHang_model::findOrFail($id);
        $khachHang->delete();
        return redirect()->route('tta.listkhachhang')->with('message', 'Loại sản phẩm đã được xoá thành công!');
    }  



}
