<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}