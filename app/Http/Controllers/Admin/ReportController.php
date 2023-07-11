<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\CouponScanHistory;
use App\Models\QRCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $userId = Auth::guard('admin')->user()->customer_id ?? '';
        $customerUId = Auth::guard('admin')->user()->customer_uid ?? '';
        $coupons = QRCode::query()->select(['customer_id', 'category'])
            ->where('customer_id', $customerUId)
            ->where('category', 'coupon')
            ->get();

        $scan = CouponScanHistory::query()->select('customer_id')
            ->where('customer_id', $userId)->count();


        $agency = Agency::query()->select('customer_id')
            ->where('customer_id', $userId)->count();

        $staff = User::query()->select('customer_id')
            ->where('customer_id', $userId)->count();

        $statistical = [
            'coupon' => (clone $coupons)->count(),
            'scan' => $scan,
            'agency' => $agency,
            'staff' => $staff,
        ];
        $customerId = Auth::user()->customer_id ?? '';
        $scanHistories = CouponScanHistory::query()
            ->with(['qrcode', 'qrResponse', 'staff', 'agency'])
            ->paginate(10);

        return view('report.index', compact('statistical', 'scanHistories', 'coupons'));
    }
}
