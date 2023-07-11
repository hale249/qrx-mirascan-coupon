<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgencyRequest;

class AgencyController extends Controller
{
    public function index()
    {
        return view('agency.index');
    }

    public function create()
    {
        return view('agency.create');
    }

    public function store(StoreAgencyRequest $request)
    {

    }

    public function edit($id)
    {
        return view('agency.edit');
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}
