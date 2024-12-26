<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Sửa Khách Hàng</title>
</head>
<body>
    <section class="container">
        <form action="{{ route('tta.editKHsubmit', ['id' => $khachHang->id]) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin khách hàng</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="ttaMakhachhang" class="col-sm-2 col-form-label">Mã Khách Hàng</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="ttaMakhachhang" name="ttaMakhachhang" value="{{ $khachHang->ttaMakhachhang }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaHotenkhachhang" class="col-sm-2 col-form-label">Họ Tên Khách Hàng</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttaHotenkhachhang" name="ttaHotenkhachhang" value="{{ $khachHang->ttaHotenkhachhang }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="ttaEmail" name="ttaEmail" value="{{ $khachHang->ttaEmail }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaDienThoai" class="col-sm-2 col-form-label">Điện Thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttaDienThoai" name="ttaDienThoai" value="{{ $khachHang->ttaDienThoai }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaDiaChi" class="col-sm-2 col-form-label">Địa Chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttaDiaChi" name="ttaDiaChi" value="{{ $khachHang->ttaDiaChi }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaNgayDK" class="col-sm-2 col-form-label">Ngày Đăng Ký</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="ttaNgayDK" name="ttaNgayDK" value="{{ $khachHang->ttaNgayDK }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaTrangThai" class="col-sm-2 col-form-label">Trạng Thái</label>
                        <div class="col-sm-10">
                            <div>
                                <input type="radio" id="ttaTrangThai1" name="ttaTrangThai" value="0" {{ $khachHang->ttaTrangThai == 0 ? 'checked' : '' }}>
                                <label for="ttaTrangThai1">Không hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="ttaTrangThai2" name="ttaTrangThai" value="1" {{ $khachHang->ttaTrangThai == 1 ? 'checked' : '' }}>
                                <label for="ttaTrangThai2">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary mx-2">Cập nhật</button>
                    <a href="{{ route('tta.listkhachhang') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>
