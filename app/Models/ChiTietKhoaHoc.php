<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietKhoaHoc extends Model
{
    protected $table = 'chi_tiet_khoa_hocs';
    protected $fillable = [
        'id_khoa_hoc',
        'id_khach_hang',
        'so_tien_mua',
    ];
}
