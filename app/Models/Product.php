<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_category_id',
        'name',
        'description',
        'buy_price',
        'sell_price',
        'product_image',
    ];

    /**
     * Attribute for 'buy_price_idr'
     *
     * @return void
     */
    public function getBuyPriceIdrAttribute()
    {
        return toRupiah($this->attributes['buy_price']);
    }

    /**
     * Attribute for 'sell_price_idr'
     *
     * @return void
     */
    public function getSellPriceIdrAttribute()
    {
        return toRupiah($this->attributes['sell_price']);
    }

    /**
     * Relation to 'product_categories'
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }
}
