<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpDateBaiVietRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {
        return [
            'id'                => 'required|exists:bai_viets,id',
            'tieu_de'           => 'required|min:4|max:100',
            'slug_tieu_de'      => 'required|min:4|unique:bai_viets,slug_tieu_de,'. $this->id. 'id,',
            'hinh_anh'          => 'required',
            'mo_ta_ngan'        => 'required|min:10',
            'noi_dung'          => 'required|min:20',
            'tinh_trang'        => 'required|boolean',
        ];
    }
    public function messages(): array
{
    return [
        'id.required'           => 'Không tìm thấy bài viết',
        'id.exists'             => 'Bài viết không tồn tại',
        'tieu_de.required'      => 'Tiêu đề là bắt buộc.',
        'tieu_de.min'           => 'Tiêu đề phải có ít nhất 4 ký tự.',
        'tieu_de.max'           => 'Tiêu đề không được vượt quá 100 ký tự.',

        'slug_tieu_de.required' => 'Slug tiêu đề là bắt buộc.',
        'slug_tieu_de.min'      => 'Slug tiêu đề phải có ít nhất 4 ký tự.',
        'slug_tieu_de.unique'   => 'Slug tiêu đề đã tồn tại',

        'hinh_anh.required'     => 'Hình ảnh là bắt buộc.',

        'mo_ta_ngan.required'   => 'Mô tả ngắn là bắt buộc.',
        'mo_ta_ngan.min'        => 'Mô tả ngắn phải có ít nhất 10 ký tự.',

        'noi_dung.required'     => 'Nội dung là bắt buộc.',
        'noi_dung.min'          => 'Nội dung phải có ít nhất 20 ký tự.',

        'tinh_trang.required'   => 'Tình trạng là bắt buộc',
        'tinh_trang.boolean'    => 'Tình trạng chưa được chọn',
    ];
}
}
