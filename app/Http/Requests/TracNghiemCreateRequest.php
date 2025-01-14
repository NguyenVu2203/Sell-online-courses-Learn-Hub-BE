<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TracNghiemCreateRequest extends FormRequest
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
            'cau_hoi'       => 'required|min:10|max:200',
            'dap_an_1'      => 'required|max:200',
            'dap_an_2'      => 'required|max:200',
            'dap_an_3'      => 'required|max:200',
            'dap_an_4'      => 'required|max:200',
            'dap_an_dung'   => 'required|min:1|max:4',
            'tinh_trang'    => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'cau_hoi.required'      => 'Câu hỏi không được để trống',
            'cau_hoi.min'           => 'Câu hỏi phải có ít nhất 10 ký tự',
            'cau_hoi.max'           => 'Câu hỏi không được vượt quá 200 ký tự',
            'dap_an_1.required'     => 'Đáp án 1 không được để trống',
            'dap_an_2.required'     => 'Đáp án 2 không được để trống',
            'dap_an_3.required'     => 'Đáp án 3 không được để trống',
            'dap_an_4.required'     => 'Đáp án 4 không được để trống',
            'dap_an_1.max'          => 'Đáp án 1 không được vượt quá 200 ký tự',
            'dap_an_2.max'          => 'Đáp án 2 không được vượt quá 200 ký tự',
            'dap_an_3.max'          => 'Đáp án 3 không được vượt quá 200 ký tự',
            'dap_an_4.max'          => 'Đáp án 4 không được vượt quá 200 ký tự',
            'dap_an_dung.required'  => 'Bạn cần chọn đáp án đúng',
            'dap_an_dung.min'       => 'Đáp án đúng phải nằm trong khoảng từ 1 đến 4',
            'dap_an_dung.max'       => 'Đáp án đúng phải nằm trong khoảng từ 1 đến 4',
            'tinh_trang.required'   => 'Tình trạng là bắt buộc',
            'tinh_trang.boolean'    => 'Tình trạng chưa được chọn',
        ];
    }

}
