<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminAuthRequest;

class AdminAuthController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.admin_login');
    }

    public function login(AdminAuthRequest $request)
    {

    }

    public function logout()
    {

    }
}
