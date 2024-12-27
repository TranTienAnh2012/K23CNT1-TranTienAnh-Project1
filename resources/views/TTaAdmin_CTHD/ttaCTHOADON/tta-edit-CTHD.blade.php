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
        <form action="{{ route('tta.editsubmitCTHD', ['id' => $ttaCTHoaDon->id]) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin hóa đơn</h3>
                </div>
                <div class="card-body">
                    <!-- Mã khách hàng -->
                    <div class="mb-3 row">
                        <label for="ttaHoaDonID" class="col-sm-2 col-form-label">ID Hoá Đơn</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="ttaHoaDonID" name="ttaHoaDonID">
                                @foreach ($ttaIDHoaDon as $HoaDon)
                                    <option value="{{ $HoaDon->id }}" {{ $ttaCTHoaDon->ttaHoaDonID == $HoaDon->id ? 'selected' : '' }}>
                                        {{ $HoaDon->id }} - {{ $HoaDon->ttaHotenKhachHang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                <div class="card-body">
                    <!-- Mã khách hàng -->
                    <div class="mb-3 row">
                        <label for="ttaSanPhamID" class="col-sm-2 col-form-label">ID Sản Phẩm</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="ttaSanPhamID" name="ttaSanPhamID">
                                @foreach ($ttaIDSanPham as $SanPham)
                                    <option value="{{ $SanPham->id }}" {{ $ttaCTHoaDon->ttaSanPhamID == $SanPham->id ? 'selected' : '' }}>
                                        {{ $SanPham->id }} - {{ $SanPham->ttaTenSanPham}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Số Lượng Mua -->
                    <div class="mb-3 row">
                        <label for="ttaSoLuongMua" class="col-sm-2 col-form-label">Số Lượng Mua</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="ttaSoLuongMua" name="ttaSoLuongMua" value="{{ $ttaCTHoaDon->ttaSoLuongMua }}">
                        </div>
                    </div>
                    <!-- Đơn Giá Mua -->
                    <div class="mb-3 row">
                        <label for="ttaDonGiaMua" class="col-sm-2 col-form-label">Đơn Giá Mua</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="ttaDonGiaMua" name="ttaDonGiaMua" value="{{ $ttaCTHoaDon->ttaDonGiaMua }}">
                        </div>
                    </div>
                    <!-- Thành Tiền -->
                    <div class="mb-3 row">
                        <label for="ttaThanhTien" class="col-sm-2 col-form-label">Thành Tiền</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="ttaThanhTien" name="ttaThanhTien" value="{{ $ttaCTHoaDon->ttaThanhTien }}">
                        </div>
                    </div>
                    <!-- Trạng thái -->
                    <div class="mb-3 row">
                        <label for="ttattaTrangThai" class="col-sm-2 col-form-label">Trạng Thái</label>
                        <div class="col-sm-10">
                            <div>
                                <input type="radio" id="ttattaTrangThai1" name="ttattaTrangThai" value="0" {{ $ttaCTHoaDon->ttattaTrangThai == 0 ? 'checked' : '' }}>
                                <label for="ttattaTrangThai1">Không hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="ttattaTrangThai2" name="ttattaTrangThai" value="1" {{ $ttaCTHoaDon->ttattaTrangThai == 1 ? 'checked' : '' }}>
                                <label for="ttattaTrangThai2">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('tta.listCTHD') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>
