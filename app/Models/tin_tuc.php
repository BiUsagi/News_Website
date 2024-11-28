<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tin_tuc extends Model
{
    use HasFactory;

    protected $table = 'tin_tucs';

    protected $fillable = [
        'tieuDe',
        'tomTat',
        'noiDung',
        'hinhAnh',
        'idDm',
        'ngayDang',
    ];


    // Mối quan hệ Many-to-One với DanhMuc
    public function danhMuc()
    {
        return $this->belongsTo(danh_muc::class, 'idDm');
    }

    public function binhLuans()
    {
        return $this->hasMany(binh_luan::class, 'id_tt');
    }
}
