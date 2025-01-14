<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaiChinhRequestCreate;
use App\Models\ChiTietPhanQuyen;
use App\Models\KhachHang;
use App\Models\TaiChinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaiChinhController extends Controller
{
    public function napTien(TaiChinhRequestCreate $request ){
        $id_chuc_nang = 35; //Nạp tiền
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $user = Auth::guard('sanctum')->user();
        TaiChinh::create([
            'id_khach_hang' => $request->id,
            'id_nhan_vien'  => $user->id,
            'so_tien_nap'   => $request->so_tien_can_nap,
            'kieu_nap'      => \App\Models\TaiChinh::NAP_BANG_TAY,
            'noi_dung_nap'  => $request->ly_do_nap_tien,
        ]);
        $KhachHang = KhachHang::where('id',$request->id)->first();
        $KhachHang->so_du = $KhachHang->so_du + $request->so_tien_can_nap;
        $KhachHang->save();

        return response()->json([
            'status'    =>1,
            'message'   =>'Đã nạp tiền ' . number_format($request->so_tien_can_nap) . ' thành công'
        ]);
    }
    public function getData()
    {
        $id_chuc_nang = 36; //Lấy dữ liệu tài chính
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = TaiChinh::select('nhan_viens.ho_va_ten as hoten_nv','khach_hangs.ho_va_ten as hoten_kh','khach_hangs.email','tai_chinhs.so_tien_nap','tai_chinhs.kieu_nap','tai_chinhs.noi_dung_nap','tai_chinhs.created_at')
                        ->join('khach_hangs','khach_hangs.id','tai_chinhs.id_khach_hang')
                        ->join('nhan_viens','nhan_viens.id','tai_chinhs.id_nhan_vien')
                        ->get();
        return response()->json([
            'data'  =>$data
        ]);
    }
    public function getDataOnePerson(Request $request)
    {
        $id_chuc_nang = 37; //Lấy dữ liệu tài chính của 1 người
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = TaiChinh::select('nhan_viens.ho_va_ten as hoten_nv','khach_hangs.ho_va_ten as hoten_kh','khach_hangs.email','tai_chinhs.so_tien_nap','tai_chinhs.kieu_nap','tai_chinhs.noi_dung_nap','tai_chinhs.created_at')
                        ->join('khach_hangs','khach_hangs.id','tai_chinhs.id_khach_hang')
                        ->join('nhan_viens','nhan_viens.id','tai_chinhs.id_nhan_vien')
                        ->where('tai_chinhs.id_khach_hang',$request->id)
                        ->get();
        return response()->json([
            'data'  =>$data
        ]);
    }
    public function autoGiaoDich() {
        try {
            $payload = [
                "USERNAME" => "",
                "PASSWORD" => "",
                "DAY_BEGIN" => "13/12/2024",
                "DAY_END" => "26/12/2024",
                "NUMBER_MB" => ""
            ];
            $axios = new \GuzzleHttp\Client();
            $responsive = $axios->post('https://api-mb.dzmid.io.vn/mb', [
                'json' => $payload
            ]);
            $data = json_decode($responsive->getBody()->getContents(), true);

            dd($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
