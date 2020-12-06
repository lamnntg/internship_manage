<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question_category_id' => 'required|numeric',
            'question_degree_id' => 'required|numeric',
            'question' => 'required|alpha_dash',
            'media_url' => 'nullable|image',
            'question' => 'required',
            'media_url' => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'answer_type' => 'nullable|numeric',
            'check_point_flg' => 'nullable|numeric|min:0|max:255',
            'interview_flg' => 'nullable|numeric|min:0|max:255',
        ];
    }
}
