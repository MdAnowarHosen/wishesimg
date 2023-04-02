<?php

namespace App\Models\Categories;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    protected $hidden = [
        'status',
    ];

    protected $casts = [
        'status' => 'bool',
    ];
    public function ActivatedSubCategories()
    {
        return $this->hasMany(SubCategories::class, 'category_id', 'id')->whereStatus(1);
    }

    // many to many relationship
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products','category_id','product_id'); //pivot table,
    }

    // all subcategories
    public function subCategories()
    {
        return $this->hasMany(SubCategories::class, 'category_id', 'id');
    }
}
