<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Tanggapan extends Model
{
    use HasFactory;
    protected $table = 'tanggapans';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function pengaduan()
    {
        return $this->belongsTo('App\Models\Pengaduan');
    }

    public function getTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])->translatedFormat('l, d F Y');
    }
}
