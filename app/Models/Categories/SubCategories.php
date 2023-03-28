<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'name', 'slug'
    ];

    protected $hidden = [
        'status',
    ];

    protected $casts = [
        'status' => 'bool',
    ];

    public function category()
    {
        return $this->hasMany(Categories::class, 'id', 'category_id');
    }
}
