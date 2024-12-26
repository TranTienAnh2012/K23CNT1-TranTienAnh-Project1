<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="container my-3">
        <div class="card">
            <div class="card-header">
                <h3>Thông tin chi tiết sản phẩm</h3>
            </div>
            <div class="card-body">
                @if ($ttasanpham)
                    <p class="card-text">
                        <b>Mã Sản Phẩm:</b> {{ $ttasanpham->ttaMaSanPham }}
                    </p>
                    <p>
                        <b>Tên Sản Phẩm:</b> {{ $ttasanpham->ttaTenSanPham }}
                    </p>
                    <p>
                        <b style="margin-right:49px ">Hình Ảnh:</b> 
                        @if($ttasanpham->ttaHinhAnh)
                            <img src="{{ asset('images/' . $ttasanpham->ttaHinhAnh) }}" alt="Hình Ảnh" class="img-fluid" style="max-width: 200px;">
                        @else
                            Không có hình ảnh
                        @endif
                    </p>
                    <p>
                        <b>Số Lượng:</b> {{ $ttasanpham->ttaSoLuong }}
                    </p>
                    <p>
                        <b>Đơn Giá:</b> {{ number_format($ttasanpham->ttaDonGia, 0, ',', '.') }} VND
                    </p>
                    <p>
                        <b>Mã Loại:</b> {{ $ttasanpham->ttaMaloai }}
                    </p>
                    <p>
                        <b>Trạng Thái:</b> {{ $ttasanpham->ttaTrangThai == 1 ? 'Hiển thị' : 'Khóa' }}
                    </p>
                @else
                    <p>Không tìm thấy thông tin sản phẩm.</p>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ url('/ttaAdminsp/tta-san-pham') }}" class="btn btn-primary">Quay lại</a>
            </div>
        </div>
    </section>
</body>
</html>
