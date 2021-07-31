<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use App\Core\BaseRepository;

class ProductCategoryRepository extends BaseRepository
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
    public function __construct(ProductCategory $productCategory)
    {
        $this->entity = $productCategory;
    }
}
