@extends('_layout.admins.master')
@section('title','Danh Sach Loai San Pham')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .nut{
            text-align: center;
        }
        .nut a{
            margin-left: 11px;
        }
    </style>
</head>
@section('content-body')
    <div class="container">
        <div class="row ">
            <div class="col-12" >
                <h1>Danh Sách Loại Sản Phẩm</h1> 
                <a href="{{route('admin-tta.createsubmit')}}" class="btn btn-success" style="margin-left: 77%;">Thêm Mới Loại Sản Phẩm </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead> 
                    <tr>
                        <th>#</th>
                        <th>Mã Loại</th>
                        <th>Tên Loại</th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ttaloaisanpham as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->ttaMaloai }}</td>
                            <td>{{ $item->ttaTenLoai }}</td>
                            <td>{{ $item->ttaTrangThai }}</td>
                            <td class="nut"> 
                                <a href="{{ route('admin-tta.chitiet', ['id' => $item->id]) }}" class="btn btn-primary" style="font-weight: bold">Chi Tiết <i class="fa-solid fa-circle-info"></i></a>
                                <a href="{{ route('admin-tta.edit', ['id' => $item->id]) }}" class="btn btn-warning" style="font-weight: bold">Sửa<i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                <a href="{{ route('admin-tta.delete', ['id' => $item->ttaMaloai]) }}" 
                                    class="btn btn-danger" style="font-weight: bold"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa  <i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5" class="text-center">Chưa có thông tin loại sản phẩm</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
             <!-- Liên kết phân trang -->
             <div class="d-flex justify-content-center">
                {{ $ttaloaisanpham->links() }}
            </div>
        </div>
    </div>
@endsection
