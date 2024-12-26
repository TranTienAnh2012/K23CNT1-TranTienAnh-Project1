<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Sửa Sản Phẩm</title>
</head>
<body>
    <section class="container">
        <form action="{{ route('tta.editsanphamsubmit', ['ttaID' => $ttasanpham->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin sản phẩm cập nhật</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="ttaMaSanPham" class="col-sm-2 col-form-label">
                            Mã Sản Phẩm:
                        </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="ttaMaSanPham" name="ttaMaSanPham" value="{{ $ttasanpham->ttaMaSanPham }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaTenSanPham" class="col-sm-2 col-form-label">
                            Tên Sản Phẩm:
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttaTenSanPham" name="ttaTenSanPham" value="{{ $ttasanpham->ttaTenSanPham }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaHinhAnh" class="col-sm-2 col-form-label">
                            Hình Ảnh:
                        </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="ttaHinhAnh" name="ttaHinhAnh">
                            @if ($ttasanpham->ttaHinhAnh)
                                <p>Hình ảnh hiện tại:</p>
                                <img src="{{ asset('images/' . $ttasanpham->ttaHinhAnh) }}" alt="Ảnh hiện tại" width="100">
                            @else
                                <p>Chưa có hình ảnh. Bạn có thể tải lên ảnh mới.</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="ttaSoLuong" class="col-sm-2 col-form-label">
                            Số Lượng:
                        </label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="ttaSoLuong" name="ttaSoLuong" value="{{ $ttasanpham->ttaSoLuong }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaDonGia" class="col-sm-2 col-form-label">
                            Đơn Giá:
                        </label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="ttaDonGia" name="ttaDonGia" value="{{ $ttasanpham->ttaDonGia }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaMaloai" class="col-sm-2 col-form-label">Mã Loại:</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="ttaMaloai" name="ttaMaloai">
                                @foreach ($ttaloaisanpham as $loai)
                                    <option value="{{ $loai->ttaMaloai }}" {{ $loai->ttaMaloai == $ttasanpham->ttaMaloai ? 'selected' : '' }}>
                                        {{ $loai->ttaTenLoai }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaTrangThai" class="col-sm-2 col-form-label">
                            Trạng Thái:
                        </label>
                        <div class="col-sm-10">
                            <div>
                                <input type="radio" id="ttaTrangThai1" name="ttaTrangThai" value="0" {{ $ttasanpham->ttaTrangThai == 0 ? 'checked' : '' }}>
                                <label for="ttaTrangThai1">Không hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="ttaTrangThai2" name="ttaTrangThai" value="1" {{ $ttasanpham->ttaTrangThai == 1 ? 'checked' : '' }}>
                                <label for="ttaTrangThai2">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary mx-2">Cập nhật</button>
                    <a href="/ttaAdminsp/tta-san-pham" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>
