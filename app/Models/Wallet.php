<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallet';

    protected $primaryKey = "wallet_id";
    protected $keyType = 'string';


    protected $fillable = [
        'wallet_id',
        'amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
