<?php

namespace App\Http\Controllers;
use App\Models\tta_chitiehoadon;
use App\Models\tta_hoadon_model;
use App\Models\TTa_SanPham_Model;
use Illuminate\Http\Request;

class tta_cthoadon_controller extends Controller
{
    public function ttalistCTHD()
    { //paginate(5)
        $ttactHoaDon = tta_chitiehoadon::all();
        return view('TTaAdmin_CTHD.ttaCTHOADON.tta-listCTHD', ['ttactHoaDon' => $ttactHoaDon]);
    }
    #insert
    public function ttacreatecthd()
    {
        // Lấy danh sách Hoa Don va San Pham để chọn
        $ttaHoaDon = tta_hoadon_model::all();
        $ttaSanPham = TTa_SanPham_Model::all();

        return view('TTaAdmin_CTHD.ttaCTHOADON.tta-create-CTHD',
         [
            'ttaHoaDon' => $ttaHoaDon,
            'ttaSanPham' => $ttaSanPham
         ]);
    }
    #insert submit
    public function ttacreatecthdsubmit(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'ttaHoaDonID' => 'required|exists:tta__hoa_don,id',
            'ttaSanPhamID' => 'required|exists:tta__san_pham,id',
            'ttaSoLuongMua' => 'required',
            'ttaDonGiaMua' => 'required|numeric|min:0|max:9999999999.99',
            'ttaThanhTien' => 'nullable',
            'ttattaTrangThai' => 'required|boolean',
        ]);
    
        // Tạo hóa đơn mới
        $CThoaDon = new tta_chitiehoadon();
        $CThoaDon->ttaHoaDonID = $request->ttaHoaDonID;
        $CThoaDon->ttaSanPhamID = $request->ttaSanPhamID;
        $CThoaDon->ttaSoLuongMua = $request->ttaSoLuongMua;
        $CThoaDon->ttaDonGiaMua = $request->ttaDonGiaMua;
        $CThoaDon->ttaThanhTien = $request->ttaThanhTien;
        $CThoaDon->ttattaTrangThai = $request->ttattaTrangThai;
    
        // Lưu vào cơ sở dữ liệu
        $CThoaDon->save();
    
        return redirect()->route('tta.listCTHD')->with('success', 'Thêm hóa đơn thành công!');
    }
    #chi tiết
    public function ttachitietcthd($id)
    {
        // Truy vấn dữ liệu từ bảng tta_HoaDon theo id
        $ttaCTHoaDon = tta_chitiehoadon::find($id);

        // Nếu không tìm thấy Hoa Don
        if (!$ttaCTHoaDon) {
            return redirect()->route('tta.listCTHD')->with('error', 'Không tìm thấy Hoa Don.');
        }

        // Lấy danh sách loại ID Hoa Don
        $ttaIDHoaDon = tta_hoadon_model::all();
        // Lấy danh sách loại ID San Pham
        $ttaIDSanPham = TTa_SanPham_Model::all();

        // Trả về view với dữ liệu Hoa Don và loại Hoa Don
        return view('TTaAdmin_CTHD.ttaCTHOADON.tta-chitiet-CTHD', compact('ttaCTHoaDon', 'ttaIDHoaDon','ttaIDSanPham'));
    }

    #edit
    public function ttaeditcthd($id)
    {
        // Truy vấn dữ liệu từ bảng tta_HoaDon theo id
        $ttaCTHoaDon = tta_chitiehoadon::find($id);

        // Nếu không tìm thấy Hoa Don
        if (!$ttaCTHoaDon) {
            return redirect()->route('tta.listCTHD')->with('error', 'Không tìm thấy Hoa Don.');
        }

        // Lấy danh sách loại ID Hoa Don
        $ttaIDHoaDon = tta_hoadon_model::all();
        // Lấy danh sách loại ID San Pham
        $ttaIDSanPham = TTa_SanPham_Model::all();

        // Trả về view với dữ liệu Hoa Don và loại Hoa Don
        return view('TTaAdmin_CTHD.ttaCTHOADON.tta-edit-CTHD', compact('ttaCTHoaDon', 'ttaIDHoaDon','ttaIDSanPham'));
    }
    public function ttaeditCTHDsubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'ttaHoaDonID' => 'required|exists:tta__hoa_don,id',
            'ttaSanPhamID' => 'required|exists:tta__san_pham,id',
            'ttaSoLuongMua' => 'required|integer|min:1',
            'ttaDonGiaMua' => 'required|numeric|min:0|max:9999999999.99',
            'ttaThanhTien' => 'nullable|numeric|min:0|max:9999999999.99',
            'ttattaTrangThai' => 'required|boolean',
        ]);
    
        // Tìm chi tiết hóa đơn theo ID
        $ttaCTHoaDon = tta_chitiehoadon::find($id);
    
        // Kiểm tra nếu không tìm thấy
        if (!$ttaCTHoaDon) {
            return redirect()->route('tta.listCTHD')->with('error', 'Không tìm thấy chi tiết hóa đơn.');
        }
    
        // Cập nhật dữ liệu
        $ttaCTHoaDon->ttaHoaDonID = $request->ttaHoaDonID;
        $ttaCTHoaDon->ttaSanPhamID = $request->ttaSanPhamID;
        $ttaCTHoaDon->ttaSoLuongMua = $request->ttaSoLuongMua;
        $ttaCTHoaDon->ttaDonGiaMua = $request->ttaDonGiaMua;
        $ttaCTHoaDon->ttaThanhTien = $request->ttaThanhTien ?? $ttaCTHoaDon->ttaSoLuongMua * $ttaCTHoaDon->ttaDonGiaMua;
        $ttaCTHoaDon->ttattaTrangThai = $request->ttattaTrangThai;
    
        // Lưu vào cơ sở dữ liệu
        $ttaCTHoaDon->save();
    
        return redirect()->route('tta.listCTHD')->with('success', 'Cập nhật chi tiết hóa đơn thành công!');
    }
     #delete
     public function ttaCTHDdelete($id){
        $ttaCTHoaDon = tta_chitiehoadon::findOrFail($id);
        $ttaCTHoaDon->delete();
        return redirect()->route('tta.listCTHD')->with('message', 'Loại sản phẩm đã được xoá thành công!');
    }  
}
