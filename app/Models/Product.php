<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Product extends Model
{
    use HasFactory;
    
    public $timestamps = true; 
    
    protected $table = 'product';

    protected $fillable = [
        'name',
        'price',
        'description',
        'full_description',
        'image',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}