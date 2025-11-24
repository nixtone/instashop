<?php

namespace App\Models;

use App\Models\Traits\HasFile;
use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    use HasFile;
    use HasSlug;
    use SoftDeletes;



    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function categories() {
        return $this->belongsTo(Category::class);
    }

    public function options() {
        return $this->belongsToMany(Option::class, 'option_products')->withPivot('value');
    }

}
