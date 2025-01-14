<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BaiVietSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    // Văn Nhân
    public function run(): void
    {
        $startDate  = Carbon::create(2024, 10, 1);
        $endDate    = Carbon::create(2024, 12, 1);
        DB::table('bai_viets')->delete();
        DB::table('bai_viets')->truncate();
        DB::table('bai_viets')->insert([
            [
                'tieu_de' => 'Khám phá thiên nhiên ở Đà Lạt',
                'slug_tieu_de' => 'kham-pha-thien-nhien-da-lat',
                'hinh_anh' => 'https://file.hstatic.net/1000217270/file/ho_tuyen_lam_00e3fdff7857421d8d22df2e0924fa91_grande.jpg',
                'mo_ta_ngan' => 'Đà Lạt, thành phố mộng mơ với rừng thông bạt ngàn và khí hậu mát mẻ.',
                'noi_dung' => 'Đà Lạt là điểm đến lý tưởng cho những ai yêu thích thiên nhiên và muốn tận hưởng không gian yên bình...',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Ẩm thực đường phố Sài Gòn',
                'slug_tieu_de' => 'am-thuc-duong-pho-sai-gon',
                'hinh_anh' => 'https://ipos.vn/wp-content/uploads/2023/07/Am-thuc-duong-pho-sg.png',
                'mo_ta_ngan' => 'Khám phá các món ăn đường phố nổi tiếng ở Sài Gòn.',
                'noi_dung' => 'Sài Gòn được biết đến với nền ẩm thực đường phố phong phú, từ phở, bún bò đến các món nướng và hải sản...',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Những bãi biển đẹp nhất Nha Trang',
                'slug_tieu_de' => 'bai-bien-dep-nhat-nha-trang',
                'hinh_anh' => 'https://vpdt.vietrantour.com.vn/data/upload/2022/0505/tour-du-lich-nha-trang-tu-tp-hcm-01-1639220708.jpg',
                'mo_ta_ngan' => 'Nha Trang nổi tiếng với các bãi biển dài và nước biển trong xanh.',
                'noi_dung' => 'Các bãi biển ở Nha Trang là điểm đến tuyệt vời cho du khách yêu thích biển và thể thao dưới nước...',
                'tinh_trang' => 0,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ],
            [
                'tieu_de' => 'Du lịch Hội An - Phố cổ giữa lòng miền Trung',
                'slug_tieu_de' => 'du-lich-hoi-an-pho-co',
                'hinh_anh' => 'https://i2.ex-cdn.com/crystalbay.com/files/content/2024/06/03/du-lich-hoi-an-1-1542.jpg',
                'mo_ta_ngan' => 'Hội An, di sản văn hóa thế giới với vẻ đẹp cổ kính và yên bình.',
                'noi_dung' => 'Phố cổ Hội An là điểm đến nổi tiếng với kiến trúc độc đáo và nhiều hoạt động văn hóa truyền thống...',
                'tinh_trang' => 1,
                'created_at' => Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp)),
            ]
        ]);
    }
}
