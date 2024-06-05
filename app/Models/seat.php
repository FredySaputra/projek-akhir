<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seat extends Model
{
    protected $table = 'seat';

    protected $primaryKey = "id";
    protected $keyType = 'string';


    protected $fillable = [
        'id',
        'nomor_kursi',
        'created_at',
        'updated_at'
    ];

}
