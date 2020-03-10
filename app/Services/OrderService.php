<?php

namespace App\Services;


use App\Events\ProductPurchased;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Auth\Authenticatable;

class OrderService
{
    /**
     * Make order if product not purchased.
     *
     * @param Authenticatable $user
     * @param Product $product
     * @return Order|null
     */
    public function make(Authenticatable $user, Product $product): ?Order
    {
        if (! $this->productAlreadyPurchased($user, $product)) {
            event(new ProductPurchased($user, $product));

            return $user->orders()
                ->where('product_id', $product->id)
                ->first();
        }

        return null;
    }

    /**
     * @param Authenticatable $user
     * @param Product $product
     * @return bool
     */
    private function productAlreadyPurchased(Authenticatable $user, Product $product): bool
    {
        return $user->orders()
            ->where('product_id', $product->id)
            ->exists();
    }
}