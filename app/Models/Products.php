<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'description',
        'full_description',
        'image',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
    
}