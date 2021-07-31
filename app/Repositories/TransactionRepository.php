<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Core\BaseRepository;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionRepository extends BaseRepository
{
    /**
     * Repository property
     *
     * @var Object
     */
    protected $entity;

    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->entity = $transaction;
    }

    /**
     * Create some new transaction
     *
     * @param array $attributes
     * @return void
     */
    public function createNewTransaction(array $attributes)
    {
        try {
            return DB::transaction(function () use($attributes) {
                // 1. Create transaction
                $attributes['trx_id'] = strtoupper(Str::random(10));
                $transaction = Transaction::create($attributes);

                // 2. Get product detail
                $product = Product::where('id', $attributes['product_id'])->first();
                if(!$product) {
                    throw new Exception('Terjadi kesalahan, produk tidak ditemukan.');
                }

                // 3. Create transaction item
                $attributes['sell_price'] = $product->sell_price;
                $attributes['discount'] = $attributes['discount'] ?? 0;
                return $transaction->items()->create($attributes);
            });
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Update some data transaction
     *
     * @param array $attributes
     * @return void
     */
    public function updateTransaction($transaction, array $attributes)
    {
        try {
            return DB::transaction(function () use($attributes, $transaction) {
                // 1. Update transaction
                $transaction->customer_id = $attributes['customer_id'];
                $transaction->save();

                // 2. Get product detail
                $product = Product::where('id', $attributes['product_id'])->first();
                if(!$product) {
                    throw new Exception('Terjadi kesalahan, produk tidak ditemukan.');
                }

                // 3. Update transaction item
                $updateData = [
                    'product_id' => $product->id,
                    'sell_price' => $product->sell_price,
                    'quantity' => $attributes['quantity'],
                    'discount' => $attributes['discount'] ?? 0,
                ];
                return $transaction->items()->update($updateData);
            });
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
