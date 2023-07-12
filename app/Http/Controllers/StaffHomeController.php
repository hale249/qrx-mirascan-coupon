<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CheckCouponCodeRequest;
use App\Http\Requests\UpdateCurrentPasswordRequest;
use App\Models\Agency;
use App\Models\CouponScanHistory;
use App\Models\QRCode;
use App\Models\QrResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $customerUid = Auth::user()->customer->uid ?? '';
        if (empty($customerUid)) {
            toastr()->addError('Lỗi không có customers');
            return redirect()->back();
        }

        $qrcodes = QRCode::query()
            ->where('customer_id', $customerUid)
            ->where('category', 'coupon')
            ->get();

        $qrcodeIds = $qrcodes->pluck('_id',)->toArray();

        if (empty($qrcodeIds)) {
            toastr()->addError('Lỗi không có qrcode');
            return redirect()->back();
        }

        $qrcodeResponse = QrResponse::query()
            ->whereIn('qrcode_id', $qrcodeIds)
            ->where('category', 'coupon')
            ->whereNotNull('coupon')
            ->where('coupon.code', '=', $data['coupon'])
            ->first();
        if (empty($qrcodeResponse)) {
            sweetalert()->addError('Không có mã coupon');

            return redirect()->back();
        }

        $qrcodeStatus = $qrcodes->where('_id', $qrcodeResponse->qrcode_id)->first();
        if (empty($qrcodeStatus) || $qrcodeStatus->status !== 'active') {
            sweetalert()->addError('Coupon không khả dụng', 'Coupon này không hoạt động hoặc đã quá hạn sử dụng!');

            return redirect()->back();
        }

        $agencyId = Auth::user()->agency_id ?? '';
        $agency = Agency::query()->where('_id', $agencyId)->first();
        if (empty($agency)) {
            sweetalert()->addError('Có lỗi xảy ra, không tìm thấy thông tin đại lý');
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

        sweetalert()->addSuccess('Xác thực thành công');
        return redirect()->back();
    }

    public function showFormPassword()
    {
        $user = Auth::user();
        return view('profile.staff-reset-password', compact('user'));
    }

    public function changePassword(UpdateCurrentPasswordRequest $request): RedirectResponse
    {
        $data = $request->only([
            'password', 'old_password'
        ]);

        if(!Hash::check($data['old_password'], Auth::user()->password)){
            toastr()->addError('Mật khẩu hiện tại không đúng, vui lòng kiểm tra lại');
            return redirect()->back();
        }

        $data['password'] = Hash::make($data['password']);
        $user = Auth::user();
        $userUpdate = tap($user)->update($data);
        if (empty($userUpdate)) {
            toastr()->addError('Có lỗi xảy ra');

            return redirect()->back();
        }

        toastr()->addSuccess('Đổi mật khẩu thành công');
        Auth::logout();
        return redirect()->route('login');
    }
}
