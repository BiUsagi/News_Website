<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danh_muc extends Model
{
    use HasFactory;

    protected $table = 'danh_mucs';

    protected $fillable = [
        'tenDm',
        'hinhAnh',
    ];

    public function tintucs()
    {
        return $this->hasMany(tin_tuc::class, 'idDm');
    }
}
