@extends('_layout.admins.master')
@section('title','Thêm Mới Hóa Đơn')

@section('content')
<div class="container">
    <h2 class="my-4">Thêm Mới Hóa Đơn</h2>

    <form action="{{ route('tta.createsubmitHD') }}" method="POST">
        @csrf
        <div>
            <label for="ttaMaHoaDon">Mã hóa đơn:</label>
            <input type="text" name="ttaMaHoaDon" id="ttaMaHoaDon"  class="form-control" required>
            @error('ttaMaHoaDon')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <div>
            <label for="ttaMakhachhang">Mã khách hàng:</label>
            <select name="ttaMakhachhang" id="ttaMakhachhang"  class="form-control" required>
                @foreach($ttakhachhang as $khachhang)
                    <option value="{{ $khachhang->id }}">{{ $khachhang->ttaHotenkhachhang }}</option>
                @endforeach
            </select>
            @error('ttaMakhachhang')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Ngày Hóa Đơn -->
        <div class="form-group mb-1">
            <label for="ttaNgayHoaDon">Ngày Hóa Đơn</label>
            <input type="date" name="ttaNgayHoaDon" id="ttaNgayHoaDon" class="form-control" value="{{ old('ttaNgayHoaDon') }}" required>
            @error('ttaNgayHoaDon')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Họ Tên Khách Hàng -->
        <div class="form-group mb-1">
            <label for="ttaHotenKhachHang">Họ Tên Khách Hàng</label>
            <input type="text" name="ttaHotenKhachHang" id="ttaHotenKhachHang" class="form-control" value="{{ old('ttaHotenKhachHang') }}" required>
            @error('ttaHotenKhachHang')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group mb-1">
            <label for="ttaEmail">Email</label>
            <input type="email" name="ttaEmail" id="ttaEmail" class="form-control" value="{{ old('ttaEmail') }}">
            @error('ttaEmail')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Điện Thoại -->
        <div class="form-group mb-1">
            <label for="ttaDienThoai">Điện Thoại</label>
            <input type="text" name="ttaDienThoai" id="ttaDienThoai" class="form-control" value="{{ old('ttaDienThoai') }}">
            @error('ttaDienThoai')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Địa Chỉ -->
        <div class="form-group mb-1">
            <label for="ttaDiaChi">Địa Chỉ</label>
            <input type="text" name="ttaDiaChi" id="ttaDiaChi" class="form-control" value="{{ old('ttaDiaChi') }}">
            @error('ttaDiaChi')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tổng Giá Trị -->
        <div class="form-group mb-1">
            <label for="ttaTongGiaTri">Tổng Giá Trị</label>
            <input type="number" name="ttaTongGiaTri" id="ttaTongGiaTri" class="form-control" value="{{ old('ttaTongGiaTri') }}" step="0.01" required>
            @error('ttaTongGiaTri')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <!-- Trạng Thái -->
        <div class="form-group mb-1">
            <label>Trạng Thái</label>
            <div>
                <input type="radio" id="active" name="ttaTrangThai" value="1" {{ old('ttaTrangThai') == '1' ? 'checked' : '' }} checked>
                <label for="active">Hiển Thị</label>

                <input type="radio" id="inactive" name="ttaTrangThai" value="0" {{ old('ttaTrangThai') == '0' ? 'checked' : '' }}>
                <label for="inactive">Khóa</label>
            </div>
            @error('ttaTrangThai')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Thêm Mới</button>
        <a href="{{ route('tta.listHD') }}" class="btn btn-secondary">Quay Lại</a> 
    </form>
</div>
@endsection
