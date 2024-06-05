<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{

    use HasFactory;

    protected $table = 'tiket';

    protected $primaryKey = "tiket_id";
    protected $keyType = 'string';


    protected $fillable = [
        'tiket_id',
        'user_id',
        'jadwal_id',
        'nomor_kursi',
        'waktu',
        'harga',
        'tgl_pesan'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
