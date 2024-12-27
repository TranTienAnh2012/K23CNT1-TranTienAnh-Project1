<?php

namespace App\Http\Controllers;
use App\Models\TTA_loai_san_pham; 
use App\Models\TTa_QuanTri; 
use App\Models\TTa_SanPham_Model;
use App\Models\tta_KhachHang_model;
use App\Models\tta_hoadon_model;
use Illuminate\Http\Request;

class ttaSP extends Controller
{
    //list
    public function ttalist(){
        $ttaloaisanpham = TTA_loai_san_pham::paginate(5);
        return view('TTaAdmins.ttaLoaiSanPham.tta-list',['ttaloaisanpham'=> $ttaloaisanpham]);
    }
    //them mowi
    public function ttacreat(){
        return view('TTaAdmins.ttaLoaiSanPham.tta-create');
    }
    public function ttacreatsubmit(Request $request){
        $request->validate([
            'ttaMaloai' => 'required|unique:tta_loaisanpham,ttaMaloai', // Đảm bảo duy nhất
            'ttaTenLoai' => 'required',
            'ttaTrangThai' => 'required|boolean',
        ]);
        
        $ttaloaisanpham = new TTA_loai_san_pham;
        $ttaloaisanpham->ttaMaloai = $request->ttaMaloai;
        $ttaloaisanpham->ttaTenLoai = $request->ttaTenLoai;
        $ttaloaisanpham->ttaTrangThai = $request->ttaTrangThai;
        
        $ttaloaisanpham->save();
    
        return redirect()->route('admin-tta.list');
    }
        #chi tiết
        public function ttachitiet($id)
        {
            // Tìm bản ghi theo id
            $ttaloaisanpham = TTA_loai_san_pham::find($id);
        
            // Kiểm tra nếu không tìm thấy bản ghi
            if (!$ttaloaisanpham) {
                return redirect('/ttaAdmins/tta-loai-san-pham')->with('error', 'Không tìm thấy thông tin sản phẩm.');
            }
        
            // Trả về view với dữ liệu
            return view('TTaAdmins.ttaLoaiSanPham.tta-chitiet', ['ttaloaisanpham' => $ttaloaisanpham]);
        }
        
        #edit
        public function ttaedit($id){
            $ttaloaisanpham = TTA_loai_san_pham::find($id);
            
            // Kiểm tra xem có tìm thấy dữ liệu không
            if (!$ttaloaisanpham) {
                return redirect('/ttaAdmins/tta-loai-san-pham')->with('error', 'Loại sản phẩm không tồn tại');
            }
            
            return view('TTaAdmins.ttaLoaiSanPham.tta-edit', ['ttaloaisanpham' => $ttaloaisanpham]);
        }


        # edit submit 
        public function ttaeditsubmit(Request $request)
        {
            $ttaMaloai  = $request->ttaMaloai ;
            $ttaloaisanpham = TTA_loai_san_pham::where('ttaMaloai',$ttaMaloai)->first();
            $ttaloaisanpham->ttaMaloai=$request->ttaMaloai;
            $ttaloaisanpham->ttaTenLoai=$request->ttaTenLoai;
            $ttaloaisanpham->ttaTrangThai=$request->ttaTrangThai;
            // ...
            $ttaloaisanpham->save(); // Ghi lại
            return redirect('/ttaAdmins/tta-loai-san-pham');
        }
    #delete
        public function ttadelete($id)
        {
            TTA_loai_san_pham::where('ttaMaloai',$id)->delete();
            return redirect('/ttaAdmins/tta-loai-san-pham');
        }

      
    #Trang chủ tạm thời
    public function ttatrangchu(){
        // Lấy tất cả loại sản phẩm từ bảng
        $ttaloaisanpham = TTA_loai_san_pham::all();
        $ttaquantri = TTa_QuanTri::all();
        $ttasanpham = TTa_SanPham_Model::all();
        $ttakhachhang = tta_KhachHang_model::all();
        $ttaHoaDon = tta_hoadon_model::all();
        
        // Truyền dữ liệu vào view
        return view('TTaAdmins.ttaLoaiSanPham.tta-trangchu',
         [
            'ttaloaisanpham' => $ttaloaisanpham, 
            'ttaquantri'=>$ttaquantri,
            'ttasanpham' => $ttasanpham, 
            'ttakhachhang' => $ttakhachhang,
            'ttaHoaDon' => $ttaHoaDon
         ]);
    }
    # databoard liên kết tới trang chủ 
    public function datataboard(Request $request)
    {
        if ($request->session()->has('admin.id')) {
            // Lấy số lượng loại sản phẩm
            $ttaloaisanpham = TTA_loai_san_pham::count();
            
            // Lấy số lượng admin
            $ttaquantri = TTa_QuanTri::count();
            // Lấy số lượng sản phẩm
            $ttasanpham = TTa_SanPham_Model::count();
            // Lấy số lượng khách hàng 
            $ttakhachhang = tta_KhachHang_model::count();
            // Lấy số lượng Hóa Đơn 
            $ttaHoaDon = tta_hoadon_model::count();
    
            // Ghi log thông tin
            \Log::info("Số lượng loại sản phẩm: " . $ttaloaisanpham);
            \Log::info("Số lượng admin: " . $ttaquantri);
            \Log::info("Số lượng sản phẩm: " . $ttasanpham);
            \Log::info("Số lượng khách hàng: " . $ttakhachhang);
            \Log::info("Số lượng Hóa Đơn: " . $ttaHoaDon);
            // Trả về view với dữ liệu
            return view('TTaAdmins.ttaLoaiSanPham.tta-trangchu', [
                'ttaloaisanpham' => $ttaloaisanpham,
                'ttaquantri' => $ttaquantri,
                'ttasanpham' => $ttasanpham,
                'ttakhachhang' => $ttakhachhang,
                'ttaHoaDon' => $ttaHoaDon,
            ]);
        } else {
            // Nếu không có session admin thì redirect về trang login
            return redirect('/ttaAdmins/tta-loai-san-pham');
        }
    }
    
    
    

    
    
    
}
