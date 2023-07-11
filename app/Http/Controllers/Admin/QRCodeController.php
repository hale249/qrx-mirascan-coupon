<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QRCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QRCodeController extends Controller
{
    public function index(Request $request)
    {
        $customerUId = Auth::guard('admin')->user()->customer_uid ?? '';
        $searchText = $request->get('search_text');
        $query = QRCode::query()
            ->where('category', 'coupon')
            ->where('customer_id', $customerUId)
            ->orderBy('id','ASC');
        if (!empty($searchText)) {
            $query = $query->where('name', 'like', '%' .$searchText . '%');
        }

        $qrcodes = $query->paginate(10);

        return view('qrcode.index', compact('qrcodes'));
    }
}
