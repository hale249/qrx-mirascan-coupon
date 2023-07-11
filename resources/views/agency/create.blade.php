@extends('layouts.app_admin')

@section('title', 'Tạo đại lý')

@section('content')

    <!-- Breadcrumbs-->
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

    <!-- Content-->
    <section class="container-fluid">
        <h2 class="fs-3 fw-bold mb-3">Tạo mới đại lý</h2>

        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('agency.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form required">Tên đại lý</label>
                            <div class="col-sm-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên KH..." name="name" value="{{ old('name') }}" autofocus>

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
                                <input id="code" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email..." name="code" value="{{ old('code') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Nhập số điện thoại..." name="url" value="{{ old('phone_number') }}">

                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Địa chỉ</label>
                            <div class="col-sm-10">
                                <textarea rows="4" cols="50" type="text" name="address" class="form-control" placeholder="Nhập địa chỉ...">{{old('address')}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                                <a href="{{ route('admin.home') }}" style="margin-left: 10px">Trở lại</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
