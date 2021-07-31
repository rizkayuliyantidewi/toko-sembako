<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id',
        'product_id',
        'sell_price',
        'quantity',
        'discount',
    ];

    /**
     * Attribute for 'final_price'
     *
     * @return void
     */
    public function getFinalPriceAttribute()
    {
        if(!$this->attributes['discount']) {
            return $this->attributes['sell_price'] * $this->attributes['quantity'];
        }

        $discountPrice = ($this->attributes['discount'] / 100) * $this->attributes['sell_price'];
        $priceItem = $this->attributes['sell_price'] - $discountPrice;
        $finalPrice = $priceItem * $this->attributes['quantity'];
        return $finalPrice;
    }

    /**
     * Attribute for 'final_price_idr'
     *
     * @return void
     */
    public function getFinalPriceIdrAttribute()
    {
        return toRupiah($this->getFinalPriceAttribute());
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
     * Attribute for 'discount_percentage'
     *
     * @return void
     */
    public function getDiscountPercentageAttribute()
    {
        if(!$this->attributes['discount']) {
            return 0;
        }

        return $this->attributes['discount'] . '%';      
    }

    /**
     * Relation to 'transactions'
     *
     * @return void
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
     * Relation to 'products'
     *
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
