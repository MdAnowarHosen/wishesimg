<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'uploader_id','updater_id','category_id', 'subcategory_id','name','slug','low_quality','medium_quality','high_quality','description','keywords','meta_description'
    ];

    protected $hidden = [
        'status',
    ];

    protected $casts = [
        'status' => 'bool',
    ];
}
