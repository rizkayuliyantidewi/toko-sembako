<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Core\BaseRepository;

class CustomerRepository extends BaseRepository
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
    public function __construct(Customer $customer)
    {
        $this->entity = $customer;
    }
}
