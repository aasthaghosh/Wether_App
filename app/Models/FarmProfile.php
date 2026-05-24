<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmProfile extends Model
{
    protected $fillable = [
        'user_id',
        'location',
        'field_size',
        'primary_crop',
        'soil_type',
    ];
}
