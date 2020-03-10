<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Models\Order;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $tasks = Task::select(['id', 'title'])
            ->orderBy('title')
            ->get();
        $users = User::select(['id', 'first_name', 'last_name'])
            ->orderBy('first_name')
            ->get();
        $orders = Order::with(['user', 'product'])
            ->where('is_pending', true)
            ->get();

        return view('admin.moder.index', compact(
            'tasks', 'users', 'orders'
        ));
    }
}
