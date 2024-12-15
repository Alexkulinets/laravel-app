<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Pivot extends Model
{
    public function category()
    {
        return $this->belongsToMany(Category::class, 'parent_id');
    }
}
