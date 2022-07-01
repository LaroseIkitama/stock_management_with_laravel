<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the product.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the product.
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
