<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'username' => 'required|max:50|min:8',
            'password' => 'required|max:50',
            'phone_number' => 'regex:/(01)[0-9]{9}/|nullable',
            'agency_id' => 'required',
        ];
    }
}
