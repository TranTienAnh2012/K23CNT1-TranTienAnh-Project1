@extends('_layout.admins.master')
@section('title','Them moi Loai san Pham')

@section('content-body')
    <div class="container">
        <div class="row ">
           <div class="col">
                <form action="{{route('admin-tta.createsubmit')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Thêm Mới Loại Sản Phẩm </h2>
                        </div>
                    </div>

                    <div class="card-body container-fruid">
                        <div class="mb-3 row">
                            <label for="ttaMaloai  " class="col-sm-2 col-form-label" style="font-weight: bold">Mã Loại:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ttaMaloai" name="ttaMaloai" value="{{old('ttaMaloai')}}">
                                @error('ttaMaloai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                        <div class="mb-3 row">
                            <label for="ttaTenLoai " class="col-sm-2 col-form-label" style="font-weight: bold">Tên Loại:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ttaTenLoai" name="ttaTenLoai" value="{{old('ttaTenLoai')}}">
                                @error('ttaTenLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="ttaTrangThai" class="col-sm-2 col-form-label" style="font-weight: bold">Trạng Thái:</label>
                            <div class="col-sm-10">

                                <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        class="form-check-input" 
                                        id="ttaTrangThai1" 
                                        name="ttaTrangThai" 
                                        value="1" 
                                        checked 
                                    />
                                    <label for="ttaTrangThai1" class="form-check-label">Hiển Thị</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        class="form-check-input" 
                                        id="ttaTrangThai0" 
                                        name="ttaTrangThai" 
                                        value="0" 
                                    />
                                    <label for="ttaTrangThai0" class="form-check-label">Khóa</label>
                                </div>
                            </div>
                            @error('ttaTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button  class="btn btn-success">Ghi Lại </button>
                        <a href="{{route('admin-tta.list')}}" class="btn btn-success">Quạy lại</a>
                    </div>
                </form>
           </div>
        </div>
    </div>
@endsection