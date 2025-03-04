<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangNapTienRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'so_tien_nap' => 'required|numeric|min:10000|max:50000000',
        ];
    }

    public function messages()
    {
        return [
            'so_tien_nap.required' => 'Số tiền nạp không được để trống.',
            'so_tien_nap.numeric'  => 'Số tiền nạp phải là số.',
            'so_tien_nap.min'      => 'Số tiền nạp tối thiểu là 10,000 VNĐ.',
            'so_tien_nap.max'      => 'Số tiền nạp tối đa là 50,000,000 VNĐ.',
        ];
    }
}
