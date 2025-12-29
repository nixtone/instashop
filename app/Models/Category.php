<?php

namespace App\Models;

use App\Models\Traits\HasFile;
use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    use HasFile;
    use HasSlug;
    use SoftDeletes;

    protected $guarded = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Рекурсивное отношение для дочерних категорий
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Рекурсивное отношение для родительской категории
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'option_categories');
    }
}
