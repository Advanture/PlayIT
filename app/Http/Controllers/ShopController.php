<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
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
            ->orWhere('in_stock', '>', 0)
            ->whereHas('orders', function (Builder $query) {
                $query->where('is_pending', true);//->where('user_id','<>', auth()->user()->id);;//->whereNotIn('user_id', [auth()->user()->id]);//->where('user_id','<>',auth()->user()->id);
            })
            ->get();

        return response()->json(ProductResource::collection($products));
    }

    /**
     * @param Product $product
     * @param OrderService $orderService
     * @return JsonResponse
     */
    public function buy(Product $product, OrderService $orderService): JsonResponse
    {
        if (auth()->user()->balance->current_coins >= $product->price && auth()->user()->rank->id >= $product->rank->id){
            $orderService->make(auth()->user(), $product);

            return response()->json(['message' => 'Успешная покупка!'], 200);
        }

        return response()->json(['message' => "Ошибка!"], 400);
    }
}
