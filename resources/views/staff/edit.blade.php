@extends('layouts.app_admin')

@section('title', 'Chỉnh sửa user đại lý')

@section('content')'
<!-- Breadcrumbs-->
<div class="bg-white border-bottom py-3 mb-3">
    <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
        <nav class="mb-0" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Tổng quan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">Danh sách user đại lý</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa</li>
            </ol>
        </nav>
    </div>
</div>

<section class="container-fluid">
    <h2 class="fs-3 fw-bold mb-3">Chỉnh sửa user đại lý</h2>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('staff.update', $staff->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form required">Họ tên</label>
                    <div class="col-sm-10">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập họ tên..." name="name" value="{{ $staff->name }}" autofocus>

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
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email..." name="email" value="{{ $staff->email }}">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form required">Đại lý</label>
                    <div class="col-sm-10">
                        <select name="agency_id" class="form-control @error('agency_id') is-invalid @enderror">
                            <option value="">--- Chọn đại lý ---</option>
                            @foreach($agencies as $agency)
                                <option value="{{ $agency->id }}" {{ $staff->agency_id === $agency->id  ? "selected" : ''}}>{{ $agency->name }} ({{ $agency->email }})</option>
                            @endforeach
                        </select>

                        @error('agency_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Số điện thoại</label>
                    <div class="col-sm-10">
                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Nhập số điện thoại..." name="phone_number" value="{{ $staff->phone_number }}">

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
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
</section>
@endsection
