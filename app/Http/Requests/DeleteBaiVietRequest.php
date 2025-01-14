<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteBaiVietRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
             'id'        =>'required|exists:bai_viets,id'
        ];
    }
    public function messages()
    {
        return [
            'id.required'        =>'Không tìm thấy bài viết',
            'id.exists'          =>'Bài viết không tồn tại!'
        ];
    }
}
