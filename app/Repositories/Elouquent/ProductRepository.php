<?php

namespace App\Repositories\Elouquent;

use App\Models\Product;
use App\Repositories\Contracts\AbstractRepositoryInterface;

class ProductRepository extends AbstractRepository implements AbstractRepositoryInterface
{
    protected $model = Product::class;
}
