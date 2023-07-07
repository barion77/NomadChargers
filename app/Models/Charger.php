<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charger extends Model
{
    use HasFactory;

    protected $table = 'chargers';
    protected $fillable = ['name', 'address', 'coordinates', 'power', 'price', 'busy'];
}
