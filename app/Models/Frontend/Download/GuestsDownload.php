<?php

namespace App\Models\Frontend\Download;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestsDownload extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'quality'
    ];
}
