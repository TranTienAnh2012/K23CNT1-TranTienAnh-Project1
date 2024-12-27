<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tta_hoadon_model;
use App\Models\tta_KhachHang_model;

class tta_hoadon_controller extends Controller
{
    public function ttalistHD()
    {
        $ttaHoaDon = tta_hoadon_model::paginate(5);
        return view('TTaAdmin_HD.ttaHoaDon.tta-listHD', ['ttaHoaDon' => $ttaHoaDon]);
    }
    #insert
    public function ttacreathd()
    {
        // Lấy danh sách khách hàng để chọn
        $ttakhachhang = tta_KhachHang_model::all();
        return view('TTaAdmin_HD.ttaHoaDon.tta-create-HD', ['ttakhachhang' => $ttakhachhang]);
    }

    #insert submit
    public function ttacreathdsubmit(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'ttaMakhachhang' => 'required|exists:tta__khach__hang,id',
            'ttaMaHoaDon' => 'required|string|unique:tta__hoa_don,ttaMaHoaDon',
            'ttaNgayHoaDon' => 'required|date',
            'ttaHotenKhachHang' => 'required|string|max:255',
            'ttaEmail' => 'nullable|email|max:255',
            'ttaDienThoai' => 'nullable|string|max:255',
            'ttaDiaChi' => 'nullable|string|max:255',
            'ttaTongGiaTri' => 'required|numeric|min:0',
            'ttaTrangThai' => 'required|boolean',
        ]);
    
        // Giới hạn giá trị ttaTongGiaTri (ví dụ giới hạn tối đa là 99999999999999.99)
        $maxTongGiaTri = 99999999999999.99;  // Giới hạn giá trị tối đa
        $ttaTongGiaTri = min($request->ttaTongGiaTri, $maxTongGiaTri);  // Giới hạn giá trị nếu vượt quá
    
        // Tạo hóa đơn mới
        $hoaDon = new tta_hoadon_model();
        $hoaDon->ttaMaHoaDon = $request->ttaMaHoaDon;
        $hoaDon->ttaMakhachhang = $request->ttaMakhachhang;
        $hoaDon->ttaNgayHoaDon = $request->ttaNgayHoaDon;
        $hoaDon->ttaHotenKhachHang = $request->ttaHotenKhachHang;
        $hoaDon->ttaEmail = $request->ttaEmail;
        $hoaDon->ttaDienThoai = $request->ttaDienThoai;
        $hoaDon->ttaDiaChi = $request->ttaDiaChi;
        $hoaDon->ttaTongGiaTri = $ttaTongGiaTri;  // Lưu giá trị đã được giới hạn
        $hoaDon->ttaTrangThai = $request->ttaTrangThai;
    
        // Lưu vào cơ sở dữ liệu
        $hoaDon->save();
    
        return redirect()->route('tta.listHD')->with('success', 'Thêm hóa đơn thành công!');
    }
    #chi tiết
            public function ttchitiethd($id)
            {
                // Truy vấn dữ liệu từ bảng tta_HoaDon theo id
                $ttaHoaDon = tta_hoadon_model::find($id);

                // Nếu không tìm thấy Hoa Don
                if (!$ttaHoaDon) {
                    return redirect()->route('tta.listHD')->with('error', 'Không tìm thấy Hoa Don.');
                }

                // Lấy danh sách loại Hoa Don
                $ttaloaikhachhang = tta_KhachHang_model::all();

                // Trả về view với dữ liệu Hoa Don và loại Hoa Don
                return view('TTaAdmin_HD.ttaHoaDon.tta-chitiet-HD', compact('ttaHoaDon', 'ttaloaikhachhang'));
            }
    #edit
    public function ttaedithd($id)
    {
        // Truy vấn dữ liệu từ bảng tta_HoaDon theo id
        $ttaHoaDon = tta_hoadon_model::find($id);

        // Nếu không tìm thấy Hoa Don
        if (!$ttaHoaDon) {
            return redirect()->route('tta.listHD')->with('error', 'Không tìm thấy Hoa Don.');
        }

        // Lấy danh sách loại Hoa Don
        $ttaloaikhachhang = tta_KhachHang_model::all();

        // Trả về view với dữ liệu Hoa Don và loại Hoa Don
        return view('TTaAdmin_HD.ttaHoaDon.tta-edit-HD', compact('ttaHoaDon', 'ttaloaikhachhang'));
    }
    public function ttaeditHDsubmit(Request $request, $id)
    {
    // Xác thực dữ liệu
    $request->validate([
        'ttaMakhachhang' => 'required|exists:tta__khach__hang,id',
        'ttaMaHoaDon' => "required|string|unique:tta__hoa_don,ttaMaHoaDon,{$id}",
        'ttaNgayHoaDon' => 'required|date',
        'ttaHotenKhachHang' => 'required|string|max:255',
        'ttaEmail' => 'nullable|email|max:255',
        'ttaDienThoai' => 'nullable|string|max:255',
        'ttaDiaChi' => 'nullable|string|max:255',
        'ttaTongGiaTri' => 'required|numeric|min:0',
        'ttaTrangThai' => 'required|boolean',
    ]);

    // Tìm hóa đơn theo ID
    $ttaHoaDon = tta_hoadon_model::find($id);

    // Kiểm tra nếu không tìm thấy
    if (!$ttaHoaDon) {
        return redirect()->route('tta.listHD')->with('error', 'Không tìm thấy hóa đơn.');
    }

    // Giới hạn giá trị ttaTongGiaTri
    $maxTongGiaTri = 9999999999.99; // Giới hạn giá trị tối đa
    $ttaTongGiaTri = min($request->ttaTongGiaTri, $maxTongGiaTri);

    // Cập nhật dữ liệu
    $ttaHoaDon->ttaMaHoaDon = $request->ttaMaHoaDon;
    $ttaHoaDon->ttaMakhachhang = $request->ttaMakhachhang;
    $ttaHoaDon->ttaNgayHoaDon = $request->ttaNgayHoaDon;
    $ttaHoaDon->ttaHotenKhachHang = $request->ttaHotenKhachHang;
    $ttaHoaDon->ttaEmail = $request->ttaEmail;
    $ttaHoaDon->ttaDienThoai = $request->ttaDienThoai;
    $ttaHoaDon->ttaDiaChi = $request->ttaDiaChi;
    $ttaHoaDon->ttaTongGiaTri = $ttaTongGiaTri; // Gán giá trị đã được giới hạn
    $ttaHoaDon->ttaTrangThai = $request->ttaTrangThai;

    // Lưu vào cơ sở dữ liệu
    $ttaHoaDon->save();

    return redirect()->route('tta.listHD')->with('success', 'Cập nhật hóa đơn thành công!');
    }
     #delete
     public function ttaHDdelete($id){
        $ttaHoaDon = tta_hoadon_model::findOrFail($id);
        $ttaHoaDon->delete();
        return redirect()->route('tta.listHD')->with('message', 'Loại sản phẩm đã được xoá thành công!');
    }  

    
}
