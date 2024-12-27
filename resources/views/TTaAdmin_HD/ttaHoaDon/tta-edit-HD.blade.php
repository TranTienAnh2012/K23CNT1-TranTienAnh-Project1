<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Sửa Hóa Đơn</title>
</head>
<body>
    <section class="container mt-5">
        <form action="{{ route('tta.editHDsubmit', ['id' => $ttaHoaDon->id]) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin hóa đơn</h3>
                </div>
                <div class="card-body">
                    <!-- Mã hóa đơn -->
                    <div class="mb-3 row">
                        <label for="ttaMaHoaDon" class="col-sm-2 col-form-label">Mã Hóa Đơn</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttaMaHoaDon" name="ttaMaHoaDon" value="{{ $ttaHoaDon->ttaMaHoaDon }}" readonly>
                        </div>
                    </div>
                    <!-- Mã khách hàng -->
                    <div class="mb-3 row">
                        <label for="ttaMakhachhang" class="col-sm-2 col-form-label">Mã KH</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="ttaMakhachhang" name="ttaMakhachhang">
                                @foreach ($ttaloaikhachhang as $khachHang)
                                    <option value="{{ $khachHang->id }}" {{ $ttaHoaDon->ttaMakhachhang == $khachHang->id ? 'selected' : '' }}>
                                        {{ $khachHang->id }} - {{ $khachHang->ttaHotenKhachHang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Họ tên khách hàng -->
                    <div class="mb-3 row">
                        <label for="ttaHotenKhachHang" class="col-sm-2 col-form-label">Họ Tên Khách Hàng</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttaHotenKhachHang" name="ttaHotenKhachHang" value="{{ $ttaHoaDon->ttaHotenKhachHang }}">
                        </div>
                    </div>
                    <!-- Ngày hóa đơn -->
                    <div class="mb-3 row">
                        <label for="ttaNgayHoaDon" class="col-sm-2 col-form-label">Ngày Hóa Đơn</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="ttaNgayHoaDon" name="ttaNgayHoaDon" value="{{ $ttaHoaDon->ttaNgayHoaDon }}">
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="mb-3 row">
                        <label for="ttaEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="ttaEmail" name="ttaEmail" value="{{ $ttaHoaDon->ttaEmail }}">
                        </div>
                    </div>
                    <!-- Điện thoại -->
                    <div class="mb-3 row">
                        <label for="ttaDienThoai" class="col-sm-2 col-form-label">Điện Thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttaDienThoai" name="ttaDienThoai" value="{{ $ttaHoaDon->ttaDienThoai }}">
                        </div>
                    </div>
                    <!-- Địa chỉ -->
                    <div class="mb-3 row">
                        <label for="ttaDiaChi" class="col-sm-2 col-form-label">Địa Chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttaDiaChi" name="ttaDiaChi" value="{{ $ttaHoaDon->ttaDiaChi }}">
                        </div>
                    </div>
                    <!-- Tổng giá trị -->
                    <div class="mb-3 row">
                        <label for="ttaTongGiaTri" class="col-sm-2 col-form-label">Tổng Giá Trị</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="ttaTongGiaTri" name="ttaTongGiaTri" value="{{ $ttaHoaDon->ttaTongGiaTri }}" step="0.01" min="0">
                        </div>
                    </div>
                    <!-- Trạng thái -->
                    <div class="mb-3 row">
                        <label for="ttaTrangThai" class="col-sm-2 col-form-label">Trạng Thái</label>
                        <div class="col-sm-10">
                            <div>
                                <input type="radio" id="ttaTrangThai1" name="ttaTrangThai" value="0" {{ $ttaHoaDon->ttaTrangThai == 0 ? 'checked' : '' }}>
                                <label for="ttaTrangThai1">Không hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="ttaTrangThai2" name="ttaTrangThai" value="1" {{ $ttaHoaDon->ttaTrangThai == 1 ? 'checked' : '' }}>
                                <label for="ttaTrangThai2">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('tta.listHD') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>
