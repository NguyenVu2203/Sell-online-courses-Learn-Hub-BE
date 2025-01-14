<?php

use App\Http\Controllers\BaiHocController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChiTietKhoaHocController;
use App\Http\Controllers\ChiTietPhanQuyenController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiKhoaHocController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\TaiChinhController;
use App\Http\Controllers\TracNghiemController;
use App\Models\ChiTietKhoaHoc;
use App\Models\LoaiKhoaHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/auto-giao-dich', [TaiChinhController::class, 'autoGiaoDich']);

Route::get('/admin/nhan-vien/data', [NhanVienController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/tim-kiem', [NhanVienController::class, 'timKiemNhanVien'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/create', [NhanVienController::class, 'store'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/change-status', [NhanVienController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/update', [NhanVienController::class, 'updateNhanVien'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/delete', [NhanVienController::class, 'deleteNhanVien'])->middleware("nhanVienMiddle");
Route::post('/admin/dang-nhap', [NhanVienController::class, 'login']);
Route::get('/admin/nhan-vien/check-login', [NhanVienController::class, 'checkLogin']);
Route::get('/admin/logout', [NhanVienController::class, 'logOut']);
Route::get('/admin/logout-all', [NhanVienController::class, 'logOutAll']);


Route::post('/admin/nap-tien/create',[TaiChinhController::class,'napTien']);
Route::get('/admin/nap-tien/data',[TaiChinhController::class,'getData']);
Route::post('/admin/nap-tien/data-one',[TaiChinhController::class,'getDataOnePerson']);

Route::post('/admin/loai-khoa-hoc/create', [LoaiKhoaHocController::class, 'store'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/delete', [LoaiKhoaHocController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/update', [LoaiKhoaHocController::class, 'update'])->middleware("nhanVienMiddle");
Route::get('/admin/loai-khoa-hoc/data', [LoaiKhoaHocController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/change-status', [LoaiKhoaHocController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/tim-kiem', [LoaiKhoaHocController::class, 'search'])->middleware("nhanVienMiddle");


Route::get('/admin/khach-hang/data', [KhachHangController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/khach-hang/dang-ky', [KhachHangController::class, 'store']);
Route::post('/khach-hang/dang-nhap', [KhachHangController::class, 'login']);
Route::post('/khach-hang/dang-nhap-google', [KhachHangController::class, 'loginGoogle']);
Route::get('/khach-hang/logout', [KhachHangController::class, 'logOut']);
Route::get('/khach-hang/logout-all', [KhachHangController::class, 'logOutAll']);
Route::post('/khach-hang/quen-mat-khau', [KhachHangController::class, 'resultPassword']);
Route::post('/khach-hang/doi-mat-khau', [KhachHangController::class, 'changePassword']);
Route::get('/khach-hang/lay-thong-tin-profile', [KhachHangController::class, 'layThongTinProfile']);
Route::post('/khach-hang/thay-doi-thong-tin-profile', [KhachHangController::class, 'thaydoiProfile']);
Route::post('/khach-hang/doi-mat-khau-profile', [KhachHangController::class, 'changePasswordProfile']);

Route::get('/admin/lay-thong-tin-profile', [NhanVienController::class, 'layThongTinProfile']);
Route::post('/admin/thay-doi-thong-tin-profile', [NhanVienController::class, 'thaydoiProfile']);
Route::post('/admin/doi-mat-khau-profile', [NhanVienController::class, 'changePasswordProfile']);




Route::post('/khach-hang/kich-hoat-tai-khoan', [KhachHangController::class, 'kichHoatTaiKhoan']);

Route::get('/khach-hang/check-login', [KhachHangController::class, 'checkLogin']);


Route::post('/admin/khach-hang/delete', [KhachHangController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/khach-hang/update', [KhachHangController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/khach-hang/change-status', [KhachHangController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/khach-hang/tim-kiem', [KhachHangController::class, 'search'])->middleware("nhanVienMiddle");

Route::post('/admin/bai-hoc/create', [BaiHocController::class, 'store'])->middleware("nhanVienMiddle");
Route::get('/admin/bai-hoc/data', [BaiHocController::class, 'getdata'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/delete', [BaiHocController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/update', [BaiHocController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/change-status', [BaiHocController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/tim-kiem', [BaiHocController::class, 'search'])->middleware("nhanVienMiddle");

Route::post('/admin/bai-viet/create', [BaiVietController::class, 'store'])->middleware("nhanVienMiddle");
Route::get('/admin/bai-viet/data', [BaiVietController::class, 'getdata'])->middleware("nhanVienMiddle");
Route::get('/bai-viet/data-open', [BaiVietController::class, 'getdataOpen']);
Route::post('/admin/bai-viet/delete', [BaiVietController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-viet/update', [BaivietController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-viet/change-status', [BaivietController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-viet/tim-kiem', [BaivietController::class, 'search'])->middleware("nhanVienMiddle");

Route::post('/admin/trac-nghiem/create', [TracNghiemController::class, 'store'])->middleware("nhanVienMiddle");
Route::get('/admin/trac-nghiem/data', [TracNghiemController::class, 'getdata'])->middleware("nhanVienMiddle");


Route::post('/admin/trac-nghiem/delete', [TracNghiemController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/trac-nghiem/update', [TracNghiemController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/trac-nghiem/change-status', [TracNghiemController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/trac-nghiem/tim-kiem', [TracNghiemController::class, 'search'])->middleware("nhanVienMiddle");


Route::get('/admin/chart/chart-tai-chinh', [ChartController::class, 'chart'])->middleware("nhanVienMiddle");



Route::post('/admin/phan-quyen/create', [PhanQuyenController::class, 'themQuyen'])->middleware("nhanVienMiddle");
Route::get('/admin/phan-quyen/data', [PhanQuyenController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/phan-quyen/delete', [PhanQuyenController::class, 'xoaQuyen'])->middleware("nhanVienMiddle");
Route::post('/admin/phan-quyen/update', [PhanQuyenController::class, 'updateQuyen'])->middleware("nhanVienMiddle");
Route::post('/admin/phan-quyen/tim-kiem', [PhanQuyenController::class, 'search'])->middleware("nhanVienMiddle");

Route::get('/admin/phan-quyen/chi-tiet-chuc-nang/data', [ChucNangController::class, 'getData'])->middleware("nhanVienMiddle");



Route::get('/home-page/loai-khoa-hoc/data-open',[LoaiKhoaHocController::class,'getDataOpen']);
Route::get('/home-page/loai-khoa-hoc/chi-tiet/{id}',[LoaiKhoaHocController::class,'chiTietKhoaHoc']);

Route::get('/home-page/loai-khoa-hoc/danh-sach-khoa-hoc',[ChiTietKhoaHocController::class,'danhSachKhoaHoc'])->middleware("khachHangMiddle");

Route::post('/home-page/mua-khoa-hoc/create', [ChiTietKhoaHocController::class, 'store'])->middleware("khachHangMiddle");

Route::post('/khach-hang/xac-nhan-nap-tien', [KhachHangController::class, 'xacNhanNapTien'])->middleware("khachHangMiddle");

Route::get('/trac-nghiem/data-open', [TracNghiemController::class, 'getdataOpen'])->middleware("khachHangMiddle");

Route::post('/trac-nghiem/nop-bai', [TracNghiemController::class, 'nopBai'])->middleware("khachHangMiddle");

Route::post('/admin/chi-tiet-phan-quyen/create', [ChiTietPhanQuyenController::class, 'store'])->middleware("nhanVienMiddle");
Route::post('/admin/chi-tiet-phan-quyen/data', [ChiTietPhanQuyenController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/chi-tiet-phan-quyen/delete', [ChiTietPhanQuyenController::class, 'xoaChiTietQuyen'])->middleware("nhanVienMiddle");
