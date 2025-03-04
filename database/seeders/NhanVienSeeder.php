<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nhan_viens')->delete();

        DB::table('nhan_viens')->truncate();

        DB::table('nhan_viens')->insert([
            [
                'email'             =>  'nguyenvanvien@gmail.com',
                'password'          =>  '123456',
                'ho_va_ten'         =>  'Nguyễn Văn Viên',
                'so_dien_thoai'     =>  '0356841445',
                'dia_chi'           =>  'Đà Nẵng',
                'tinh_trang'        =>  1,
                'id_quyen'          =>  1,
            ],
            [
                'email'             =>  'nguyenlongvu@gmail.com',
                'password'          =>  '123456',
                'ho_va_ten'         =>  'Nguyễn Long Vũ',
                'so_dien_thoai'     =>  '0914799999',
                'dia_chi'           =>  'Đà Nẵng',
                'tinh_trang'        =>  1,
                'id_quyen'          =>  2,
            ],
        ]);
    }
}
