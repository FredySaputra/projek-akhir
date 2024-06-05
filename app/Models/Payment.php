<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';

    protected $primaryKey = "payment_id";
    protected $keyType = 'string';


    protected $fillable = [
        'payment_id',
        'tiket_id',
        'jumlah',
        'tgl_payment'
    ];

    

    public function user()
    {
        return $this->hasMany(User::class, 'tiket_id');
    }
}
