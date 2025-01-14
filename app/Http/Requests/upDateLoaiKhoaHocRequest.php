<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class upDateLoaiKhoaHocRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id'              => 'required|exists:loai_khoa_hocs,id',
            'ten_khoa_hoc'    => 'required|min:4|max:30',
            'slug_khoa_hoc'   => 'required|min:4|unique:loai_khoa_hocs,slug_khoa_hoc,'. $this->id. 'id,',
            'hinh_anh'        => 'required',
            'mo_ta_ngan'      => 'required|min:100',
            'tinh_trang'      => 'required|boolean',
            'gia_ban'          =>'required|numeric|min:1',
            'gia_goc'          =>'required|numeric|min:1',
        ];
    }
    public function messages(): array
    {
        return [
            'id.required'               => 'Không tìm thấy loại khóa học',
            'id.exists'                 => 'Loại khóa học không tồn tại',
            'ten_khoa_hoc.required'     => 'Tên khóa học không được để trống.',
            'ten_khoa_hoc.min'          => 'Tên khóa học phải có ít nhất 4 ký tự.',
            'ten_khoa_hoc.max'          => 'Tên khóa học không được vượt quá 30 ký tự.',
            'slug_khoa_hoc.required'    => 'Slug khóa học không được để trống.',
            'slug_khoa_hoc.min'         => 'Slug khóa học phải có ít nhất 4 ký tự.',
            'slug_khoa_hoc.unique'      => 'Slug khóa học này đã tồn tại, vui lòng chọn slug khác.',
            'hinh_anh.required'         => 'Hình ảnh không được để trống.',
            'mo_ta_ngan.required'       => 'Mô tả ngắn không được để trống.',
            'mo_ta_ngan.min'            => 'Mô tả ngắn phải có ít nhất 100 ký tự.',
            'tinh_trang.required'       => 'Tình trạng là bắt buộc',
            'tinh_trang.boolean'        => 'Tình trạng chưa được chọn',
            'gia_ban.required'          => 'Giá bán là trường bắt buộc.',
            'gia_ban.numeric'           => 'Giá bán phải là một số.',
            'gia_ban.min'               => 'Giá bán phải lớn hơn hoặc bằng 1.',
            'gia_goc.required'          => 'Giá gốc là trường bắt buộc.',
            'gia_goc.numeric'           => 'Giá gốc phải là một số.',
            'gia_goc.min'               => 'Giá gốc phải lớn hơn hoặc bằng 1.',
        ];
    }
}
