<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;

    protected $fillable = [
        'costumer_id',
        'no_car',
        'id_penalties',
        'date_borrow',
        'date_return',
        'discount',
        'total'
    ];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }
}
