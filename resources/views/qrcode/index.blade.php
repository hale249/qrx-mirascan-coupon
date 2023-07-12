@extends('layouts.app_admin')

@section('title', 'QR Coupon')

@section('content')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Tổng quan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">QR Coupon</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="container-fluid">
        <h2 class="fs-3 fw-bold mb-3">Danh sách mã QRCode Coupon</h2>

        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <form action="" method="GET" class="form-inline w-100  mt-2 d-flex flex-wrap gap-2">
                            <div>
                                <input type="text" name="search_text" value="{{ request()->get('search_text') }}"
                                       class="form-control" style="min-width: 300px;" placeholder="Tìm kiếm...">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary h-100">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($qrcodes)>0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên</th>
                                <th>Số lượt scan</th>
                                <th style="min-width: 120px; width: 120px">Ngày tạo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($qrcodes as $key=>$qrcode)
                                <tr>
                                    <th scope="row">
                                        {{ $qrcodes->firstItem() + $loop->index  }}
                                    </th>
                                    <td>
                                        <img src="{{$qrcode->qrcode_url}}" alt="{{ $qrcode->name }}" width="120" height="120">
                                    </td>
                                    <td><a href="{{ $qrcode->short_url }}" target="_blank">{{ $qrcode->name }}</a> </td>
                                    <td>{{ $qrcode->scan_count ?? 0 }}</td>
                                    <td>{{ $qrcode->created_at ? $qrcode->created_at->format('d-m-Y'): '' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="float:right">{{$qrcodes->links()}}</div>
                @else
                    <div class="d-flex flex-column w-100 align-items-center">
                        <div class="p-4 p-sm-5 col-lg-7 col-md-10 col-12 text-center px-4">
                            <i class="ri-file-damage-fill ri-5x mb-3"></i>
                            <div class="mb-4">Không tìm thấy QR Coupon</div>
                            <a class="btn btn-sm btn-primary mt-4" href="https://app.qrcode-solution.com" target="_blank">Tạo mã</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
