<?php

namespace App\Models\Products;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubcatProduct extends Pivot
{
    use HasFactory;
    use PowerJoins;

    protected $table = "subcat_products";

    protected $fillable = [
        'subcategory_id', 'product_id'
    ];

}
