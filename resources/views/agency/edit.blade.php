@extends('layouts.app_admin')

@section('title', 'Chỉnh sửa đại lý')

@section('content')
    <div class="bg-white border-bottom py-3 mb-3">
        <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Tổng quan</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('agency.index') }}">Đại lý</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tạo đại lý</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="container-fluid">
        <h2 class="fs-3 fw-bold mb-3">Chỉnh sửa mới đại lý</h2>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header flex justify-content-between">
                        <div>
                            <span style="font-size: 22px" class="qr-title">Danh sách mã QRCode</span> /  <small>Chỉnh sửa qrcode</small>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('agency.update', $agency->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form required">Tên</label>
                                <div class="col-sm-10">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên KH..." name="name" value="{{ $agency->name }}" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form required">Email</label>
                                <div class="col-sm-10">
                                    <input id="code" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email..." name="email" value="{{$agency->email}}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form required">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input id="url" type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Nhập số điện thoại..." name="phone_number" value="{{ $agency->phone_number }}">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <textarea rows="4" cols="50" type="text" name="address" class="form-control" placeholder="Nhập địa chỉ...">{{ $agency->address }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                                    <a href="{{ route('admin.home') }}" style="margin-left: 10px">Trở lại</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
