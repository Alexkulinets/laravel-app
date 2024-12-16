<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;



class Category extends Model
{
    use HasRecursiveRelationships;

    public function products()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
    

}
