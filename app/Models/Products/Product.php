<?php

namespace App\Models\Products;

use App\Models\Categories\Categories;
use App\Models\Categories\SubCategories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','thumbnail','low_quality','medium_quality','high_quality','description','keywords','meta_description'
    ];

    protected $hidden = [
        'status',
    ];

    protected $casts = [
        'status' => 'bool',
    ];

    // many to many relationship
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'category_products','product_id','category_id'); //pivot table, that model id,
    }

    // many to many relationship
    public function subcategories()
    {
        return $this->belongsToMany(SubCategories::class, 'subcat_products','product_id','subcategory_id'); //pivot table, that model id
    }
}
