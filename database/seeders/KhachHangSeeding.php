<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhachHangSeeding extends Seeder
{
    public function run(): void
    {
        $startDate  = Carbon::create(2025, 10, 1);
        $endDate    = Carbon::create(2025, 12, 1);
        DB::table('khach_hangs')->delete();
        DB::table('khach_hangs')->truncate();
        DB::table('khach_hangs')->insert([
            [
                'ho_va_ten' => 'Nguyễn Văn Màu',
                'email' => 'nguyenvanmau@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0912522234',
                'so_du' => '5000000',
                'ngay_sinh' => '1995-06-15',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Trần Anh Tuấn',
                'email' => 'trananhtuan@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0964556632',
                'so_du' => '2000000',
                'ngay_sinh' => '2001-01-01',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Hồ Duy Trường',
                'email' => 'hoangduytruong@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0336699882',
                'so_du' => '3000000',
                'ngay_sinh' => '1998-11-23',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Lê Văn Lợi',
                'email' => 'levanloi@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0322333669',
                'so_du' => '5000000',
                'ngay_sinh' => '1992-03-10',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Phạm Thị Minh',
                'email' => 'lethiminh@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0923456789',
                'so_du' => '2500000',
                'ngay_sinh' => '1993-12-12',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Võ Văn Vương',
                'email' => 'vovanvuong@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0923456789',
                'so_du' => '1800000',
                'ngay_sinh' => '1996-04-25',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Nguyễn Thị Hoà',
                'email' => 'nguyenthihoa@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0911223344',
                'so_du' => '3200000',
                'ngay_sinh' => '1994-09-30',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Trần Thị Hương',
                'email' => 'tranthihuong@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0963255899',
                'so_du' => '2700000',
                'ngay_sinh' => '1997-02-18',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ],
            [
                'ho_va_ten' => 'Lý Hữu Tài',
                'email' => 'lyhuutai@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0906255463',
                'so_du' => '2900000',
                'ngay_sinh' => '1999-05-05',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'is_active' => 1,
            ]
        ]);

    }
}
