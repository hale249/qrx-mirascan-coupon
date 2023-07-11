@extends('layouts.app_admin')

@section('title', 'Đổi mật khẩu user đại lý')

@section('content')'
<!-- Breadcrumbs-->
<div class="bg-white border-bottom py-3 mb-3">
    <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
        <nav class="mb-0" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Tổng quan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">Danh sách user đại lý</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
            </ol>
        </nav>
    </div>
</div>

<section class="container-fluid">
    <h2 class="fs-3 fw-bold mb-3">Đổi mới mật khẩu user đại lý</h2>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('staff.change-password', $staff->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form required">Họ tên</label>
                    <div class="col-sm-10">
                        <input id="name" type="text" disabled class="form-control @error('name') is-invalid @enderror" placeholder="Nhập họ tên..." name="name" value="{{ $staff->name }}" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form required">Username</label>
                    <div class="col-sm-10">
                        <input id="username" disabled type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Nhập username..." name="username" value="{{$staff->username}}">

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form required">Email</label>
                    <div class="col-sm-10">
                        <input id="email" type="text" disabled class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email..." name="email" value="{{ $staff->email }}">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form required">Mật khẩu mới</label>
                    <div class="col-sm-10">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="Nhập mật khẩu..." name="password" value="{{ old('password') }}">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form required">Nhập lại mật khẩu mới</label>
                    <div class="col-sm-10">
                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                               placeholder="Nhập mật khẩu..." name="password_confirmation" value="{{ old('password_confirmation') }}">

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-sm btn-primary">Đổi mật khẩu</button>
                        <a href="{{ route('staff.index') }}" style="margin-left: 10px">Trở lại</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
