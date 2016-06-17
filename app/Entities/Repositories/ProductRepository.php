<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Speedfreak\Contracts\Repositories\ProductRepository as Contract;
use Speedfreak\Entities\Product;

class ProductRepository implements Contract
{
    public function findById(int $id) : Product
    {
        return Product::findByIdOrFail($id);
    }

    public function findByProductId(string $productId)
    {
        return Product::query()->where('productId', '=', $productId)
            ->first();
    }

    public function delete(int $id) : bool
    {
        return Product::query()->findOrFail($id)->delete();
    }

    public function findByCategoryNameClientProductType(string $categoryName, string $clientProductType) : Collection
    {
        return Product::query()->where('categoryName', '=', $categoryName)
            ->where('productType', '=', $clientProductType)
            ->get();
    }
}