<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href= "https://s3.zerochan.net/240/27/20/4368527.avif" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
   html, body, .container-fluid {
    height: 100%; /* Đảm bảo chiều cao container chính */
    margin: 0;
    padding: 0;
}

.container-fluid {
    display: flex; /* Dùng flex để liên kết .sideBar và .Wrapper */
    overflow-x: auto; /* Thêm thanh cuộn ngang nếu nội dung quá dài */
}

.sideBar {
    width: 265px; /* Cố định chiều rộng */
    background: rgb(113, 112, 141);
    flex-shrink: 0; /* Không co lại nếu nội dung lớn */
}

.Wrapper {
    flex-grow: 1; /* Chiếm toàn bộ không gian còn lại */
    background: #fff;
    display: flex;
    flex-direction: column; /* Bố cục dọc */
    overflow: auto; /* Thanh cuộn khi nội dung dài */
    overflow-x: auto; /* Thêm thanh cuộn ngang nếu nội dung quá dài */
}


    </style>
   
   
          
</head>
<body style="background:#ccc">
    <section class="container-fluid d-flex p-0"> <!-- bỏ margin (p-0) -->
        <nav class="sideBar">
            @include('_layout.admins._menu')
        </nav>
        <section class="Wrapper">
            <header class="my-1">
              @include ('_layout.admins._headerTitle')
            </header>
            <section class="content-body my-1 p-1">
                @yield('content-body')
            </section>
        </section>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
