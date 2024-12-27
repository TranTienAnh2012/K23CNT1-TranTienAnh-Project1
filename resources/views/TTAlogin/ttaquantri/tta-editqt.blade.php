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
        <form action="{{ route('admin.editsubmitQT', ['id' =>$ttaquantri->id]) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin Admin cập nhật</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="ttaTaiKhoan" class="col-sm-2 col-form-label">
                            Tài Khoản
                        </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="ttaTaiKhoan" name="ttaTaiKhoan" value="{{$ttaquantri->ttaTaiKhoan }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaMatKhau" class="col-sm-2 col-form-label">
                            Mật Khẩu
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttaMatKhau" name="ttaMatKhau" value="{{$ttaquantri->ttaMatKhau }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttaTrangThai" class="col-sm-2 col-form-label">
                            Trạng Thái
                        </label>
                        <div class="col-sm-10">
                            <div>
                                <input type="radio" id="ttaTrangThai1" name="ttaTrangThai" value="0" {{$ttaquantri->ttaTrangThai == 0 ? 'checked' : '' }}>
                                <label for="ttaTrangThai1">Không hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="ttaTrangThai2" name="ttaTrangThai" value="1" {{$ttaquantri->ttaTrangThai == 1 ? 'checked' : '' }}>
                                <label for="ttaTrangThai2">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary mx-2">Cập nhật</button>
                    <a href="/ttaAdmins/tta-listqt" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>

