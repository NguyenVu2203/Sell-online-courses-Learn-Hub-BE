<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $table = 'bai_viets';
    protected $fillable = [
        'tieu_de',
        'slug_tieu_de',
        'hinh_anh',
        'mo_ta_ngan',
        'noi_dung',
        'tinh_trang',
    ];
}
