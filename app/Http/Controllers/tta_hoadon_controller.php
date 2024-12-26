<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tta_hoadon_model;
use App\Models\tta_KhachHang_model;
class tta_hoadon_controller extends Controller
{
    public function ttalistHD()
    {
        $ttaHoaDon = tta_hoadon_model::all();
        return view('TTaAdmin_HD.ttaHoaDon.tta-listHD', ['ttaHoaDon' => $ttaHoaDon]);
    }
    public function ttacreathd()
    {
        $ttakhachhang = tta_KhachHang_model::all();
        return view('TTaAdmin_HD.ttaHoaDon.tta-create-HD', ['ttakhachhang' => $ttakhachhang]);
    }
    // Xử lý thêm mới sản phẩm
    public function ttacreatspsubmit(Request $request)
    {
        $request->validate([
            'ttaMaSanPham' => 'required|string|unique:tta__san_pham',
            'ttaTenSanPham' => 'required|string',
            'ttaHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'ttaSoLuong' => 'required|numeric',
            'ttaDonGia' => 'required|numeric',
            'ttaMaloai' => 'required',
            'ttaTrangThai' => 'required|boolean',
        ]);

        // Tìm ID loại sản phẩm từ mã loại
        $loaiKhachHang = tta_KhachHang_model::where('ttaMakhachhang', $request->ttaMakhachhang)->first();
        if (!$loaiKhachHang) {
            return redirect()->back()->withErrors(['ttaMakhachhang' => 'Mã loại sản phẩm không hợp lệ.']);
        }

        $ttasanpham = new TTa_SanPham_Model();
        $ttasanpham->ttaMaSanPham = $request->ttaMaSanPham;
        $ttasanpham->ttaTenSanPham = $request->ttaTenSanPham;

        // Xử lý hình ảnh
        if ($request->hasFile('ttaHinhAnh')) {
            $TtaGetAnh = $request->file('ttaHinhAnh');
            $SaveAs = time() . '.' . $TtaGetAnh->getClientOriginalExtension(); // Tạo tên file duy nhất
            $TtaGetAnh->move(public_path('images'), $SaveAs); // Lưu hình ảnh vào thư mục public/images
            $ttasanpham->ttaHinhAnh = $SaveAs; // Lưu tên file vào cơ sở dữ liệu
        } elseif ($request->ttaHinhAnhSelected) {
            $ttasanpham->ttaHinhAnh = $request->ttaHinhAnhSelected; // Sử dụng ảnh đã chọn từ danh sách
        }

        $ttasanpham->ttaSoLuong = $request->ttaSoLuong;
        $ttasanpham->ttaDonGia = $request->ttaDonGia;
        $ttasanpham->ttaMaloai = $loaiSanPham->id; // Lưu ID của loại sản phẩm
        $ttasanpham->ttaTrangThai = $request->ttaTrangThai;
        $ttasanpham->save();

        return redirect('/ttaAdminsp/tta-san-pham')->with('success', 'Thêm sản phẩm thành công!');
    }
}
