<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light justify-content-between px-3">
        <span><i class="fa-solid fa-bars"></i> <input type="text"  placeholder="  Search" style="border-radius: 10px" style="border-color: brown"></span>
        
        <div>
            <div href="#" class="ttachaomung" style="font-weight: bold">
                Chào mừng:<span style="color: red">
                    {{ session('ttaTaiKhoan') ?? 'Admind' }}
                </span>
            </div>     
            <a href="{{route('home')}}" class="btn btn-success" style="font-weight: bold" >Home</a>
            <a href="{{route('admin-tta.loginsubmit')}}" class="btn btn-danger" style="font-weight: bold">Đăng xuất</a>
            <span class="badge bg-info me-2" ><i class="fa-solid fa-comments" style="font-weight: bold"></i>3</span>
            <span class="badge bg-warning text-dark"><i class="fa-solid fa-bell"></i>15</span>
       
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

