<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $table = 'studio';

    protected $primaryKey = "studio_id";
    protected $keyType = 'string';

    public $incrementing = false;
    protected $fillable = [
        'studio_id',
        'bioskop_id',
        'nama_studio',
        'kap_kursi',
        'created_at',
        'updated_at'
    ];

    public function bioskop()
    {
        return $this->belongsTo(Bioskop::class, 'bioskop_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'studio_id');
    }
}
