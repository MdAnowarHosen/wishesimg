<?php

namespace App\Models\Products;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Uploader extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $fillable = [
        'product_id', 'uploader_id'
    ];
}
