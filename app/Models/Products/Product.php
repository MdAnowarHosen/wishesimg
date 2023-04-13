<?php

namespace App\Models\Products;

use App\Models\Categories\Categories;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories\SubCategories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use PowerJoins;

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
        return $this->belongsToMany(Categories::class, 'category_products','product_id','category_id')->withTimestamps(); //pivot table, that model id,
    }

    // many to many relationship
    public function randCat()
    {
        return $this->belongsToMany(Categories::class, 'category_products','product_id','category_id')->inRandomOrder()->take(1)->withTimestamps(); //pivot table, that model id,
    }

    // many to many relationship
    public function subcategories()
    {
        return $this->belongsToMany(SubCategories::class, 'subcat_products','product_id','subcategory_id')->withTimestamps(); //pivot table, that model id
    }


    // product's bookmarked user
    public function userBookmark()
    {
        return $this->belongsToMany(User::class, 'bookmarks','product_id','user_id')->withTimestamps(); //pivot table, that model id,
    }

    // product's favorites user
    public function userFavorite()
    {
        return $this->belongsToMany(User::class, 'favorites','product_id','user_id')->withTimestamps(); //pivot table, that model id,
    }
}
