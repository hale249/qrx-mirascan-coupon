@extends('layouts.app_admin')

@section('title', 'Quản lý đại lý')

@section('content')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Tổng quan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đại lý</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="container-fluid">
        <h2 class="fs-3 fw-bold mb-3">Danh sách mới đại lý</h2>

        <div class="card">
{{--            <div class="card-header flex p-2" style="display: flex; justify-content: space-between; align-items: center">--}}
{{--                <div>--}}
{{--                    <h4>Danh sách đai lý</h4>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <a href="{{ route('agency.create') }}" class="btn btn-primary btn-sm float-end">Thêm mới</a>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <form action="" method="GET" class="form-inline w-100  mt-2 d-flex flex-wrap gap-2">
                            <div class="form-group">
                                <input type="text" name="search_text" value="{{ request()->get('search_text') }}" class="form-control" style="min-width: 250px" placeholder="Tìm kiếm...">
                            </div>
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
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
                                <th style="min-width: 150px; width: 150px">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th style="min-width: 200px; width: 200px">Đại chỉ</th>
                                <th style="min-width: 200px; width: 200px">Số lượng NV</th>
                                <th style="min-width: 200px; width: 200px">Số lần xác thực</th>
                                <th style="min-width: 120px; width: 120px">Ngày tạo</th>
                                <th style="min-width: 120px; width: 120px">Hành động</th>
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
                                    <td>{{ $agency->staff_count }}</td>
                                    <td>{{ $agency->scan_count ?? 0  }}</td>
                                    <td>{{ $agency->created_at ? $agency->created_at->format('d-m-Y'): '' }}</td>
                                    <td>
                                        <a href="{{route('agency.edit',$agency->id)}}" style="margin-right: 8px">Chỉnh
                                            sửa</a>
                                        <a onclick="return confirm('Chắc chắn bạn muốn xóa qrcode?')" href="{{route('agency.delete',$agency->id)}}" class="text-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="float:right">{{$agencies->links()}}</div>
                @else
                    <h6 class="text-center">Không tìm thấy đại lý!!! Vui lòng tạo đại lý</h6>
                @endif
            </div>
        </div>
    </section>
@endsection
