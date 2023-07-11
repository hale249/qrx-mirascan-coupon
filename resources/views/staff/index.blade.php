@extends('layouts.app_admin')

@section('title', 'Quản lý user đại lý')

@section('content')

    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Tổng quan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách user đại lý</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="container-fluid">
        <h2 class="fs-3 fw-bold mb-3">Danh sách user đại lý</h2>

        <div class="card">
            <div class="card-header flex p-2"
                 style="display: flex; justify-content: space-between; align-items: center">
                <div>
                    <h4>Danh sách user đại lý</h4>
                </div>
                <div>
                    <a href="{{ route('staff.create') }}" class="btn btn-primary btn-sm float-end">Thêm mới</a>
                </div>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <form action="" method="GET" class="form-inline w-100  mt-2 d-flex flex-wrap gap-2">
                            <div class="form-group">
                                <input type="text" name="search_text" value="{{ request()->get('search_text') }}"
                                       class="form-control" style="min-width: 250px" placeholder="Tìm kiếm...">
                            </div>
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
                @if(count($staffs)>0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th scope="col">Họ tên</th>
                                <th style="min-width: 150px; width: 150px">Email</th>
                                <th scope="col">Phone number</th>
                                <th style="min-width: 200px; width: 200px">Đại lý</th>
                                <th style="min-width: 120px; width: 120px">Ngày tạo</th>
                                <th style="min-width: 150px; width: 150px">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($staffs as $key=>$staff)
                                <tr>
                                    <th scope="row">
                                        {{ $staffs->firstItem() + $loop->index  }}
                                    </th>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->email }}</td>
                                    <td>{{ $staff->phone_number }}</td>
                                    <td>{{ $staff->agency->name ?? ''  }}</td>
                                    <td>{{ $qrcode->created_at ? $qrcode->created_at->format('d-m-Y'): '' }}</td>
                                    <td>
                                        <a href="{{route('staff.edit',$staff->id)}}" style="margin-right: 8px">Chỉnh
                                            sửa</a>
                                        <a onclick="return confirm('Chắc chắn bạn muốn xóa qrcode?')"
                                           href="{{route('staff.delete',$staff->id)}}" class="text-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="float:right">{{$staffs->links()}}</div>
                @else
                    <div class="d-flex flex-column w-100 align-items-center">
                        <div class="p-4 p-sm-5 col-lg-7 col-md-10 col-12 text-center px-4">
                            <i class="ri-file-damage-fill ri-5x mb-3"></i>
                            <h3 class="mb-4 display-5 fw-bold">Không tìm thấy user đại lý!!! Vui lòng tạo user đại
                                lý</h3>
                            <a class="btn btn-primary mt-4" href="{{ route('staff.create') }}">Tạo mới</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
