<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location_tumbon extends Model
{
    use HasFactory;

    protected $fillable = [
        "zipcode",
        "name_th",
        "name_en",
        "amphure_id"
    ];
}
