<?php

namespace App\Models\Favorite;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Pivot
{
    use HasFactory;
    use PowerJoins;

    protected $fillable = [
        'user_id','product_id'
    ];
}
