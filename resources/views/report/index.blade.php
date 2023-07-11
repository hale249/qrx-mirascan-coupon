@extends('layouts.app_admin')

@section('title', 'Tổng quan')

@section('content')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-3">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tổng quan</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="container-fluid">
        <h2 class="fs-3 fw-bold mb-3">Tổng quan</h2>

        <div class="row g-4 mb-3">

            <!-- Number Orders Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Monthly
                            Income</h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1">$</span>
                                    567,99</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartMonthlyIncome"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Number Orders Widget-->

            <!-- Average Orders Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Average
                            Order</h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1">$</span>
                                    193,99</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartAvgOrders"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Average Orders Widget-->

            <!-- Pageviews Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Daily
                            Pageviews</h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold">95,456</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartPageviews"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Pageviews Widget-->

            <!-- Number Refunds Widget-->
            <div class="col-12 col-sm-6 col-xxl-3">
                <div class="card h-100">
                    <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                        <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Refund
                            Issued</h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-4 mb-3 mb-md-1">
                            <div class="col-12 col-md-6">
                                <p class="fs-3 fw-bold d-flex align-items-center"><span class="fs-9 me-1">$</span>
                                    12,340</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="chart chart-sm">
                                    <canvas id="chartNumRefunds"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Number Refunds Widget-->
        </div>

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
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th scope="col">Họ tên</th>
                            <th style="min-width: 150px; width: 150px">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th style="min-width: 200px; width: 200px">Code</th>
                            <th style="min-width: 200px; width: 200px">Đại lý xác thực</th>
                            <th style="min-width: 200px; width: 200px">Nhân viên xác thực</th>
                            <th style="min-width: 120px; width: 120px">Ngày xác thực</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">
                                1
                            </th>
                            <td>Ha le</td>
                            <td>halv@gmail.com</td>
                            <td>09749223</td>
                            <td>4334334</td>
                            <td>Halv</td>
                            <td>hal co</td>
                            <td>22/23/30434</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
