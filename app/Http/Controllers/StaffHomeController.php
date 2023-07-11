<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckCouponCodeRequest;
use App\Models\Agency;
use App\Models\CouponScanHistory;
use App\Models\Customer;
use App\Models\QRCode;
use App\Models\QrResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffHomeController extends Controller
{
    public function index()
    {
        return view('coupon.index');
    }

    public function checkCoupon(CheckCouponCodeRequest $request): RedirectResponse
    {
        $userId = Auth::id();
        $data = $request->only(['coupon']);
        $data['coupon'] = trim($data['coupon']);
        $customerId = Auth::user()->customer_id;
        if (empty($customerId)) {
            toastr()->addError('Lỗi không có customers');
            return redirect()->back();
        }

//        $qrcodeIds = QRCode::query()
//            ->where('customer_id', $customerId)
//            ->where('category', 'coupon')
//            ->pluck('_id')->toArray();
//
//        if (empty($qrcodeIds)) {
//            toastr()->addError('Lỗi không có qrcode');
//            return redirect()->back();
//        }

        $qrcodeResponse = QrResponse::query()
//            ->whereIn('qrcode_id', $qrcodeIds)
            ->where('category', 'coupon')
            ->whereNotNull('coupon')
            ->where('coupon.code', '=', $data['coupon'])
            ->first();
        if (empty($qrcodeResponse)) {
            toastr()->addError('Không có mã coupon');

            return redirect()->back();
        }

        $agencyId = Auth::user()->agency_id ?? '';
        $agency = Agency::query()->where('_id', $agencyId)->first();
        if (empty($agency)) {
            toastr()->addError('Có lỗi xảy ra, không tìm thấy thông tin đại lý');

            return redirect()->back();
        }

        CouponScanHistory::query()->create([
            'qr_response_id' => $qrcodeResponse->id,
            'agency_id' => Auth::user()->agency_id ?? '',
            'staff_id' => $userId,
            'qrcode_id' => $qrcodeResponse->qrcode_id,
            'customer_id' => Auth::user()->customer_id ?? '',
        ]);

        $scanCount = $agency->verify_count ?? 0;
        $agency->update([
            'verify_count' => $scanCount + 1
        ]);

        toastr()->addSuccess('Xác thực thành công');
        return redirect()->back();
    }
}
