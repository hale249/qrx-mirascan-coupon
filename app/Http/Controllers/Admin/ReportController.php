<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CouponScanHistory;

class ReportController extends Controller
{

    public function index()
    {
//        $couponScanHistories = CouponScanHistory::query()->where()
//            ->with(['qrcode'])->get();
//        dd($couponScanHistories);
        return view('report.index');
    }
}
