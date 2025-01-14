<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhanQuyen;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chart()
    {
        $id_chuc_nang = 13; //Thống kê tài chính
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = KhachHang::join('tai_chinhs', 'tai_chinhs.id_khach_hang', 'khach_hangs.id')
            ->select(
                'khach_hangs.id',
                'khach_hangs.ho_va_ten',
                DB::raw(
                    'SUM(tai_chinhs.so_tien_nap) AS tong_tien'
                )
            )
            ->groupBy('khach_hangs.id', 'khach_hangs.ho_va_ten')
            ->get();


        $labels_x = [];
        $data_x   = [];
        foreach ($data as $key => $value) {
            array_push($labels_x, $value->ho_va_ten);
            array_push($data_x,   $value->tong_tien);
        }
        return response()->json([
            'labels_x' => $labels_x,
            'data_x' => $data_x,
        ]);
    }
}
