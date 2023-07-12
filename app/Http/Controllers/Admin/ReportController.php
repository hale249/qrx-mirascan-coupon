<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ScanCouponExport;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\CouponScanHistory;
use App\Models\QRCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use MongoDB\BSON\UTCDateTime;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $data = $request->only(['agency_id', 'from_date', 'to_date']);
        $userId = Auth::guard('admin')->user()->customer_id ?? '';
        $customerUId = Auth::guard('admin')->user()->customer_uid ?? '';
        $coupons = QRCode::query()->select(['customer_id', 'category'])
            ->where('customer_id', $customerUId)
            ->where('category', 'coupon')
            ->count();

        $scan = CouponScanHistory::query()->select('customer_id')
            ->where('customer_id', $userId)->count();


        $agencies = Agency::query()->select(['customer_id', 'name', 'email'])
            ->where('customer_id', $userId)->get();

        $staff = User::query()->select('customer_id')
            ->where('customer_id', $userId)->count();

        $statistical = [
            'coupon' => $coupons,
            'scan' => $scan,
            'agency' => count($agencies),
            'staff' => $staff,
        ];

        $customerId = Auth::user()->customer_id ?? '';
        $query = CouponScanHistory::query()
            ->with(['qrcode', 'qrResponse', 'staff', 'agency'])
            ->where('customer_id', $customerId)
            ->orderBy('created_at','ASC');

        if (!empty($data['agency_id'])) {
            $query = $query->where('agency_id', $data['agency_id']);
        }

        if (!empty($data['from_date']) && !empty($data['to_date'])) {
            $startDate = new UTCDateTime(Carbon::parse($data['from_date'])->startOfDay()->timestamp * 1000);
            $endDate = new UTCDateTime(Carbon::parse($data['to_date'])->endOfDay()->timestamp * 1000);

            $query = $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $scanHistories = $query->paginate(10);

        return view('report.index', compact('statistical', 'scanHistories', 'agencies'));
    }

    public function scanExport(Request $request)
    {
        $data = $request->only(['agency_id', 'from_date', 'to_date']);
        $userId = Auth::guard('admin')->user()->customer_id ?? '';
        $fileName = 'scan_coupon' . date('Y_m_d_H_i_s', time()) . '.xlsx';
        return Excel::download(new ScanCouponExport($userId, $data ?? []), $fileName);
    }
}
