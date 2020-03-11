<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * @return View
     */
    public function index(): JsonResponse
    {
        $tasks = Task::all()->where('type', '<>', 5);

        return response()->json($tasks);
    }
}
