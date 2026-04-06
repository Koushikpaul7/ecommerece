<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    protected $fillable = ['title', 'image', 'status'];
    use SoftDeletes; // Enable soft deletes
}
