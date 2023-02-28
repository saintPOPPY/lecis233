<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Special property built into Laravel which allows mass assignment
    protected $fillable = [
        'content',
        'rating',
        'product_id',
    ];

    public function review() {
        return $this->belongsTo(Product::class);
    }
}