@extends('_layout.admins.master')
@section('title','Thêm Mới CT Hóa Đơn')

@section('content')
<div class="container">
    <h2 class="my-4">Thêm Mới CT Hóa Đơn</h2>

    <form action="{{ route('tta.createsubmitCTHD') }}" method="POST">
        @csrf
        <div>
            <label for="ttaHoaDonID">ID Hóa Đơn:</label>
            <select name="ttaHoaDonID" id="ttaHoaDonID"  class="form-control" required>
                @foreach($ttaHoaDon as $HoaDon)
                    <option value="{{ $HoaDon->id }}">{{ $HoaDon->ttaHotenKhachHang }}</option>
                @endforeach
            </select>
            @error('ttaHoaDonID')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="ttaSanPhamID">ID Sản Phẩm:</label>
            <select name="ttaSanPhamID" id="ttaSanPhamID"  class="form-control" required>
                @foreach($ttaSanPham as $SanPham)
                    <option value="{{ $SanPham->id }}">{{ $SanPham->ttaTenSanPham }}</option>
                @endforeach
            </select>
            @error('ttaSanPhamID')
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

        <!--Số Lượng Mua -->
        <div class="form-group mb-1">
            <label for="ttaSoLuongMua">Số Lượng Mua</label>
            <input type="number" name="ttaSoLuongMua" id="ttaSoLuongMua" class="form-control" value="{{ old('ttaSoLuongMua') }}" required>
            @error('ttaSoLuongMua')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Đơn Gia Mua -->
        <div class="form-group mb-1">
            <label for="ttaDonGiaMua">Đơn Giá Mua</label>
            <input type="number" name="ttaDonGiaMua" id="ttaDonGiaMua" class="form-control" value="{{ old('ttaDonGiaMua') }}">
            @error('ttaDonGiaMua')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Thành Tiền-->
        <div class="form-group mb-1">
            <label for="ttaThanhTien"> Thành Tiền</label>
            <input type="text" name="ttaThanhTien" id="ttaThanhTien" class="form-control" value="{{ old('ttaThanhTien') }}">
            @error('ttaThanhTien')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- Trạng Thái -->
        <div class="form-group mb-1">
            <label>Trạng Thái</label>
            <div>
                <input type="radio" id="active" name="ttattaTrangThai" value="1" {{ old('ttattaTrangThai') == '1' ? 'checked' : '' }} checked>
                <label for="active">Hiển Thị</label>

                <input type="radio" id="inactive" name="ttattaTrangThai" value="0" {{ old('ttattaTrangThai') == '0' ? 'checked' : '' }}>
                <label for="inactive">Khóa</label>
            </div>
            @error('ttattaTrangThai')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Thêm Mới</button>
        <a href="{{ route('tta.listCTHD') }}" class="btn btn-secondary">Quay Lại</a> 
    </form>
</div>
@endsection

