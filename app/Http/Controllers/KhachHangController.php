<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangDangKyRequest;
use App\Http\Requests\KhachHangDoiMatKhauProfileRequest;
use App\Http\Requests\KhachHangDoiMatKhauRequest;
use App\Http\Requests\layThongTinProfileRequest;
use App\Http\Requests\upDateKhachHangRequest;
use App\Http\Requests\XoaKhachHangRequest;
use App\Models\ChiTietPhanQuyen;
use App\Models\KhachHang;
use App\Models\TaiChinh;
use Google_Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class KhachHangController extends Controller
{
    public function store(KhachHangDangKyRequest $request)
    {

        $hash_active = Str::uuid();
        $khachHang = KhachHang::create([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'password'      => $request->password,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ngay_sinh'     => $request->ngay_sinh,
            'hash_active'   => $hash_active
        ]);
        $data['ho_va_ten'] = $request->ho_va_ten;
        $data['link'] =   'http://localhost:5173/kich-hoat/' . $khachHang->hash_active;

        Mail::to($request->email)->send(new \App\Mail\MasterMail('DZFULLSTACK', 'kich_hoat', $data));
        return response()->json([
            'status'  => 1,
            'message' => 'Bạn Đăng Ký Tài Khoản  ' . $request->email . '  Thành Công'
        ]);
    }
    public function getData()
    {
        $id_chuc_nang = 38; //Lấy dữ liệu khách hàng
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = KhachHang::get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function destroy(XoaKhachHangRequest $request)
    {
        $id_chuc_nang = 15; //Xóa khách hàng
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        KhachHang::where('id', $request->id)->delete();
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Đã xóa khách hàng ' . $request->ten_khoa_hoc . ' thành công'
        ]);
    }
    public function update(upDateKhachHangRequest $request)
    {
        $id_chuc_nang = 16; //Cập nhật khách hàng
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        KhachHang::where('id', $request->id)->update([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'password'      => $request->password,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ngay_sinh'     => $request->ngay_sinh,
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Đã cập nhật khách hàng ' . $request->ten_khoa_hoc . ' thành công'
        ]);
    }
    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 17; //Đổi trạng thái khách hàng
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $khachHang = KhachHang::where('id', $request->id)->first();

        if ($khachHang->is_block == 1) {
            $khachHang->is_block = 0;
            $khachHang->save();
        } else {
            $khachHang->is_block = 1;
            $khachHang->save();
        }
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật khách hàng ' . $request->ho_va_ten . ' thành công'
        ]);
    }
    public function search(Request $request)
    {
        $id_chuc_nang = 18; //Tìm kiếm khách hàng
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = KhachHang::where('ho_va_ten', 'like', $noi_dung)
            ->orwhere('email', 'like', $noi_dung)
            ->orwhere('so_dien_thoai', 'like', $noi_dung)
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
    public function login(Request $request)
    {
        $res = Http::get("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => '6LdlsIwqAAAAAEPuXUxeDHHBwCGZxgJNFB37hYo_',
            'response' => $request->code
        ]);
        if ($res->json()["success"] == true) {
            //Dựa $request->email và $request->password
            $user = KhachHang::where('email', $request->email)
                ->where('password', $request->password)
                ->first();
            if ($user) {
                if ($user->is_active == 0) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Tài khoản chưa được kích hoạt'
                    ]);
                } else {
                    return response()->json([
                        'status'    => 1,
                        'message'   => 'Đăng nhập thành công',
                        'key'       => $user->createToKen('key_khach_hang')->plainTextToken,
                    ]);
                }
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

    public function checkLogin(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if ($user && $user instanceof \App\Models\KhachHang) {
            return response()->json([
                'status' => 1,
                'name'   => $user->ho_va_ten,
                'email'  => $user->email,
            ]);
        }
    }
    public function xacNhanNapTien(Request $request)
    {

        $user = Auth::guard('sanctum')->user();
        $tai_chinh = TaiChinh::create([
            'id_khach_hang' => $user->id,
            'id_nhan_vien'  => 1,
            'so_tien_nap'   => $request->so_tien_nap,
            'kieu_nap'      => \App\Models\TaiChinh::NAP_QUA_BANK,
            'noi_dung_nap'  => 'Nạp tiền qua ngân hàng',
        ]);
        $ma_giao_dich   = "GD_" . (100000 + $tai_chinh->id);
        $tai_chinh->update([
            'hash'  => $ma_giao_dich
        ]);
        return response()->json([
            'status'                 => 1,
            'message'                => "Đã tạo lệnh nạp tiền, vui lòng thanh toán",
            'noi_dung_chuyen_tien'   => $ma_giao_dich,
        ]);
    }
    public function kichHoatTaiKhoan(Request $request)
    {
        $khachHang = KhachHang::where('hash_active', $request->id_khach_hang)->first();
        if ($khachHang) {
            if ($khachHang->is_active) {
                return response()->json([
                    'status'  => 2,
                    'message' => "Tài khoản đã được kích hoạt trước đó",
                ]);
            } else {
                $khachHang->is_active = 1;
                $khachHang->save();
                return response()->json([
                    'status'  => 1,
                    'message' => "Kích hoạt tài khoản thành công",
                ]);
            }
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Tài khoản không tồn tại",
            ]);
        }
    }
    public function logOut()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\KhachHang) {
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
        if ($user && $user instanceof \App\Models\KhachHang) {
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
    public function resultPassword(Request $request)
    {

        $user = KhachHang::where('email', $request->email)->first();
        if ($user) {
            $hash_reset = Str::uuid();
            $user->hash_reset = $hash_reset;
            $user->save();
            $data['ho_va_ten'] = $user->ho_va_ten;
            $data['link'] = 'http://localhost:5173/khach-hang/doi-mat-khau/' . $hash_reset;

            Mail::to($request->email)->send(new \App\Mail\MasterMail('Reset Tài Khoản', 'quen_mat_khau', $data));

            return response()->json([
                'status'  => 1,
                'message' => "Vui lòng kiểm tra email của bạn để reset mật khẩu",
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Tài khoản không tồn tại",
            ]);
        }
    }
    public function changePassword(KhachHangDoiMatKhauRequest $request)
    {

        $user = KhachHang::where('hash_reset', $request->hash_reset)->first();
        if ($user) {
            $user->password = $request->password;
            $user->hash_reset = null;
            $user->save();

            return response()->json([
                'status'  => 1,
                'message' => "Đổi Mật Khẩu Thành Công",
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Mã đổi mật khẩu không tồn tại",
            ]);
        }
    }
    public function changePasswordProfile(KhachHangDoiMatKhauProfileRequest $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\KhachHang) {
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
    public function layThongTinProfile()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\KhachHang) {
            return response()->json([
                'status'  => 1,
                'thong_tin'    => $user,
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Có lỗi xảy ra",
            ]);
        }
    }
    public function thaydoiProfile(layThongTinProfileRequest $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\KhachHang) {
            $user->ho_va_ten = $request->ho_va_ten;
            $user->so_dien_thoai = $request->so_dien_thoai;
            $user->ngay_sinh = $request->ngay_sinh;
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
    public function loginGoogle(Request $request)
    {
        $client = new Google_Client(['client_id' => env('CLIENT_GG')]);
        $payload = $client->verifyIdToken($request->credential);
        if ($payload) {
            $email = $payload['email'];
            $ho_va_ten = $payload['name'];

            $user = KhachHang::where('email', $email)->first();
            if ($user) {
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đăng nhập thành công',
                    'key'       => $user->createToKen('key_khach_hang')->plainTextToken,
                ]);
            } else {
                $khachHang = KhachHang::create([
                    'ho_va_ten'     => $ho_va_ten,
                    'email'         => $email,
                    'password'      => '123456',
                    'so_dien_thoai' => '0123456789',
                    'ngay_sinh'     => '1990-01-01',
                    'is_active'     => 1,
                ]);
                return response()->json([
                    'status'  => 1,
                    'message' => 'Bạn Đăng Ký Tài Khoản  ' . $email . '  Thành Công',
                    'key'       => $khachHang->createToKen('key_khach_hang')->plainTextToken,

                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Có lỗi xảy ra',
            ]);
        }
    }
}
