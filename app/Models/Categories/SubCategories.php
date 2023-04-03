<?php

namespace App\Models\Categories;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategories extends Model
{
    use HasFactory;
    use PowerJoins;

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
        return $this->belongsToMany(Product::class, 'subcat_products','subcategory_id','product_id')->withTimestamps(); //pivot table,
    }

    public function category()
    {
        return $this->hasMany(Categories::class, 'id', 'category_id');
    }
}
