<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SubcatProduct extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id', 'product_id'
    ];

}
