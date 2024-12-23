@extends('_layout.admins.master')

@section('title','Hình Ảnh')
<head>
    <style>
        .container{
            display: flex;
        }
    </style>
</head>
@section('content-body')
            <div class="row">
                <h1>Trang Chủ</h1>
            </div>
    <div class="container">
        <div class="col-md-3" style="padding-left: 20px">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-success">Tổng Loại Sản Phẩm</h5>
                    
                    @if($ttaloaisanpham)
                        <p class="card-text">Số lượng loại sản phẩm: {{ $ttaloaisanpham->count() }}</p>
                    @else
                        <p class="card-text">Không có loại sản phẩm nào trong hệ thống.</p>
                    @endif
                </div>
                
                <div class="card-footer">
                    <a href="{{ route('admin-tta.list') }}" class="btn btn-success">Quản Lý Loại Sản Phẩm</a>
                </div>
            </div>
        </div>

        <div class="col-md-3" style="padding-left: 20px" >
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-success">Tổng Số Admin</h5>
                    
                @if($ttaquantri)
                    <p class="card-text">Số lượng admin: {{ $ttaquantri->count() }}</p>
                @else
                    <p class="card-text">Không có admin trong hệ thống.</p>
                @endif
                
                </div>
                
                <div class="card-footer">
                    <a href="{{ route('tta-admins-listQT') }}" class="btn btn-success">Quản Lý Admin</a>
                </div>
            </div>
        </div>
    </div>
@endsection
