<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;

    protected $fillable = ['no_ktp', 'name', 'date_of_birth', 'email', 'phone', 'description'];

    // public function attributes() {
    //     return [
    //         'no_ktp' => 'No KTP',
    //         'name' => 'Name',
    //         'date_of_birth' => 'Date of Birth',
    //         'email' => 'Email',
    //         'phone' => 'Phone',
    //         'description' => 'Description',
    //     ];
    // }

    public function rentals()
    {
        return $this->hasMany(Rent::class);
    }

    public function returs()
    {
        return $this->hasMany(Retur::class);
    }

    public function penalties()
    {
        return $this->hasMany(Penalty::class);
    }
}
