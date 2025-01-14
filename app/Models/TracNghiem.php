<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TracNghiem extends Model
{
    protected $table = 'trac_nghiems';

    protected $fillable = [
        'cau_hoi',
        'dap_an_1',
        'dap_an_2',
        'dap_an_3',
        'dap_an_4',
        'dap_an_dung',
        'tinh_trang',
    ];
}
