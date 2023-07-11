<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQRCodeRequest;
use App\Http\Requests\UpdateQRCodeRequest;
use App\Models\QRCode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QRCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $searchText = $request->get('search_text');
        $query = QRCode::query()
            ->orderBy('id','ASC');
        if (!empty($searchText)) {
            $query = $query->where('name', 'like', '%' .$searchText . '%')
                ->orWhere('code', 'like', '%' .$searchText . '%')
                ->orWhere('url', 'like', '%' .$searchText . '%')
                ->orWhere('note', 'like', '%' .$searchText . '%');
        }

        $qrcodes = $query->paginate(10);

        return view('qrcode.index')->with('qrcodes',$qrcodes);
    }

    public function create(): View
    {
        return view('qrcode.create');
    }

    public function store(StoreQRCodeRequest $request): RedirectResponse
    {
        $data = $request->only([
            'name', 'code', 'url', 'note'
        ]);

        $qrcode = QRCode::query()->create($data);
        if (empty($qrcode)) {
            toastr()->addError('Có lỗi xảy ra');
            return redirect()->back();
        }

        toastr()->addSuccess('Thành công');

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $qrcode = QRCode::query()->where('_id', $id)->first();
        if (empty($qrcode)) {
            toastr()->addError('Mã QCode không tồn tại');
            return redirect()->back();
        }

        return view('qrcode.edit', compact('qrcode'));
    }

    public function update(UpdateQRCodeRequest $request, $id): RedirectResponse
    {
        $data = $request->only([
            'name', 'code', 'url', 'note'
        ]);

        $qrcode = QRCode::query()->where('_id', $id)->first();
        if (empty($qrcode)) {
            toastr()->addError('Mã QCode không tồn tại');

            return redirect()->route('home');
        }

        $qrcode = tap($qrcode)->update($data);
        if (empty($qrcode)) {
            toastr()->addError('Có lỗi xảy ra');

            return redirect()->back();
        }

        toastr()->addSuccess('Thành công');
        return redirect()->route('home');
    }

    public function destroy($id): RedirectResponse
    {
        $qrcode = QRCode::query()->where('_id', $id)->first();
        if (empty($qrcode)) {
            toastr()->addError('Mã QCode không tồn tại');

            return redirect()->back();
        }

       $isDeleted = $qrcode->delete();
        if (empty($isDeleted)) {
            toastr()->addError('Có lỗi xảy ra');

            return redirect()->route('home');
        }

        toastr()->addSuccess('Thành công');
        return redirect()->route('home');
    }
}
