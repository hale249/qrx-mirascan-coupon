<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StaffClientController extends Controller
{
    public function index()
    {
        return view('coupon.index');
//        abort(404);
    }
    public function checkCodeCoupon(Request $request): RedirectResponse
    {
        $data = $request->get('code');

        $qrId = $request->get('id');
        if (empty($qrId)) {
            return redirect()->route('qrx.static');
        }

        $qrcode = QRCode::query()->where('code', $qrId)->first();
        if (empty($qrcode) || empty($qrcode->url)) {
            return redirect()->route('qrx.static');
        }

        return redirect()->to($qrcode->url);
    }
}
