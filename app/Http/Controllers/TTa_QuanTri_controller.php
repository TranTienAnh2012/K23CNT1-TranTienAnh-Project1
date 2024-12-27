<?php

namespace App\Http\Controllers;
use App\Models\TTa_QuanTri; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TTa_QuanTri_controller extends Controller
{
    #login
    public function ttaLogin(){
        return view('TTAlogin.tta-login');
    }
    #login submit
    public function ttaLoginsubmit(Request $request) {
        // Validation form
        $validationData = $request->validate([
            'ttaTaiKhoan' => 'required|string',
            'ttaMatKhau' => 'required|min:6|max:12'
        ]);
        // Lấy giá trị từ form
        $email = $request->input('ttaTaiKhoan');
        $password = $request->input('ttaMatKhau');
        // Kiểm tra tài khoản
        $user = TTa_QuanTri::where('ttaTaiKhoan', $email)->first();
        if (!$user) {
            return back()->withErrors(['ttaTaiKhoan' => 'Tài khoản không tồn tại.']);
        }
        // Kiểm tra mật khẩu (nếu chưa mã hóa)
        if ($user->ttaMatKhau !== $password) {
            return back()->withErrors(['ttaMatKhau' => 'Mật khẩu không đúng.']);
        }
        // Lưu thông tin tài khoản vào session
            session(['ttaTaiKhoan' => $user->ttaTaiKhoan]);
        // Đăng nhập thành công, chuyển hướng
        return redirect('/home');
    }
    #logout
    public function ttalogout()
    {
        $messages_count = 3; // Số tin nhắn
        $notifications_count = 15; // Số thông báo
        return view('TTAlogin.ttahome-logout', [
            'messages_count' => $messages_count,
            'notifications_count' => $notifications_count
        ]);
    }
    # list
    public function ttalistQT()
    {   
        $ttaquantri = TTa_QuanTri::all();
        return view('TTAlogin.tta-listQT',['ttaquantri' => $ttaquantri]);
    }
       //them mowi
       public function ttacreatQT(){
        return view('TTAlogin.ttaquantri.tta-createqt');
    }
    #them mơi submit
    public function ttacreatQTsubmit(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:tta_quantri,id', // Đảm bảo duy nhất
            'ttaTaiKhoan' => 'required|unique:tta_quantri,ttaTaiKhoan', // Đảm bảo duy nhất
            'ttaMatKhau' => 'required',
            'ttaTrangThai' => 'required|boolean',
        ]);
        
        $ttaquantri = new TTa_QuanTri;
        $ttaquantri->id = $request->id;
        $ttaquantri->ttaTaiKhoan = $request->ttaTaiKhoan;
        $ttaquantri->ttaMatKhau = $request->ttaMatKhau;
        $ttaquantri->ttaTrangThai = $request->ttaTrangThai;
        
        $ttaquantri->save();
    
        return redirect()->route('tta-admins-listQT');
    }
    # chi tiết
    public function ttachitietqt($id)
    {
        // Tìm bản ghi theo id
        $ttaquantri = TTa_QuanTri::find($id);
    
        // Kiểm tra nếu không tìm thấy bản ghi
        if (!$ttaquantri) {
            return redirect('tta-admins-listQT')->with('error', 'Không tìm thấy thông tin sản phẩm.');
        }
    
        // Trả về view với dữ liệu
        return view('TTAlogin.ttaquantri.tta-chitietqt', ['ttaquantri' => $ttaquantri]);
    }
    public function ttaeditqt($id)
    {
        // Tìm bản ghi theo id
        $ttaquantri = TTa_QuanTri::find($id);
    
        // Kiểm tra nếu không tìm thấy bản ghi
        if (!$ttaquantri) {
            return redirect('tta-admins-listQT')->with('error', 'Không tìm thấy thông tin sản phẩm.');
        }
    
        // Trả về view với dữ liệu
        return view('TTAlogin.ttaquantri.tta-editqt', ['ttaquantri' => $ttaquantri]);
    }
    public function ttaeditsubmit(Request $request, $id)
    {
        // Tìm bản ghi cần sửa
        $ttaquantri = TTa_QuanTri::find($id);
    
        // Kiểm tra nếu không tìm thấy
        if (!$ttaquantri) {
            return redirect()->route('tta-admins-listQT')->with('error', 'Không tìm thấy thông tin quản trị.');
        }
    
        // Xác thực dữ liệu
        $request->validate([
            'ttaTaiKhoan' => 'required|unique:tta_quantri,ttaTaiKhoan,' . $id, // Bỏ qua bản ghi hiện tại
            'ttaMatKhau' => 'required',
            'ttaTrangThai' => 'required|boolean',
        ]);
    
        // Cập nhật dữ liệu
        $ttaquantri->ttaTaiKhoan = $request->ttaTaiKhoan;
        $ttaquantri->ttaMatKhau = $request->ttaMatKhau;
        $ttaquantri->ttaTrangThai = $request->ttaTrangThai;
    
        // Lưu vào cơ sở dữ liệu
        $ttaquantri->save();
    
        return redirect()->route('tta-admins-listQT')->with('success', 'Cập nhật thông tin quản trị thành công!');
    }
    public function ttaQTdelete($id){
        $ttaquantri = TTa_QuanTri::findOrFail($id);
        $ttaquantri->delete();
        return redirect()->route('tta-admins-listQT')->with('message', 'Loại sản phẩm đã được xoá thành công!');
    }  
    
}
