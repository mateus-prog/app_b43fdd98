<?php

namespace App\Repositories\Elouquent;

use App\Models\ProductStock;
use App\Repositories\Contracts\AbstractRepositoryInterface;

class ProductStockRepository extends AbstractRepository implements AbstractRepositoryInterface
{
    protected $model = ProductStock::class;
}
