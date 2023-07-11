<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateCurrentPasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.admin_login');
    }

    public function login(AdminAuthRequest $request): RedirectResponse
    {
        $data = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($data, true)) {

            toastr()->addSuccess('Đăng nhập thành công');
            return redirect()->route('admin.home');
        }

        toastr()->addError('Đăng nhập thất bại');
        return redirect()->route('admin.login');
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function showFormPassword()
    {
        $user = Auth::guard('admin')->user();
        return view('profile.admin-reset-password', compact('user'));
    }

    public function changePassword(UpdateCurrentPasswordRequest $request): RedirectResponse
    {
        $data = $request->only([
            'password', 'old_password'
        ]);

        if(!Hash::check($data['old_password'], Auth::guard('admin')->user()->password)){
            toastr()->addError('Mật khẩu hiện tại không đúng, vui lòng kiểm tra lại');
            return redirect()->back();
        }

        $data['password'] = Hash::make($data['password']);
        $user = Auth::guard('admin')->user();
        $userUpdate = tap($user)->update($data);
        if (empty($userUpdate)) {
            toastr()->addError('Có lỗi xảy ra');

            return redirect()->back();
        }

        toastr()->addSuccess('Đổi mật khẩu thành công');
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
