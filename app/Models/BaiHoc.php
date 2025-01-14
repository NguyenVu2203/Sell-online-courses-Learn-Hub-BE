<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiHoc extends Model
{
    protected $table = 'bai_hocs';
    protected $fillable = [
        'id_khoa_hoc',
        'tieu_de',
        'bai_hoc_so',
        'link_bai_hoc',
        'is_thu_phi',
        'tinh_trang',
    ];
}
