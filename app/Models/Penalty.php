<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'no_car',
        'total'
    ];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }
}
