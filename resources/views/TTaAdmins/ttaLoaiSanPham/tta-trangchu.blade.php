@extends('_layout.admins.master')

@section('title','Database')
<head>
<style>
    .container{
        display: flex;
    }
    .container_2{
        display: flex;
    }
    
</style>
</head>
@section('content-body')
            <div class="row">
                <h1>Database</h1>
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

        <div class="col-md-3" style="padding-left: 20px" >
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-success">Tổng Số Sản Phẩm</h5>
                    
                @if($ttasanpham)
                    <p class="card-text">Số lượng Sản phẩm: {{ $ttasanpham->count() }}</p>
                @else
                    <p class="card-text">Không có sản phẩm trong hệ thống.</p>
                @endif
                
                </div>
                
                <div class="card-footer">
                    <a href="{{ route('ttalist.sanpham') }}" class="btn btn-success">Quản Lý Sản Phẩm</a>
                </div>
            </div>
        </div>

        <div class="col-md-3" style="padding-left: 20px" >
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-success">Tổng Số Khách Hàng</h5>
                    
                @if($ttakhachhang)
                    <p class="card-text">Số lượng khách hàng: {{ $ttakhachhang->count() }}</p>
                @else
                    <p class="card-text">Không có khách hàng trong hệ thống.</p>
                @endif
                
                </div>
                
                <div class="card-footer">
                    <a href="{{ route('tta.listkhachhang') }}" class="btn btn-success">Quản Lý Khách Hàng</a>
                </div>
            </div>
        </div>
    </div>
        <br>
            <div class="container_2">
                <div  class="col-md-3" style="padding-left: 20px" >
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-success">Tổng Số Hóa Đơn</h5>
                            
                        @if($ttaHoaDon)
                            <p class="card-text">Số lượng Hóa Đơn: {{ $ttaHoaDon->count() }}</p>
                        @else
                            <p class="card-text">Không có Hóa Đơn trong hệ thống.</p>
                        @endif
                        
                        </div>
                        
                        <div class="card-footer">
                            <a href="{{ route('tta.listHD') }}" class="btn btn-success">Quản Lý Hóa Đơn</a>
                        </div>
                    </div>
                </div>
                <div  class="col-md-3" style="padding-left: 20px;"  >
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-success">Tổng Số Chi Tiết Hóa Đơn</h5>
                            
                        @if($ttaCTHoaDon)
                            <p class="card-text">Số lượng Chi Tiết Hóa Đơn: {{ $ttaCTHoaDon->count() }}</p>
                        @else
                            <p class="card-text">Không có Chí Tiết Hóa Đơn trong hệ thống.</p>
                        @endif
                        
                        </div>
                        
                        <div class="card-footer">
                            <a href="{{ route('tta.listHD') }}" class="btn btn-success">Quản Lý Chi Tiết Hóa Đơn</a>
                        </div>
                    </div>
                </div>
            </div>
    
@endsection
