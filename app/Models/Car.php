<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'slug',
        'brand_id',
        'price',
        'description',
        'url',
        'fuel',
        'drive_type',
        'mass',
        'doors',
        'seats',
        'hp',
        'top_speed',
        'transmission',
        'gear',
        'type',
        'images',
        'thumbnail',
        'year'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function handleImagePath($imageUrl)
    {
        $imagePath = "storage/" . $imageUrl;
        return $imagePath;
    }
}
