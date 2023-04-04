<?php

namespace App\Models\Products;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProducts extends Pivot
{
    use HasFactory;
    use PowerJoins;

    protected $table = "category_products";

    protected $fillable = [
        'category_id', 'product_id'
    ];


}
