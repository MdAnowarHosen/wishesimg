<?php

namespace App\Models\Frontend\Download;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Download extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'quality'
    ];


}
