<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiKhoaHoc extends Model
{
    protected $table = 'loai_khoa_hocs';
    protected $fillable = [
        'ten_khoa_hoc',
        'slug_khoa_hoc',
        'hinh_anh',
        'mo_ta_ngan',
        'tinh_trang',
        'gia_ban',
        'gia_goc',
    ];
}
