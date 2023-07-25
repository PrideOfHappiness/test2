<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrivingLocation extends Model
{
    use HasFactory;

    protected $table = 'driving';

    protected $fillable = [
        'location',
    ];
}
