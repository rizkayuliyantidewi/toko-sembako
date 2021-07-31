<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trx_id',
        'customer_id',
    ];

    /**
     * Attribute for 'transaction_number'
     *
     * @return void
     */
    public function getTransactionNumberAttribute()
    {
        return "#" . $this->attributes['trx_id'];
    }

    /**
     * Relation to 'customers'
     *
     * @return void
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relation to 'transaction_items'
     *
     * @return void
     */
    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id', 'id');
    }
}
