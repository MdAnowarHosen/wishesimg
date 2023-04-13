<?php

namespace App\Models\Bookmark;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookmark extends Pivot
{
    use HasFactory;
    use PowerJoins;

    protected $fillable = [
        'user_id','product_id'
    ];

}
