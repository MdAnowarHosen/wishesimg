<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryProducts extends Pivot
{
    use HasFactory;

    protected $table = "category_products";

    protected $fillable = [
        'category_id', 'product_id'
    ];


}
