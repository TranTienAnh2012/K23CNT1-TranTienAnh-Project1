@extends('_layout.admins.master')
@section('title','Danh Sach San Pham')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
@section('content-body')
    <div class="container">
        <div class="row ">
            <div class="col-12" >
                <h1>Danh Sách Sản Phẩm</h1> 
                <a href="{{route('tta.createsp')}}" class="btn btn-success" style="margin-left: 85%;">Thêm Mới Sản Phẩm </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead> 
                    <tr>
                        <th>#</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th> 
                        <th>Hình Anh</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Mã Loại</th> 
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ttasanpham as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->ttaMaSanPham }}</td>
                            <td>{{ $item->ttaTenSanPham }}</td>
                            <td>
                                @if($item->ttaHinhAnh)
                                    <img src="{{ asset('images/' . $item->ttaHinhAnh) }}" alt="Hình ảnh" style="width: 100px; height: auto;">
                                @else
                                    Không có hình ảnh
                                @endif
                            </td>
                            <td>{{ $item->ttaSoLuong }}</td>
                            <td>{{ number_format($item->ttaDonGia, 0, ',', '.') }} VND</td>
                            <td>{{ $item->ttaMaloai }}</td>
                            <td>{{ $item->ttaTrangThai == 1 ? 'Hiển thị' : 'Khóa' }}</td>
                            <td>
                                <!-- Thay đổi 'ttaID' thành 'id' -->
                                <a href="{{ route('tta.chitietsp', ['ttaID' => $item->id]) }}" class="btn btn-primary" style="font-weight: bold">
                                    Chi Tiết <i class="fa-solid fa-circle-info"></i>
                                </a>
                                <a href="{{ route('tta.editsanphamsubmit', ['ttaID' => $item->id]) }}" class="btn btn-warning"  style="font-weight: bold">Sửa <i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                <a href="{{ route('admin-tta.deletesp', ['id' => $item->id]) }}"
                                   class="btn btn-danger"
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"  style="font-weight: bold">
                                   Xóa <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="9" class="text-center">Chưa có thông tin sản phẩm</th>
                        </tr>
                    @endforelse
                </tbody>
                
            </table>
                   <!-- Liên kết phân trang -->
                <div class="d-flex justify-content-center">
                    {{ $ttasanpham->links() }}
                </div>
        
        </div>
    </div>
@endsection