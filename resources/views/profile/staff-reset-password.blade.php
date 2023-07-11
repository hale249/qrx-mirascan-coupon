@extends('layouts.app')

@section('title', 'Đổi mật khẩu user đại lý')

@section('content')'
<section class="container">
    <h2 class="fs-3 fw-bold mb-3">Đổi mới mật khẩu</h2>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('client.change-password') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Họ tên</label>
                    <div class="col-sm-10">
                        <input id="name" type="text" disabled class="form-control" placeholder="Nhập họ tên..." name="name" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Username</label>
                    <div class="col-sm-10">
                        <input id="username" type="text" disabled class="form-control" placeholder="Nhập username..." name="username" value="{{ $user->username }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Email</label>
                    <div class="col-sm-10">
                        <input id="email" type="text" disabled class="form-control" placeholder="Nhập email..." name="email" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form required">Mật khẩu hiện tại</label>
                    <div class="col-sm-10">
                        <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror"
                               placeholder="Nhập mật khẩu..." name="old_password" value="{{ old('old_password') }}" autofocus>

                        @error('old_password')
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
                        <a href="{{ route('home') }}" style="margin-left: 10px">Trở lại</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
