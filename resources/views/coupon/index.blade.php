@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mt-4">
            <h2>XÁC THỰC COUPON</h2>

            <div class="col-md-8 m-auto">
                <form action="" method="GET" class="form-inline w-100 mt-4">
                    <div class="mb-4">
                        <input type="text" name="search_text" value="{{ request()->get('code') }}" class="form-control" style="min-width: 250px" placeholder="Nhập mã code">
                    </div>

                   <div>
                       <button type="submit" class="btn btn-primary">Xác thực</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
@endsection
