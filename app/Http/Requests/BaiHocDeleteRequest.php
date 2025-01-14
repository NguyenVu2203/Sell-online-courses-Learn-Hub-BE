<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaiHocDeleteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
             'id'        =>'required|exists:bai_hocs,id'
        ];
    }
    public function messages()
    {
        return [
            'id.required'        =>'Không tìm thấy bài học',
            'id.exists'          =>'Bài học không tồn tại!'
        ];
    }
}
