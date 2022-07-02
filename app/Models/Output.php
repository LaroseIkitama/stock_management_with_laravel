<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Output extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'price',
        'product_id'
    ];
    /**
     * Get the product that owns the output.
     *
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
