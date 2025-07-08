<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class artikel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tittle',
        'slug',
        'writer',
        'content',
        'thumbnail',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTanggalIndonesiaAttribute()
    {
        // Mengambil properti created_at, Laravel otomatis mengubahnya menjadi objek Carbon
        // Kemudian kita atur bahasanya ke Indonesia
        return Carbon::parse($this->attributes['created_at'])
                     ->locale('id_ID')
                     ->translatedFormat('l, d F Y');
    }
}
