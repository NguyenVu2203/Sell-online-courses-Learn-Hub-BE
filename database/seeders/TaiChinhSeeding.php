<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaiChinhSeeding extends Seeder
{

    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('tai_chinhs')->delete();

        DB::table('tai_chinhs')->truncate();

        DB::table('tai_chinhs')->insert([
            // Khách hàng 1
            [
                'id_khach_hang' => 1,
                'id_nhan_vien' => 1,
                'so_tien_nap' => 400000,
                'kieu_nap' => 1, // NAP_BANG_TAY
                'noi_dung_nap' => 'Nạp tiền bằng tay',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_khach_hang' => 1,
                'id_nhan_vien' => 2,
                'so_tien_nap' => 600000,
                'kieu_nap' => 0, // NAP_QUA_BANK
                'noi_dung_nap' => 'Nạp tiền qua ngân hàng',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            // Khách hàng 2
            [
                'id_khach_hang' => 2,
                'id_nhan_vien' => 1,
                'so_tien_nap' => 1000000,
                'kieu_nap' => 0, // NAP_QUA_BANK
                'noi_dung_nap' => 'Nạp tiền qua ngân hàng',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_khach_hang' => 2,
                'id_nhan_vien' => 2,
                'so_tien_nap' => 1000000,
                'kieu_nap' => 1, // NAP_BANG_TAY
                'noi_dung_nap' => 'Nạp tiền bằng tay',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            // Khách hàng 3
            [
                'id_khach_hang' => 3,
                'id_nhan_vien' => 1,
                'so_tien_nap' => 1500000,
                'kieu_nap' => 1, // NAP_BANG_TAY
                'noi_dung_nap' => 'Nạp tiền bằng tay',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_khach_hang' => 3,
                'id_nhan_vien' => 2,
                'so_tien_nap' => 1500000,
                'kieu_nap' => 0, // NAP_QUA_BANK
                'noi_dung_nap' => 'Nạp tiền qua ngân hàng',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            // Khách hàng 4
            [
                'id_khach_hang' => 4,
                'id_nhan_vien' => 1,
                'so_tien_nap' => 2000000,
                'kieu_nap' => 0, // NAP_QUA_BANK
                'noi_dung_nap' => 'Nạp tiền qua ngân hàng',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_khach_hang' => 4,
                'id_nhan_vien' => 2,
                'so_tien_nap' => 3000000,
                'kieu_nap' => 1, // NAP_BANG_TAY
                'noi_dung_nap' => 'Nạp tiền bằng tay',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            // Khách hàng 5
            [
                'id_khach_hang' => 5,
                'id_nhan_vien' => 1,
                'so_tien_nap' => 500000,
                'kieu_nap' => 1, // NAP_BANG_TAY
                'noi_dung_nap' => 'Nạp tiền bằng tay',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_khach_hang' => 5,
                'id_nhan_vien' => 2,
                'so_tien_nap' => 500000,
                'kieu_nap' => 0, // NAP_QUA_BANK
                'noi_dung_nap' => 'Nạp tiền qua ngân hàng',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            // Các khách hàng từ 6 đến 10
            [
                'id_khach_hang' => 6,
                'id_nhan_vien' => 1,
                'so_tien_nap' => 4000000,
                'kieu_nap' => 0, // NAP_QUA_BANK
                'noi_dung_nap' => 'Nạp tiền qua ngân hàng',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_khach_hang' => 7,
                'id_nhan_vien' => 2,
                'so_tien_nap' => 3000000,
                'kieu_nap' => 1, // NAP_BANG_TAY
                'noi_dung_nap' => 'Nạp tiền bằng tay',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_khach_hang' => 8,
                'id_nhan_vien' => 1,
                'so_tien_nap' => 3500000,
                'kieu_nap' => 0, // NAP_QUA_BANK
                'noi_dung_nap' => 'Nạp tiền qua ngân hàng',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_khach_hang' => 9,
                'id_nhan_vien' => 2,
                'so_tien_nap' => 2000000,
                'kieu_nap' => 1, // NAP_BANG_TAY
                'noi_dung_nap' => 'Nạp tiền bằng tay',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'id_khach_hang' => 10,
                'id_nhan_vien' => 1,
                'so_tien_nap' => 4500000,
                'kieu_nap' => 0, // NAP_QUA_BANK
                'noi_dung_nap' => 'Nạp tiền qua ngân hàng',
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
                'updated_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
        ]);
    }
}
