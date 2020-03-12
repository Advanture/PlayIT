<?php

namespace App\Http\Controllers;

use App\Http\Resources\TasksResource;
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
        $tasks = TasksResource::collection(Task::all()->where('type', '<>', 5));

        return response()->json($tasks);
    }

    public function special(): JsonResponse
    {
        $tasks = TasksResource::collection(Task::all()->where('type' , 5));

        return response()->json($tasks);
    }
}
