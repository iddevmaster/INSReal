<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_image extends Model
{
    use HasFactory;

    protected $fillable = [
        "property_id",
        "folder",
        "file_name",
        "originalName",
        "type",
        "size_kb",
        "extension",
        "created_by",
    ];
}
