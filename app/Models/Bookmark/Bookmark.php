<?php

namespace App\Models\Bookmark;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookmark extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'user_id','product_id'
    ];

}
