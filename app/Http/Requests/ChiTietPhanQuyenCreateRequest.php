<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChiTietPhanQuyenCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_quyen'      => 'required|exists:phan_quyens,id',
            'id_chuc_nang'  => 'required|exists:chuc_nangs,id',
        ];
    }

    public function messages(): array
    {
        return [
            'id_quyen.required'     => 'Vui lòng chọn quyền',
            'id_quyen.exists'       => 'Quyền không tồn tại',
            'id_chuc_nang.required' => 'Vui lòng chọn chức năng',
            'id_chuc_nang.exists'   => 'Chức năng không tồn tại',
        ];
    }
}
