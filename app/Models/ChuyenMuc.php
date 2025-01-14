<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChuyenMuc extends Model
{
    protected $table = '';

    protected $fillable = [
        'ten_chuyen_muc',
        'slug_chuyen_muc',
        'id_chuyen_muc_cha',
        'tinh_trang',
    ];
}
