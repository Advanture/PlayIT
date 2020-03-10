<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @param Order $order
     * @return RedirectResponse
     */
    public function update(Order $order): RedirectResponse
    {
        $order->update(['is_pending' => false]);

        return redirect()->back();
    }
}
