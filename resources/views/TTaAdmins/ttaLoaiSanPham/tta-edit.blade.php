<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Sửa Loại Sản Phẩm</title>
</head>
<body>
    <section class="container">
        <form action="{{ route('admin-tta.editsubmit', ['id' => $ttaloaisanpham->id]) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin loại sản phẩm cập nhật</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="ttaMaloai" class="col-sm-2 col-form-label">
                            Mã Loại
                        </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="ttaMaloai" name="ttaMaloai" value="{{ $ttaloaisanpham->ttaMaloai }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaTenLoai" class="col-sm-2 col-form-label">
                            Tên Loại
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttaTenLoai" name="ttaTenLoai" value="{{ $ttaloaisanpham->ttaTenLoai }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaTrangThai" class="col-sm-2 col-form-label">
                            Trạng Thái
                        </label>
                        <div class="col-sm-10">
                            <div>
                                <input type="radio" id="ttaTrangThai1" name="ttaTrangThai" value="0" {{ $ttaloaisanpham->ttaTrangThai == 0 ? 'checked' : '' }}>
                                <label for="ttaTrangThai1">Không hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="ttaTrangThai2" name="ttaTrangThai" value="1" {{ $ttaloaisanpham->ttaTrangThai == 1 ? 'checked' : '' }}>
                                <label for="ttaTrangThai2">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary mx-2">Cập nhật</button>
                    <a href="/ttaAdmins/tta-loai-san-pham" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>
