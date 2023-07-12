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
            <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                <a class="btn btn-sm btn-primary" href="{{ route('staff.create') }}"><i
                        class="ri-add-circle-line align-bottom"></i> Thêm mới</a>
            </div>
        </div>
    </div>

    <section class="container-fluid">
        <h2 class="fs-3 fw-bold mb-3">Danh sách user đại lý</h2>

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
                                <select name="agency_id" style="min-width: 300px;" class="form-control @error('agency_id') is-invalid @enderror">
                                    <option value="">--- Chọn đại lý ---</option>
                                    @foreach($agencies as $agency)
                                        <option value="{{ $agency->id }}" {{ request()->get('agency_id') === $agency->id  ? "selected" : ''}}>{{ $agency->name }} ({{ $agency->email }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary h-100">Tìm kiếm</button>
                            </div>
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
                                <th scope="col">Username</th>
                                <th>Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th>Đại lý</th>
                                <th style="min-width: 120px; width: 120px">Ngày tạo</th>
                                <th style="min-width: 250px; width: 250px">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($staffs as $key=>$staff)
                                <tr>
                                    <th scope="row">
                                        {{ $staffs->firstItem() + $loop->index  }}
                                    </th>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->username }}</td>
                                    <td>{{ $staff->email }}</td>
                                    <td>{{ $staff->phone_number }}</td>
                                    <td><a href="{{ route('agency.index', ['search_text' => $staff->agency->name ?? '']) }}">{{ $staff->agency->name ?? '' }}</a></td>
                                    <td>{{ $staff->created_at ? $staff->created_at->format('d-m-Y'): '' }}</td>
                                    <td>
                                        <a href="{{route('staff.edit',$staff->id)}}" style="margin-right: 8px">Chỉnh
                                            sửa</a>
                                        <a href="{{route('staff.show-form-password',$staff->id)}}" style="margin-right: 8px">Đổi password</a>
                                        <a onclick="return confirm('Chắc chắn bạn muốn xóa user đại lý?')"
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
                            <div class="mb-4">Không tìm thấy user đại lý!!! Vui lòng tạo user đại lý</div>
                            <a class="btn btn-sm btn-primary mt-4" href="{{ route('staff.create') }}">Tạo mới</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
