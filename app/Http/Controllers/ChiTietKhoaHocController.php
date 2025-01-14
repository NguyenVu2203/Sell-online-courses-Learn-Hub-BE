<?php

namespace App\Http\Controllers;

use App\Models\ChiTietKhoaHoc;
use App\Models\KhachHang;
use App\Models\LoaiKhoaHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChiTietKhoaHocController extends Controller
{
    public function store(Request $request)
    {

        $so_tien_mua = LoaiKhoaHoc::where('id', $request->id_khoa_hoc)->first()->gia_ban;
        $user = Auth::guard('sanctum')->user();
        $check = ChiTietKhoaHoc::where('id_khach_hang',$user->id)
                                ->where('id_khoa_hoc',$request->id_khoa_hoc)
                                ->first();
        if($check){
            return response()->json([
                'status'    =>0,
                'message'   =>'Bạn đã mua khóa học này rồi!'
            ]);
        }
        else{
            if($user->so_du>=$so_tien_mua){
                $KhachHang = KhachHang::where('id',$user->id)->first();
                $KhachHang->so_du = $KhachHang->so_du - $so_tien_mua;
                $KhachHang->save();
                ChiTietKhoaHoc::create([
                    'id_khoa_hoc'       =>$request->id_khoa_hoc,
                    'id_khach_hang'     =>$user->id,
                    'so_tien_mua'       =>$so_tien_mua,
                ]);
                return response()->json([
                    'status'    =>1,
                    'message'   =>'Bạn đã mua khóa học thành công'
                ]);
            }else{
                return response()->json([
                    'status'    =>2,
                    'message'   =>'Bạn không đủ tiền mua'
                ]);
            }
        }
    }
    public function danhSachKhoaHoc()
    {
        $user = Auth::guard('sanctum')->user();
        $data = ChiTietKhoaHoc::select('loai_khoa_hocs.ten_khoa_hoc','loai_khoa_hocs.hinh_anh','khach_hangs.created_at','so_tien_mua')
                                ->join('loai_khoa_hocs','loai_khoa_hocs.id','chi_tiet_khoa_hocs.id_khoa_hoc')
                                ->join('khach_hangs','khach_hangs.id','chi_tiet_khoa_hocs.id_khach_hang')
                                ->where('khach_hangs.id',$user->id)
                                ->get();
        return response()->json([
            'data'  =>$data
        ]);
    }
}
