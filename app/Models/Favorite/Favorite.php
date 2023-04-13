<?php

namespace App\Models\Favorite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Favorite extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'user_id','product_id'
    ];
}
