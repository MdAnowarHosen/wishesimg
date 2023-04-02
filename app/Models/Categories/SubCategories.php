<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'name', 'slug', 'description'
    ];

    protected $hidden = [
        'status',
    ];

    protected $casts = [
        'status' => 'bool',
    ];

    // many to many relationship
    public function products()
    {
        return $this->belongsToMany(Product::class, 'subcat_products','subcategory_id','product_id'); //pivot table,
    }

    public function category()
    {
        return $this->hasMany(Categories::class, 'id', 'category_id');
    }
}
