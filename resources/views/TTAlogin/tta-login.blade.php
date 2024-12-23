<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <section class="container">
        <div class="row">
            <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
                <form action="{{route('admin-tta.loginsubmit')}}" method="post" class="bg-white p-5 rounded shadow-sm"  style="width: 1000px;" >
                    @csrf
                    <h1 class="text-center"> Login Admin</h1>

                    <!-- Tên tài khoản -->
                    <div class="form-group mb-3">
                        <label for="ttaTaiKhoan">tài khoản</label>
                        <input type="text" name="ttaTaiKhoan" id="ttaTaiKhoan" placeholder="Nhập tên tài khoản" class="form-control">
                        @error('ttaTaiKhoan')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <!-- Mật khẩu -->
                    <div class="form-group mb-3">
                        <label for="ttaMatKhau">Mật khẩu</label>
                        <input type="password" name="ttaMatKhau" id="ttaMatKhau" placeholder="Nhập mật khẩu" class="form-control">
                        @error('ttaMatKhau')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    <!-- Nút gửi -->
                    <button type="submit" class="btn btn-primary mt-3" style="width: 100%;">Đăng nhập</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
