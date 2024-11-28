<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binh_luan extends Model
{
    use HasFactory;

    protected $table = 'binh_luans';

    protected $fillable = [
        'noi_dung',
        'id_user',
        'id_tt',
        'like',
        'rep',
    ];

    // Mối quan hệ với model User (User có nhiều bình luận)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Mối quan hệ với model TinTuc (TinTuc có nhiều bình luận)
    public function tinTuc()
    {
        return $this->belongsTo(tin_tuc::class, 'id_tt');
    }

    // Mối quan hệ hasMany với chính nó (Bình luận có nhiều trả lời)
    public function replies()
    {
        return $this->hasMany(binh_luan::class, 'rep');
    }

    // Mối quan hệ belongsTo với chính nó (Bình luận có thể là trả lời của bình luận khác)
    public function parentComment()
    {
        return $this->belongsTo(binh_luan::class, 'rep');
    }
}
