@extends('layouts.app_admin')

@section('title', 'Quản lý đại lý')

@section('content')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Tổng quan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đại lý</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                <a class="btn btn-sm btn-primary" href="{{ route('agency.create') }}"><i
                        class="ri-add-circle-line align-bottom"></i> Thêm mới đại lý</a>
            </div>
        </div>
    </div>

    <section class="container-fluid">
        <h2 class="fs-3 fw-bold mb-3">Danh sách mới đại lý</h2>

        <div class="card">
            <div class="card-body">
                <div class="row mb-3 justify-content-between align-items-center">
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

                    <div class="col-2 d-flex justify-content-end">
                        <form action="{{ route('agency.export') }}" method="GET">
                            <button type="submit" class="btn btn-primary" style="height: 43px">Export</button>
                        </form>
                    </div>
                </div>
                @if(count($agencies)>0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th scope="col">Tên đại lý</th>
                            <th>Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th>Đại chỉ</th>
                            <th>Số lượng NV</th>
                            <th>Số lần xác thực</th>
                            <th style="min-width: 120px; width: 120px">Ngày tạo</th>
                            <th style="min-width: 150px; width: 150px">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agencies as $key=>$agency)
                            <tr>
                                <th scope="row">
                                    {{ $agencies->firstItem() + $loop->index  }}
                                </th>
                                <td>{{ $agency->name }}</td>
                                <td>{{ $agency->email }}</td>
                                <td>{{ $agency->phone_number }}</td>
                                <td>{{ $agency->address }}</td>
                                <td>{{ $agency->staff_count ?? 0 }}</td>
                                <td>{{ $agency->verify_count ?? 0  }}</td>
                                <td>{{ $agency->created_at ? $agency->created_at->format('d-m-Y'): '' }}</td>
                                <td>
                                    <a href="{{route('agency.edit',$agency->id)}}" style="margin-right: 8px">Chỉnh
                                        sửa</a>
                                    <a onclick="return confirm('Chắc chắn bạn muốn xóa đại lý?')"
                                       href="{{route('agency.delete',$agency->id)}}" class="text-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="float:right">{{$agencies->links()}}</div>
                @else
                    <div class="d-flex flex-column w-100 align-items-center">
                        <div class="p-4 p-sm-5 col-lg-7 col-md-10 col-12 text-center px-4">
                            <i class="ri-file-damage-fill ri-5x mb-3"></i>
                            <div class="mb-4">Không tìm thấy đại lý!!! Vui lòng tạo đại lý</div>
                            <a class="btn btn-sm btn-primary mt-4" href="{{ route('agency.create') }}">Tạo mới</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
