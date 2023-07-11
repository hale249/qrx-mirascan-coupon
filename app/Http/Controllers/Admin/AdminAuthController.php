<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.admin_login');
    }

    public function login(AdminAuthRequest $request): RedirectResponse
    {
        $data = $request->only(['email', 'password']);
        if( Auth::guard('admin')->attempt($data) ){

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
}
