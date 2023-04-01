<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'subcategory_id', 'product_id'
    ];

}
