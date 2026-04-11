<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = ['name','slug','description','price', 'quantity', 'category_id','status','image','is_featured','is_top_sell','is_top_rated','views_count'];
    public function category():BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
