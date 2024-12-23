<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TTa_SanPham_Model;
class TTa_SanPham_Controller extends Controller
{
     //list
     public function ttalistSP(){
        $ttasanpham = TTa_SanPham_Model::all();
        return view('TTaAdminsp.ttaSanPham.tta-list',['ttasanpham'=> $ttasanpham]);
    }
    //thêm mớimới
    public function ttacreatsp(){
        return view('TTaAdminsp.ttaSanPham.tta-create');
    }
    public function ttacreatspsubmit(Request $request){
        $request->validate([
            'ttaMaSanPham' => 'required|unique:tta__san_pham,ttaMaSanPham', // Đảm bảo duy nhất
            'ttaTenSanPham' => 'required',
            'ttaHinhAnh' => 'required',
            'ttaSoLuong' => 'required',
            'ttaDonGia' => 'required',
            'ttaMaloai' => 'required',
            'ttaTrangThai' => 'required|boolean',
        ]);
        
        $ttasanpham = new TTa_SanPham_Model;
        $ttasanpham->ttaMaSanPham = $request->ttaMaSanPham;
        $ttasanpham->ttaTenSanPham = $request->ttaTenSanPham;
        $ttasanpham->ttaHinhAnh = $request->ttaHinhAnh;
        $ttasanpham->ttaSoLuong = $request->ttaSoLuong;
        $ttasanpham->ttaDonGia = $request->ttaDonGia;
        $ttasanpham->ttaMaloai = $request->ttaMaloai;
        $ttasanpham->ttaTrangThai = $request->ttaTrangThai;
        
        $ttaloaisanpham->save();
    
        return redirect()->route('admin-tta.list');
    }
}
