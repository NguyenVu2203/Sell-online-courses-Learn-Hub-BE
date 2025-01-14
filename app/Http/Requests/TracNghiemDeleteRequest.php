<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TracNghiemDeleteRequest extends FormRequest
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
            'id'        =>'required|exists:trac_nghiems,id'
        ];
    }
    public function messages()
    {
        return [
            'id.required'        =>'Không tìm thấy câu hỏi',
            'id.exists'          =>'Câu hỏi không tồn tại!'
        ];
    }
}
