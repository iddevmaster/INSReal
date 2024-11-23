<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        "listing_id",
        "title",
        "type_id",
        "province",
        "amphure",
        "tumbon",
        "address",
        "description",
        "price",
        "area_size",
        "created_by",
        "status",
        "google_map"
    ];

    public function getType()
    {
        return $this->belongsTo(Property_type::class, 'type_id', 'id');
    }

    public function getProvince()
    {
        return $this->belongsTo(Location_province::class, 'province', 'id');
    }
    public function getAmphure()
    {
        return $this->belongsTo(Location_amphure::class, 'amphure', 'id');
    }
    public function getTumbon()
    {
        return $this->belongsTo(Location_tumbon::class, 'tumbon', 'id');
    }
    public function getStatus()
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }


    public function propImages()
    {
        return $this->hasMany(Property_image::class, 'property_id', 'id');
    }

    public function firstImage()
    {
        $query = $this->propImages();

        return $query->first(["folder", "file_name"]);
    }
}
