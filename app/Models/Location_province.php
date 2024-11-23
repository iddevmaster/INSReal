<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location_province extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_th",
        "name_en",
    ];
}
