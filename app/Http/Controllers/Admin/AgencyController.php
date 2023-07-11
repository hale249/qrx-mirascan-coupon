<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgencyRequest;
use App\Http\Requests\UpdateAgencyRequest;
use App\Models\Agency;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgencyController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::guard('admin')->user()->user_id ?? '';
        $searchText = $request->get('search_text');
        $query = Agency::query()
            ->where('user_id', $userId)
            ->orderBy('id','ASC');
        if (!empty($searchText)) {
            $query = $query->where('name', 'like', '%' .$searchText . '%')
                ->orWhere('email', 'like', '%' .$searchText . '%')
            ->orWhere('phone_number', 'like', '%' .$searchText . '%');
        }

        $agencies = $query->paginate(10);

        return view('agency.index', compact('agencies'));
    }

    public function create()
    {
        return view('agency.create');
    }

    public function store(StoreAgencyRequest $request): RedirectResponse
    {
        $userId = Auth::guard('admin')->user()->user_id ?? '';

        $data = $request->only([
            'name', 'email', 'phone_number', 'address'
        ]);
        $data['email'] = trim($data['email']);
        $data['phone_number'] = trim($data['phone_number']);
        $checkAgency = Agency::query()
            ->where('user_id', $userId)
            ->where('email', $data['email'])
            ->first();
        if (!empty($checkAgency)) {
            toastr()->addError('Địa chỉ email trùng lặp');
            return redirect()->back();
        }

        $data['user_id'] = $userId;
        $agency = Agency::query()->create($data);
        if (empty($agency)) {
            toastr()->addError('Có lỗi xảy ra');
            return redirect()->back();
        }

        toastr()->addSuccess('Thành công');

        return redirect()->route('agency.index');
    }

    public function edit($id)
    {
        $userId = Auth::guard('admin')->user()->user_id ?? '';
        $agency = Agency::query()->where('_id', $id)->where('user_id', $userId)->first();
        if (empty($agency)) {
            toastr()->addError('Đại lý không tồn tại');
            return redirect()->back();
        }

        return view('agency.edit', compact('agency'));
    }

    public function update($id, UpdateAgencyRequest $request)
    {
        $data = $request->only([
            'name', 'email', 'phone_number', 'address'
        ]);

        $data['email'] = trim($data['email']);
        $data['phone_number'] = trim($data['phone_number']);
        $userId = Auth::guard('admin')->user()->user_id ?? '';
        $agency = Agency::query()->where('_id', $id)->where('user_id', $userId)->first();
        if (empty($agency)) {
            toastr()->addError('Đại lý không tồn tại');

            return redirect()->route('home');
        }

        $checkAgency = Agency::query()
            ->where('_id', '!=', $id)
            ->where('user_id', $userId)
            ->where('email', $data['email'])
            ->first();

        if (!empty($checkAgency)) {
            toastr()->addError('Trường email đã có trong cơ sở dữ liệu');
            return redirect()->back();
        }

        $agency = tap($agency)->update($data);
        if (empty($agency)) {
            toastr()->addError('Có lỗi xảy ra');

            return redirect()->back();
        }

        toastr()->addSuccess('Thành công');
        return redirect()->route('agency.index');
    }

    public function destroy($id): RedirectResponse
    {
        $userId = Auth::guard('admin')->user()->user_id ?? '';
        $agency = Agency::query()->where('_id', $id)->where('user_id', $userId)->first();
        if (empty($agency)) {
            toastr()->addError('Đại lý không tồn tại');

            return redirect()->back();
        }

        $staffs = User::query()->where('agency_id', $id)->first();
        if (!empty($staffs)) {
            toastr()->addError('Đã có thông tin user đại lý. Không được phép xóa');

            return redirect()->back();
        }
        $isDeleted = $agency->delete();
        if (empty($isDeleted)) {
            toastr()->addError('Có lỗi xảy ra');

            return redirect()->route('agency.index');
        }

        toastr()->addSuccess('Thành công');
        return redirect()->route('agency.index');
    }
}
