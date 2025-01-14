<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class layThongTinProfileAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ho_va_ten'     => 'required|min:3|max:50',
            'email'         => 'required|email|unique:khach_hangs,email,' . $this->id . 'id,',
            'so_dien_thoai' => 'required|digits:10',
            'dia_chi'       => 'required|min:3|max:50'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'ho_va_ten.required'     => 'Họ và tên là bắt buộc.',
            'ho_va_ten.min'          => 'Họ và tên phải có ít nhất 3 ký tự.',
            'ho_va_ten.max'          => 'Họ và tên không được vượt quá 50 ký tự.',
            'email.required'         => 'Email là bắt buộc.',
            'email.email'            => 'Email không hợp lệ.',
            'email.unique'           => 'Email đã tồn tại.',
            'so_dien_thoai.required' => 'Số điện thoại là bắt buộc.',
            'so_dien_thoai.digits'   => 'Số điện thoại phải có 10 chữ số.',
            'dia_chi.required'       => 'Địa chỉ là bắt buộc.',
            'dia_chi.min'            => 'Địa chỉ phải có ít nhất 3 ký tự.',
            'dia_chi.max'            => 'Địa chỉ không được vượt quá 50 ký tự.'
        ];
    }
}
