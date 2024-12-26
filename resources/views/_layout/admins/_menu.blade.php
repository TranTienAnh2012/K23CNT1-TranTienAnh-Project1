<head>
<style>

  
  *{
    margin: 2px;
    padding: 5px;
  }
  ul {
    margin-top: 0px;  /* Đặt lại margin-top */
  }
  .list-group li{
    margin-bottom: 15px;
    margin: 9px;
    border-radius: 5px; 
  }
  .list-group li a {
    padding: 2px;
    text-decoration: none; 
    color: rgb(6, 7, 7);
    font-weight: bold;
    transition: transform 0.3s ease, background-color 0.3s ease; /* Thêm thời gian chuyển tiếp cho cả transform và background-color */
}
.list-group li:hover {
    background-color: rgb(240, 215, 181);
    transform: scale(1.1); /* Phóng to 1.1 lần khi hover */
}
  a > img{
    width: 200px;
    height: 200px;
    margin-top: 15px;
    margin-bottom: 20px;
    margin-left: 7%;
    border-radius: 20px;
    text-shadow:rgb(87, 84, 84);  
    transition: transform 0.3s ease; /* Sửa lại thời gian transition */
  }
  a > img:hover{
    transform: scale(1.1); /* Phóng to 1.2 lần */
  }
  
</style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<!-- Liên kết đến trang chủ -->
<a href="{{ route('admin-tta.loaisanpham.trangchu') }}" class="img-button" >
  <img src="{{ asset('/images/tải xuống (7).jpg') }}" alt="anh" >
</a>
{{-- class="rounded-corners w-100 mb-3" --}}
<!-- Menu -->
<ul class="list-group">
  <li class="list-group-item"> 
    <a href="{{ route('admin-tta.loaisanpham.trangchu') }}"><i class="fa-solid fa-file"></i> Databoard</a>
  </li>
  
  {{-- <li class="list-group-item " aria-current="true">
    <a href=""> Quản trị nội dung </a>

  </li> --}}
  
  <li class="list-group-item">
    <a href="/ttaAdmins/tta-listqt"> <i class="fa-solid fa-user-secret"></i></i>Admind</a>
  </li>
  
  <!-- Liên kết tới trang quản lý loại sản phẩm -->
  <li class="list-group-item">
    <a href="/ttaAdmins/tta-loai-san-pham"><i class="fa-solid fa-sitemap"></i> Loại Sản Phẩm</a>
  </li>

  <li class="list-group-item">
    <a href="/ttaAdminsp/tta-san-pham"><i class="fa-solid fa-cube"></i> Sản Phẩm</a>
  </li>

  <li class="list-group-item">
    <a href="/TTaAdmin_KH/ttaKhachHang"><i class="fa-solid fa-person"></i>Khách Hàng</a>
  </li>

  <li class="list-group-item">
    <a href="/TTaAdmin_HD/ttaHoaDon"><i class="fa-solid fa-user"></i> Hóa Đơn</a>
  </li>

</ul>
<a href="/">THoát</a>
