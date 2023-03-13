<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Summary of Product
 */
class Product extends Model
{
    use HasFactory;

    // Special property built into Laravel which allows mass assignment
    protected $fillable = [
        'name',
        'price',
        'description',
        'item_number',
        'image'
    ];

    /**
     * Summary of reviews
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews() {
        return $this->hasMany(Review::class);
    }
}