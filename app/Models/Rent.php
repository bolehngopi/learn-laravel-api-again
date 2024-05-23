<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'costumer_id',
        'no_car',
        'date_borrow',
        'date_return',
        'down_payment',
        'discount',
        'total'
    ];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }
}
