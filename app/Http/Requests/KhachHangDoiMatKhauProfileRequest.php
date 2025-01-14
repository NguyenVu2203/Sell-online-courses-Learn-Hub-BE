<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangDoiMatKhauProfileRequest extends FormRequest
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
            'old_password' => 'required',
            'new_password'      => 'required|min:6|max:30',
            're_password'   => 'required|same:new_password',
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
            'old_password.required'  => 'Mật khẩu cũ là bắt buộc.',
            'new_password.required'      => 'Mật khẩu mới là bắt buộc.',
            'new_password.min'           => 'Mật khẩu mới phải có ít nhất 6 ký tự.',
            'new_password.max'           => 'Mật khẩu mới không được vượt quá 30 ký tự.',
            're_password.required'   => 'Vui lòng nhập lại mật khẩu.',
            're_password.same'       => 'Mật khẩu nhập lại không khớp.',
        ];
    }
}
