<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'full_name' => 'required|string',
            'birthday' => 'nullable|date',
            'address' => 'nullable|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'user_name' => 'nullable|unique:candidates|string',
            'password' => 'nullable|string|confirmed',
            'status' => 'required|integer',
            'created_by' => 'string',
            'updated_by' => 'string',
        ];
    }
}
