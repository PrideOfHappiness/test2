<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrivingLocation extends Model
{
    use HasFactory;

    protected $table = 'driving';

    protected $fillable = [
        'kode',
        'location',
        'namaFile',
    ];

    public function getLocation()
    {
        switch ($this->location) {
            case 'RHD':
                return 'Right Hand Drive';
            case 'LHD':
                return 'Left Hand Drive';
            case 'MHD':
                return 'Middle Hand Drive';
            default:
                return 'Unknown';
        }
    }
}
