<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoaiKhoaHocRequestCreate;
use App\Http\Requests\upDateLoaiKhoaHocRequest;
use App\Http\Requests\XoaLoaiKhoaHocRequest;
use App\Models\ChiTietPhanQuyen;
use App\Models\LoaiKhoaHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoaiKhoaHocController extends Controller
{
    public function store(LoaiKhoaHocRequestCreate $request)
    {
        $id_chuc_nang = 19; //Thêm mới loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        LoaiKhoaHoc::create([
            'ten_khoa_hoc'         => $request->ten_khoa_hoc,
            'slug_khoa_hoc'        => $request->slug_khoa_hoc,
            'hinh_anh'             => $request->hinh_anh,
            'mo_ta_ngan'           => $request->mo_ta_ngan,
            'tinh_trang'           => $request->tinh_trang,
            'gia_ban'              => $request->gia_ban,
            'gia_goc'              => $request->gia_goc,
        ]);
        return response()->json([
            'status'  => 1,
            'message' => 'Đã thêm mới loại khóa ' . $request->ten_khoa_hoc . ' thành công.'
        ]);
    }
    public function getData()
    {
        $id_chuc_nang = 20; //Lấy dữ liệu loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = LoaiKhoaHoc::get();
        return response()->json([
            'data1' => $data
        ]);
    }
    public function getDataOpen()
    {
        $data = LoaiKhoaHoc::where('tinh_trang', 1)->get();
        return response()->json([
            'data'  => $data
        ]);
    }
    public function destroy(XoaLoaiKhoaHocRequest $request)
    {
        $id_chuc_nang = 21; //Xóa loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        LoaiKhoaHoc::where('id', $request->id)->delete();
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Bạn đã xóa loại khóa ' . $request->ten_khoa_hoc . ' thành công!'
        ]);
    }
    public function update(upDateLoaiKhoaHocRequest $request)
    {
        $id_chuc_nang = 22; //Cập nhật loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        LoaiKhoaHoc::where('id', $request->id)->update([
            'ten_khoa_hoc'         => $request->ten_khoa_hoc,
            'slug_khoa_hoc'        => $request->slug_khoa_hoc,
            'hinh_anh'             => $request->hinh_anh,
            'mo_ta_ngan'           => $request->mo_ta_ngan,
            'tinh_trang'           => $request->tinh_trang,
            'gia_ban'              => $request->gia_ban,
            'gia_goc'              => $request->gia_goc,
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Bạn đã cập nhật loại khóa ' . $request->ten_khoa_hoc . ' thành công'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 23; //Đổi trạng thái loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $loaiKhoaHoc = LoaiKhoaHoc::where('id', $request->id)->first();

        if ($loaiKhoaHoc->tinh_trang == 1) {
            $loaiKhoaHoc->tinh_trang = 0;
            $loaiKhoaHoc->save();
        } else {
            $loaiKhoaHoc->tinh_trang = 1;
            $loaiKhoaHoc->save();
        }
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật loại khóa ' . $request->ten_khoa_hoc . ' thành công'
        ]);
    }

    public function search(Request $request)
    {
        $id_chuc_nang = 24; //Tìm kiếm loại khóa học
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = LoaiKhoaHoc::where('ten_khoa_hoc', 'like', $noi_dung)
            ->orwhere('mo_ta_ngan', 'like', $noi_dung)
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
    public function chiTietKhoaHoc($id)
    {
        $data = LoaiKhoaHoc::where('id', $id)->where('tinh_trang', 1)->first();
        if ($data) {
            return response()->json([
                'status'    => true,
                'data'      => $data
            ]);
        } else {
            return response()->json([
                'status'       => false,
                'message'      => 'Không tìm thấy loại khóa học'
            ]);
        }
    }
}
