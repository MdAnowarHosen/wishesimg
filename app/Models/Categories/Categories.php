<?php

namespace App\Models\Categories;

use App\Models\Products\Product;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;
    use PowerJoins;

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

    public function activatedSubCatsAsc()
    {
        return $this->hasMany(SubCategories::class, 'category_id', 'id')->whereStatus(1)->orderBy('name','asc');
    }

    // many to many relationship
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products','category_id','product_id')->withTimestamps(); //pivot table,
    }

    // all subcategories
    public function subCategories()
    {
        return $this->hasMany(SubCategories::class, 'category_id', 'id');
    }
}
