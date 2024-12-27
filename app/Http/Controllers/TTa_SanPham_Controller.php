<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TTa_SanPham_Model;
use App\Models\TTA_loai_san_pham;
use Illuminate\Support\Facades\Log; // Ghi log
use Illuminate\Support\Facades\File; // Xử lý file

class TTa_SanPham_Controller extends Controller
{
    // List sản phẩm
    public function ttalistSP(Request $request)
    {
        $search = $request->input('search', null); // Lấy giá trị tìm kiếm hoặc null
        $ttasanpham = TTa_SanPham_Model::paginate(3);
        return view('TTaAdminsp.ttaSanPham.tta-list', ['ttasanpham' => $ttasanpham , 'search' => $search]);
    }

    // Form thêm mới sản phẩm
    public function ttacreatsp()
    {
        $ttaloaisanpham = TTA_loai_san_pham::all();
        $availableImages = File::allFiles(public_path('images'));
        return view('TTaAdminsp.ttaSanPham.tta-create', ['ttaloaisanpham' => $ttaloaisanpham, 'availableImages' => $availableImages]);
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
        $loaiSanPham = TTA_loai_san_pham::where('ttaMaloai', $request->ttaMaloai)->first();
        if (!$loaiSanPham) {
            return redirect()->back()->withErrors(['ttaMaloai' => 'Mã loại sản phẩm không hợp lệ.']);
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
    #chi tiết 
    public function ttachitietsp($ttaID)
    {
        // Truy vấn dữ liệu từ bảng tta_sanpham theo id
        $ttasanpham = TTa_SanPham_Model::find($ttaID);
    
        // Nếu không tìm thấy sản phẩm
        if (!$ttasanpham) {
            return redirect()->route('ttalist.sanpham')->with('error', 'Không tìm thấy sản phẩm.');
        }
        $ttaloaisanpham = TTA_loai_san_pham::all();
        // Trả về view với dữ liệu sản phẩm
        return view('TTaAdminsp.ttaSanPham.ttachitietsp', compact('ttasanpham','ttaloaisanpham'));
    }
    #edit
    public function ttaeditsp($ttaID)
        {
            // Truy vấn dữ liệu từ bảng tta_sanpham theo id
            $ttasanpham = TTa_SanPham_Model::find($ttaID);

            // Nếu không tìm thấy sản phẩm
            if (!$ttasanpham) {
                return redirect()->route('ttalist.sanpham')->with('error', 'Không tìm thấy sản phẩm.');
            }

            // Lấy danh sách loại sản phẩm
            $ttaloaisanpham = TTA_loai_san_pham::all();

            // Trả về view với dữ liệu sản phẩm và loại sản phẩm
            return view('TTaAdminsp.ttaSanPham.ttaeditsp', compact('ttasanpham', 'ttaloaisanpham'));
        }

    public function ttaeditspsubmit(Request $request, $ttaID)
        {
            $request->validate([
                'ttaTenSanPham' => 'required|string',
                'ttaHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'ttaSoLuong' => 'required|numeric',
                'ttaDonGia' => 'required|numeric',
                'ttaMaloai' => 'required',
                'ttaTrangThai' => 'required|boolean',
            ]);
        
            // Lấy sản phẩm cần sửa
            $ttasanpham = TTa_SanPham_Model::find($ttaID);
            if (!$ttasanpham) {
                return redirect()->route('ttalist.sanpham')->with('error', 'Không tìm thấy sản phẩm.');
            }
        
            // Xử lý mã loại sản phẩm
            $loaiSanPham = TTA_loai_san_pham::where('ttaMaloai', $request->ttaMaloai)->first();
            if (!$loaiSanPham) {
                return redirect()->back()->withErrors(['ttaMaloai' => 'Mã loại sản phẩm không hợp lệ.']);
            }
        
            // Cập nhật thông tin sản phẩm
            $ttasanpham->ttaTenSanPham = $request->ttaTenSanPham;
        
            // Xử lý hình ảnh
            if ($request->hasFile('ttaHinhAnh')) {
                // Nếu sản phẩm đã có ảnh cũ, xóa ảnh cũ
                if ($ttasanpham->ttaHinhAnh && File::exists(public_path('images/' . $ttasanpham->ttaHinhAnh))) {
                    File::delete(public_path('images/' . $ttasanpham->ttaHinhAnh));
                }
        
                // Lưu ảnh mới
                $TtaGetAnh = $request->file('ttaHinhAnh');
                $SaveAs = time() . '.' . $TtaGetAnh->getClientOriginalExtension();
                $TtaGetAnh->move(public_path('images'), $SaveAs);
                $ttasanpham->ttaHinhAnh = $SaveAs; // Lưu tên file ảnh mới
            }
        
            // Nếu không tải lên hình mới và chưa có hình, để trống
            if (!$ttasanpham->ttaHinhAnh) {
                $ttasanpham->ttaHinhAnh = null;
            }
        
            // Cập nhật các thông tin khác
            $ttasanpham->ttaSoLuong = $request->ttaSoLuong;
            $ttasanpham->ttaDonGia = $request->ttaDonGia;
            $ttasanpham->ttaMaloai = $loaiSanPham->id;
            $ttasanpham->ttaTrangThai = $request->ttaTrangThai;
        
            // Lưu thay đổi
            $ttasanpham->save();
        
            return redirect('/ttaAdminsp/tta-san-pham')->with('success', 'Cập nhật sản phẩm thành công!');
        }
    #delete
    public function ttadeletesp($id){
        $ttasanpham = TTa_SanPham_Model::findOrFail($id);
        $ttasanpham->delete();
        return redirect()->route('ttalist.sanpham')->with('message', 'Loại sản phẩm đã được xoá thành công!');
    }
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ người dùng
        $search = $request->input('search', null);
    
        // Truy vấn dữ liệu từ bảng
        $ttasanpham = TTa_SanPham_Model::when($search, function ($query, $search) {
            return $query->where('ttaMaSanPham', 'LIKE', "%$search%")
                         ->orWhere('ttaTenSanPham', 'LIKE', "%$search%");
        })->paginate(3); // Sử dụng paginate thay vì get()
    
        // Trả về view
        return view('TTaAdminsp.ttaSanPham.tta-list', [
            'ttasanpham' => $ttasanpham,
            'search' => $search
        ]);
    }
    
}
