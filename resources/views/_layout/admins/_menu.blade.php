<style>
  *{
    margin: 2px;
    padding: 1px;
  }
  ul {
    margin-top: 0px;  /* Đặt lại margin-top */
  }
  ul li{
    margin-bottom: 10px;
    border-radius: 10px; 
  }
  ul li a{
    text-decoration: none; 
    color: rgb(0, 110, 255);
    font-weight: bold;
  }
  ul li:hover{
    background-color: rgb(200, 154, 93);
  }
  img{
    margin-left: -3px;
     border-radius: 20px; 
  }
</style>

<!-- Liên kết đến trang chủ -->
<a href="{{ route('admin-tta.loaisanpham.trangchu') }}" class="img-button" >
  <img src="{{ asset('/images/tải xuống (1).jpg') }}" alt="anh" class="rounded-corners w-100 mb-3">
</a>

<!-- Menu -->
<ul class="list-group">
  <li class="list-group-item"> 
    <a href="{{ route('admin-tta.loaisanpham.trangchu') }}">Databoard</a>
  </li>
  
  {{-- <li class="list-group-item " aria-current="true">
    <a href=""> Quản trị nội dung </a>

  </li> --}}
  
  <li class="list-group-item">
    <a href="/ttaAdmins/tta-listqt">Danh Sách Admind</a>
  </li>
  
  <!-- Liên kết tới trang quản lý loại sản phẩm -->
  <li class="list-group-item">
    <a href="/ttaAdmins/tta-loai-san-pham">Dạnh Sách Loại Sản Phẩm</a>
  </li>
  
  <!-- Các mục khác -->
  <li class="list-group-item"><a href="">Danh Sách Người Dùng</a></li>
  <li class="list-group-item"><a href="">And a fifth one</a></li>
</ul>
