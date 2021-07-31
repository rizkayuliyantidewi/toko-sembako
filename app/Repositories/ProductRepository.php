<?php

namespace App\Repositories;

use App\Models\Product;
use App\Core\BaseRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository
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
    public function __construct(Product $product)
    {
        $this->entity = $product;
    }

    /**
     * Create some new product
     *
     * @param array $attributes
     * @return void
     */
    public function createNewProduct(array $attributes)
    {
        try {
            return DB::transaction(function () use($attributes) {
                if($attributes['description']) {
                    $attributes['description'] = nl2br($attributes['description']);
                }

                $path = $attributes['file']->store('images/products', 'public');
                $fullPath = asset('storage/'.$path);
                $attributes['product_image'] = $fullPath;

                return Product::create($attributes);
            });
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Update some product
     *
     * @param array $attributes
     * @return void
     */
    public function updateProduct($product, array $attributes)
    {
        try {
            return DB::transaction(function () use($attributes, $product) {
                if($attributes['description']) {
                    $attributes['description'] = nl2br($attributes['description']);
                }

                if( isset($attributes['file'])) {
                    $path = $attributes['file']->store('images/products', 'public');
                    $fullPath = asset('storage/'.$path);
                    $attributes['product_image'] = $fullPath;
                }

                return $product->update($attributes);
            });
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get similar products
     *
     * @param Product $product
     * @param integer $limit
     * @return void
     */
    public function similarProducts($product, $limit = 4)
    {
        return Product::where('product_category_id', $product->product_category_id)
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }
}
