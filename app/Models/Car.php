<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable =[
        "name",
        "slug",
        "brand_id",
        "price",
        "url",
        "description",
        "image"
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function handleImagePath($imageUrl)
    {
        $imagePath = "storage/" . $imageUrl;
        return $imagePath;
    }
}
