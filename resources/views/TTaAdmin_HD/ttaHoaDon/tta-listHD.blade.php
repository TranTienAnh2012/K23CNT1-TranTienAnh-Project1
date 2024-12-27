@extends('_layout.admins.master')
@section('title','Danh Sach Khach Hang')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .nut{
            display: flex;
            text-align: center;
        }
        .nut a{
            
            margin-left: 10px;

        }
    .chu th{
        text-align: center;
        /* margin: 30px; */
    }
    .ttd{
        margin: 40px;
        padding: 20px;
    }
    </style>
</head>
@section('content-body')
    <div class="container">
        <div class="row ">
            <div class="col-12" >
                <h1>Danh Sách Hoá Đơn</h1> 
                <a href="{{route('tta.createsubmitHD')}}" class="btn btn-success" style="margin-left: 77%;"><i class="fa-solid fa-arrow-right"></i>Thêm Mới HD </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered" border="1">
                <thead> 
                    <tr class="chu">
                        <th>#</th>
                        <th>Mã Hóa Đơn</th>
                        <th>Mã KH </th>
                        <th>Ngày Hóa Đơn</th>
                        <th>Họ Tên Khách Hàng</th>
                        <th>Email</th>
                        <th>Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Tổng Giá Trị</th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ttaHoaDon as $item)
                        <tr class="ttd">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->ttaMaHoaDon }}</td>
                            <td>{{ $item->ttaMakhachhang }}</td>
                            <td>{{ $item->ttaNgayHoaDon }}</td>
                            <td>{{ $item->ttaHotenKhachHang }}</td>
                            <td>{{ $item->ttaEmail }}</td>
                            <td>{{ $item->ttaDienThoai }}</td>
                            <td>{{ $item->ttaDiaChi }}</td>
                            <td>{{ $item->ttaTongGiaTri }}</td>
                            <td>{{ $item->ttaTrangThai }}</td>
                            <td class="nut">  
                                <a href="{{ route('tta.chitietHD', ['id' => $item->id]) }}" class="btn btn-primary" style="font-weight: bold"><i class="fa-solid fa-circle-info"></i></a>
                                <a href="{{ route('tta.editHDsubmit', ['id' => $item->id]) }}" class="btn btn-warning" style="font-weight: bold"><i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                               <a href="{{ route('tta.deleteHd', ['id' => $item->id]) }}" 
                                    class="btn btn-danger" style="font-weight: bold"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5" class="text-center">Chưa có thông Khách Hàng</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
             <!-- Liên kết phân trang -->
             <div class="d-flex justify-content-center">
                {{ $ttaHoaDon->links() }}
            </div>
        </div>
    </div>
@endsection
