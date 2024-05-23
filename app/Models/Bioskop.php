<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bioskop extends Model
{
    use HasFactory;


    protected $table = 'bioskop';

    protected $primaryKey = "bioskop_id";
    protected $keyType = 'string';

    public $incrementing = false;
    protected $fillable = [
        'bioskop_id',
        'nama_bioskop',
        'lokasi',
        'jml_studio',
    ];
}
