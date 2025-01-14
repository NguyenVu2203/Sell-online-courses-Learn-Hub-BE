<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietChucNangSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chuc_nangs')->delete();
        DB::table('chuc_nangs')->truncate();
        DB::table('chuc_nangs')->insert([
            ['id' => '1','ten_chuc_nang' => 'Thêm mới bài học'],
            ['id' => '2','ten_chuc_nang' => 'Lấy dữ liệu bài học'],
            ['id' => '3','ten_chuc_nang' => 'Xóa bài học'],
            ['id' => '4','ten_chuc_nang' => 'Cập nhật bài học'],
            ['id' => '5','ten_chuc_nang' => 'Đổi trạng thái bài học'],
            ['id' => '6','ten_chuc_nang' => 'Tìm kiếm bài học'],
            ['id' => '7','ten_chuc_nang' => 'Thêm mới bài viết'],
            ['id' => '8','ten_chuc_nang' => 'Lấy dữ liệu bài viết'],
            ['id' => '9','ten_chuc_nang' => 'Xóa bài viết'],
            ['id' => '10','ten_chuc_nang' => 'Cập nhật bài viết'],
            ['id' => '11','ten_chuc_nang' => 'Đổi trạng thái bài viết'],
            ['id' => '12','ten_chuc_nang' => 'Tìm kiếm bài viết'],
            ['id' => '13','ten_chuc_nang' => 'Thống kê tài chính'],
            ['id' => '14','ten_chuc_nang' => 'Lấy danh sách chức năng'],
            ['id' => '15','ten_chuc_nang' => 'Xóa khách hàng'],
            ['id' => '16','ten_chuc_nang' => 'Cập nhật khách hàng'],
            ['id' => '17','ten_chuc_nang' => 'Đổi trạng thái khách hàng'],
            ['id' => '18','ten_chuc_nang' => 'Tìm kiếm khách hàng'],
            ['id' => '19','ten_chuc_nang' => 'Thêm mới loại khóa học'],
            ['id' => '20','ten_chuc_nang' => 'Lấy dữ liệu loại khóa học'],
            ['id' => '21','ten_chuc_nang' => 'Xóa loại khóa học'],
            ['id' => '22','ten_chuc_nang' => 'Cập nhật loại khóa học'],
            ['id' => '23','ten_chuc_nang' => 'Đổi trạng thái loại khóa học'],
            ['id' => '24','ten_chuc_nang' => 'Tìm kiếm loại khóa học'],
            ['id' => '25','ten_chuc_nang' => 'Lấy dữ liệu nhân viên'],
            ['id' => '26','ten_chuc_nang' => 'Thêm mới nhân viên'],
            ['id' => '27','ten_chuc_nang' => 'Đổi trạng thái nhân viên'],
            ['id' => '28','ten_chuc_nang' => 'Cập nhật nhân viên'],
            ['id' => '29','ten_chuc_nang' => 'Xóa nhân viên'],
            ['id' => '30','ten_chuc_nang' => 'Tìm kiếm nhân viên'],
            ['id' => '31','ten_chuc_nang' => 'Lấy danh sách quyền'],
            ['id' => '32','ten_chuc_nang' => 'Thêm mới quyền'],
            ['id' => '33','ten_chuc_nang' => 'Xóa quyền'],
            ['id' => '34','ten_chuc_nang' => 'Cập nhật quyền'],
            ['id' => '35','ten_chuc_nang' => 'Nạp tiền'],
            ['id' => '36','ten_chuc_nang' => 'Lấy dữ liệu tài chính'],
            ['id' => '37','ten_chuc_nang' => 'Lấy dữ liệu tài chính của 1 người'],
            ['id' => '38','ten_chuc_nang' => 'Lấy dữ liệu khách hàng'],
            ['id' => '39','ten_chuc_nang' => 'Thêm mới trắc nghiệm'],
            ['id' => '40','ten_chuc_nang' => 'Lấy dữ liệu trắc nghiệm'],
            ['id' => '41','ten_chuc_nang' => 'Xóa trắc nghiệm'],
            ['id' => '42','ten_chuc_nang' => 'Cập nhật trắc nghiệm'],
            ['id' => '43','ten_chuc_nang' => 'Đổi trạng thái trắc nghiệm'],
            ['id' => '44','ten_chuc_nang' => 'Tìm kiếm trắc nghiệm'],
            ['id' => '45','ten_chuc_nang' => 'Tìm kiếm quyền'],
            ['id' => '46','ten_chuc_nang' => 'Lấy dữ liệu chi tiết chức năng'],
            ['id' => '47','ten_chuc_nang' => 'Thêm mới chi tiết phân quyền'],
            ['id' => '48','ten_chuc_nang' => 'Xóa chi tiết phân quyền'],
        ]);
    }
}
