<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'film';

    protected $primaryKey = 'film_id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'film_id',
        'judul',
        'genre',
        'durasi',
        'tgl_rilis',
        'deskripsi',
        'cover',
    ];

}
