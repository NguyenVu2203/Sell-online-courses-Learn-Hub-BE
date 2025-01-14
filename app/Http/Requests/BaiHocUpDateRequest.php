<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaiHocUpDateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id'            =>'required|exists:bai_hocs,id',
            'id_khoa_hoc'   =>'required|exists:loai_khoa_hocs,id',
            'tieu_de'       =>'required|min:3|max:100',
            'bai_hoc_so'    =>'required|numeric',
            'link_bai_hoc'  =>'required|min:10|max:1000',
            'is_thu_phi'    => 'required|boolean',
            'tinh_trang'    => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'id.required'           =>  'Không tìm thấy bài học',
            'id.exists'             =>  'Bài học không tồn tại!',
            'id_khoa_hoc.required'  =>  'Yêu cầu phải chọn loại khoá học',
            'id_khoa_hoc.exists'    =>  'Loại khoá học không tồn tại',
            'bai_hoc_so.required'   =>  'Phải nhập thông tin bài học số mấy',
            'bai_hoc_so.numeric'    =>  'Bài học phải là số',
            'is_thu_phi.required'   =>  'Phải chọn loại thu phí',
            'is_thu_phi.boolean'    =>  'Loại thu phí chỉ được chọn theo hệ thống',
            'tinh_trang.required'   =>  'Tình trạng không được để trống',
            'tinh_trang.boolean'    =>  'Tình trạng phải chọn đung yêu cầu',
            'tieu_de.required'      =>  'Bạn phải nhập tiêu đề',
            'tieu_de.min'           =>  'Tiêu đề tối thiểu phải 3 ký tự',
            'tieu_de.max'           =>  'Tiêu đề tối đa chỉ được 100 ký tự',
            'link_bai_hoc.required' =>  'Bạn phải nhập link bài học',
            'link_bai_hoc.min'      =>  'Link bài học tối thiểu phải 10 ký tự',
            'link_bai_hoc.max'      =>  'Link bài học tối đa chỉ được 1000 ký tự',
        ];
    }
}
