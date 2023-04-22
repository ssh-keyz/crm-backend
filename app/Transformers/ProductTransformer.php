<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    public function transform (Product $product)
    {
        return [
            'name' => (string) $product->name
        ];
    }
}