<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $primaryKey = "jadwal_id";
    protected $keyType = 'string';

    public $incrementing = true;
    protected $fillable = [
        'jadwal_id',
        'film_id',
        'studio_id',
        'tgl_tayang',
        'wkt_tayang',
        'harga',
        'terpesan',
        'created_at',
        'updated_at'
    ];

    public function studio()
    {
        return $this->belongsTo(Studio::class, 'studio_id');
    }

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }

    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'jadwal_id');
    }
}
