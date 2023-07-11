@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mt-4">
            <h2>XÁC THỰC COUPON</h2>

            <div class="col-md-8 m-auto">
                <form action="{{ route('check-coupon') }}" method="post" class="form-inline w-100 mt-4">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="coupon" value="{{ request()->get('coupon') }}"
                               class="form-control @error('coupon') is-invalid @enderror" style="min-width: 250px"
                               placeholder="Nhập mã coupon">

                        @error('coupon')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary px-10">Xác thực</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
