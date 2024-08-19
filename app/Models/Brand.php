<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ["name","slug","image"];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function handleImagePath($imageUrl)
    {
        $imagePath = "storage/" . $imageUrl;
        return $imagePath;
    }
}
