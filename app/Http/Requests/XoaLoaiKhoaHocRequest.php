<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class XoaLoaiKhoaHocRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'        =>'required|exists:loai_khoa_hocs,id'
        ];
    }
    public function messages()
    {
        return  [
            'id.required'        =>'Không tìm thấy loại khóa học',
            'id.exists'          =>'Khóa học không tồn tại!'
        ];
    }
}
