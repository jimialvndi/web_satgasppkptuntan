<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tittle',
        'theme',
        'description',
        'date',
        'thumbnail',
        'location',
        'location_link',
        'regist_link',
        'user_id',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     public function getTanggalIndonesiaAttribute()
    {
        // Mengambil properti created_at, Laravel otomatis mengubahnya menjadi objek Carbon
        // Kemudian kita atur bahasanya ke Indonesia
        return Carbon::parse($this->attributes['date'])
                     ->locale('id_ID')
                     ->translatedFormat('l, d F Y') . '<br>Pukul ' .
               Carbon::parse($this->attributes['date'])
                     ->format('H:i') . ' WIB';
    }
}
