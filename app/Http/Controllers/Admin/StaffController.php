<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Agency;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::guard('admin')->user()->customer_id ?? '';
        $searchText = $request->get('search_text');
        $searchAgencyId = $request->get('agency_id');
        $query = User::query()->where('customer_id', $userId)
            ->orderBy('id','ASC');
        if (!empty($searchText)) {
            $query = $query->where('name', 'like', '%' .$searchText . '%')
                ->orWhere('email', 'like', '%' .$searchText . '%')
                ->orWhere('phone_number', 'like', '%' .$searchText . '%');
        }

        if (!empty($searchAgencyId)) {
            $query = $query->where('agency_id', $searchAgencyId);
        }

        $agencies = Agency::query()
            ->select(['id', 'email', 'name'])
            ->where('customer_id', $userId)
            ->get();

        $staffs = $query->paginate(10);

        return view('staff.index', compact('staffs', 'agencies'));
    }

    public function create()
    {
        $userId = Auth::guard('admin')->user()->customer_id ?? '';
        $agencies = Agency::query()
            ->select(['id', 'email', 'name'])
            ->where('customer_id', $userId)
            ->get();

        return view('staff.create', compact('agencies'));
    }

    public function store(StoreStaffRequest $request): RedirectResponse
    {
        $userId = Auth::guard('admin')->user()->customer_id ?? '';
        $data = $request->only([
            'name', 'email', 'password', 'username', 'agency_id', 'phone_number'
        ]);
        $data['username'] = trim($data['username']);
        $data['email'] = trim($data['email']);

        $checkUserName = User::query()
            ->where('username', $data['username'])
            ->first();
        if (!empty($checkUserName)) {
            toastr()->addError('Username đã tồn tại trên hệ thống');

            return redirect()->back();
        }

        $agency = Agency::query()->where('_id', $data['agency_id'])->first();
        if (empty($agency)) {
            toastr()->addError('Đại lý không tồn tại trên hệ thống');

            return redirect()->back();
        }

        $data['email_verified_at'] = Carbon::now()->timestamp;
        $data['customer_id'] = $userId;
        $data['password'] = Hash::make($data['password']);
        $staff = User::query()->create($data);
        if (empty($staff)) {
            toastr()->addError('Có lỗi xảy ra');
            return redirect()->back();
        }

        $staffCount = $agency->staff_count ?? 0;
        $agency->update([
            'staff_count' => $staffCount + 1
        ]);

        toastr()->addSuccess('Thành công');

        return redirect()->route('staff.index');
    }

    public function edit($id)
    {
        $userId = Auth::guard('admin')->user()->customer_id ?? '';
        $staff = User::query()->where('_id', $id)->where('customer_id', $userId)->first();
        if (empty($staff)) {
            toastr()->addError('User đại lý không tồn tại');
            return redirect()->back();
        }

        $agencies = Agency::query()
            ->select(['id', 'email', 'name'])
            ->where('customer_id', $userId)
            ->get();

        return view('staff.edit', compact('agencies', 'staff'));
    }

    public function update($id, UpdateStaffRequest $request)
    {
        $data = $request->only([
            'name', 'email', 'username', 'agency_id', 'phone_number'
        ]);

        $userId = Auth::guard('admin')->user()->customer_id ?? '';
        $staff = User::query()->where('_id', $id)->where('customer_id', $userId)->first();
        if (empty($staff)) {
            toastr()->addError('User đại lý không tồn tại');

            return redirect()->route('home');
        }

        $staff = tap($staff)->update($data);
        if (empty($staff)) {
            toastr()->addError('Có lỗi xảy ra');

            return redirect()->back();
        }

        toastr()->addSuccess('Thành công');
        return redirect()->route('staff.index');
    }

    public function destroy($id): RedirectResponse
    {
        $staff = User::query()->where('_id', $id)->first();
        if (empty($staff)) {
            toastr()->addError('Mã QCode không tồn tại');

            return redirect()->back();
        }

        $isDeleted = $staff->delete();
        if (empty($isDeleted)) {
            toastr()->addError('Có lỗi xảy ra');

            return redirect()->route('staff.index');
        }

        toastr()->addSuccess('Thành công');
        return redirect()->route('staff.index');
    }

    public function showFormPassword($id)
    {
        $staff = User::query()->where('_id', $id)->first();
        if (empty($staff)) {
            toastr()->addError('Mã QCode không tồn tại');

            return redirect()->back();
        }

        return view('staff.reset-password', compact('staff'));
    }

    public function changePassword(ChangePasswordRequest $request, $id)
    {
        $data = $request->only([
            'password'
        ]);

        $staff = User::query()->where('_id', $id)->first();
        if (empty($staff)) {
            toastr()->addError('User đại lý không tồn tại');

            return redirect()->route('home');
        }

        $data['password'] = Hash::make($data['password']);
        $staff = tap($staff)->update($data);
        if (empty($staff)) {
            toastr()->addError('Có lỗi xảy ra');

            return redirect()->back();
        }

        toastr()->addSuccess('Thành công');
        return redirect()->route('staff.index');
    }
}
