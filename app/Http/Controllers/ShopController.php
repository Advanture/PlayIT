<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * @return View
     */
    public function index(): JsonResponse
    {
        $products = Product::where('in_stock', '>', 0)
            ->doesntHave('orders')
            ->orWhereHas('orders', function (Builder $query) {
                $query->where('is_pending', true);
            })
            ->get();

        return response()->json($products);
    }

    /**
     * @param Product $product
     * @param OrderService $orderService
     * @return RedirectResponse
     */
    public function buy(Product $product, OrderService $orderService): JsonResponse
    {
        if (auth()->user()->balance->current_coins >= $product->price){
            $orderService->make(auth()->user(), $product);

            return response()->json(['message' => 'Успешная покупка!']);
        }

        return response()->json(['message' => 'Ошибка! Недостаточно средств!']);
    }
}
