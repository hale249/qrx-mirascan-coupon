<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::guard('admin')->user()->user_id ?? '';
        $searchText = $request->get('search_text');
        $query = User::query()->where('user_id', $userId)
            ->orderBy('id','ASC');
        if (!empty($searchText)) {
            $query = $query->where('name', 'like', '%' .$searchText . '%')
                ->orWhere('email', 'like', '%' .$searchText . '%')
                ->orWhere('phone_number', 'like', '%' .$searchText . '%');
        }

        $staffs = $query->paginate(10);

        return view('staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(StoreStaffRequest $request)
    {
        $userId = Auth::guard('admin')->user()->user_id ?? '';

        $data = $request->only([
            'name', 'email', 'phone_number', 'address'
        ]);

        $data['user_id'] = $userId;
        $staff = User::query()->create($data);
        if (empty($staff)) {
            toastr()->addError('Có lỗi xảy ra');
            return redirect()->back();
        }

        toastr()->addSuccess('Thành công');

        return redirect()->route('staff.index');
    }

    public function edit($id)
    {
        $userId = Auth::guard('admin')->user()->user_id ?? '';
        $staff = User::query()->where('_id', $id)->where('user_id', $userId)->first();
        if (empty($staff)) {
            toastr()->addError('User đại lý không tồn tại');
            return redirect()->back();
        }

        return view('staff.edit');
    }

    public function update($id, UpdateStaffRequest $request)
    {
        $data = $request->only([
            'name', 'email', 'phone_number', 'address'
        ]);

        $userId = Auth::guard('admin')->user()->user_id ?? '';
        $staff = User::query()->where('_id', $id)->where('user_id', $userId)->first();
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

    public function destroy($id)
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
}
