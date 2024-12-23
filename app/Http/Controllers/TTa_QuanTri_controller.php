<?php

namespace App\Http\Controllers;
use App\Models\TTa_QuanTri; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TTa_QuanTri_controller extends Controller
{
    public function ttaLogin(){
        return view('TTAlogin.tta-login');
    }
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
        // Đăng nhập thành công, chuyển hướng
        return redirect('/home');
    }
    public function ttalogout()
    {
        $messages_count = 3; // Số tin nhắn
        $notifications_count = 15; // Số thông báo
        return view('TTAlogin.ttahome-logout', [
            'messages_count' => $messages_count,
            'notifications_count' => $notifications_count
        ]);
    }
    public function ttalistQT()
    {   
        $ttaquantri = TTa_QuanTri::all();
        return view('TTAlogin.tta-listQT',['ttaquantri' => $ttaquantri]);
    }
       //them mowi
       public function ttacreatQT(){
        return view('TTAlogin.ttaquantri.tta-createqt');
    }
    public function ttacreatQTsubmit(Request $request){
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
    

}
