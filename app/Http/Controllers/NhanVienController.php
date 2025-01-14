<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminDoiMatKhauProfileRequest;
use App\Http\Requests\layThongTinProfileAdminRequest;
use App\Http\Requests\NhanVienCreateRequest;
use App\Http\Requests\NhanVienDeleteRequest;
use App\Http\Requests\NhanVienUpdateRequest;
use App\Models\ChiTietPhanQuyen;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class NhanVienController extends Controller
{
    public function getData()
    {
        $id_chuc_nang = 25; //Lấy dữ liệu nhân viên
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = NhanVien::join('phan_quyens', 'nhan_viens.id_quyen', 'phan_quyens.id')
            ->select('nhan_viens.*', 'phan_quyens.ten_quyen')
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
    public function store(NhanVienCreateRequest $request)
    {
        $id_chuc_nang = 26; //Thêm mới nhân viên
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        NhanVien::create([
            'ho_va_ten' => $request->ho_va_ten,
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'password' => $request->password,
            'dia_chi' => $request->dia_chi,
            'id_quyen' => $request->id_quyen,
            'tinh_trang' => $request->tinh_trang,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Đã tạo mới nhân viên ' . $request->ho_va_ten . ' thành công.',
        ]);
    }
    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 27; //Đổi trạng thái nhân viên
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }

        $nhan_vien = NhanVien::find($request->id);
        if ($nhan_vien) {
            $nhan_vien->tinh_trang = !$nhan_vien->tinh_trang;
        }
        $nhan_vien->save();
        return response()->json([
            'status' => true,
            'message' => 'Admin đã đổi trạng thái ' . $nhan_vien->ho_va_ten . ' thành công ',
        ]);
    }
    public function updateNhanVien(NhanVienUpdateRequest $request)
    {
        $id_chuc_nang = 28; //Cập nhật nhân viên
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        NhanVien::where('id', $request->id)->update([
            'ho_va_ten'      => $request->ho_va_ten,
            'email'          => $request->email,
            'so_dien_thoai'  => $request->so_dien_thoai,
            'dia_chi'        => $request->dia_chi,
            'id_quyen'       => $request->id_quyen,
            'tinh_trang'     => $request->tinh_trang,

        ]);
        return response()->json([
            'status' => true,
            'message' => 'Đã cập nhật thành công'
        ]);
    }
    public function deleteNhanVien(NhanVienDeleteRequest $request)
    {
        $id_chuc_nang = 29; //Xóa nhân viên
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        NhanVien::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Đã xoá thành công'
        ]);
    }
    public function login(Request $request)
    {

        $res = Http::get("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => '6LcGsYwqAAAAAH1QBZe0LLmO9GegR0fHDOMnr3KT',
            'response' => $request->code
        ]);
        if ($res->json()["success"] == true) {
            //Dựa $request->email và $request->password
            $user = NhanVien::where('email', $request->email)
                ->where('password', $request->password)
                ->first();
            if ($user) {
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đăng nhập thành công',
                    'key'       => $user->createToKen('key_admin')->plainTextToken,
                    'name'   => $user->ho_va_ten,
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản hoặc mật khẩu không đúng'
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Mã recaptcha không đúng'
            ]);
        };
    }

    public function timKiemNhanVien(Request $request)
    {
        $id_chuc_nang = 30; //Tìm kiếm nhân viên
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = NhanVien::where('ho_va_ten', 'like', '%' . $request->noi_dung . '%')->get();
        return response()->json([
            'data'   => $data,
        ]);
    }

    public function checkLogin(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if ($user && $user instanceof \App\Models\NhanVien) {
            return response()->json([
                'status' => 1,
            ]);
        }
    }

    public function logOut()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\NhanVien) {
            DB::table('personal_access_tokens')
                ->where('id', $user->currentAccessToken()->id)
                ->delete();
            return response()->json([
                'status'  => 1,
                'message' => "Đăng xuất thành công",
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Có lỗi xảy ra",
            ]);
        }
    }
    public function logOutAll()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\NhanVien) {
            $ds_token = $user->tokens;
            foreach ($ds_token as $key => $value) {
                $value->delete();
            }
            return response()->json([
                'status'  => 1,
                'message' => "Đăng xuất thành công",
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Có lỗi xảy ra",
            ]);
        }
    }

    public function layThongTinProfile()
    {
        $admin = Auth::guard('sanctum')->user();
        if ($admin && $admin instanceof \App\Models\NhanVien) {
            $data = NhanVien::join('phan_quyens', 'nhan_viens.id_quyen', 'phan_quyens.id')
                ->select('nhan_viens.*', 'phan_quyens.ten_quyen')
                ->where('nhan_viens.id', $admin->id)
                ->first();
            return response()->json([
                'status'  => 1,
                'thong_tin'    => $data,
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Có lỗi xảy ra",
            ]);
        }
    }
    public function thaydoiProfile(layThongTinProfileAdminRequest $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\NhanVien) {
            $user->ho_va_ten = $request->ho_va_ten;
            $user->so_dien_thoai = $request->so_dien_thoai;
            $user->dia_chi = $request->dia_chi;
            $user->save();
            return response()->json([
                'status'  => 1,
                'message' => "Thay Đổi Thông Tin Thành Công",
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Có lỗi xảy ra",
            ]);
        }
    }
    public function changePasswordProfile(AdminDoiMatKhauProfileRequest $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\NhanVien) {
            if ($request->old_password != $user->password) {
                return response()->json([
                    'status'  => 0,
                    'message' => "Mật khẩu cũ không đúng",
                ]);
            }
            $user->password = $request->new_password;
            $user->save();
            return response()->json([
                'status'  => 1,
                'message' => "Đổi Mật Khẩu Thành Công",
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Có lỗi xảy ra",
            ]);
        }
    }
}
