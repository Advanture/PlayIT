<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * @return View
     */
    public function index(): JsonResponse
    {
        $news = News::take(5)->latest()
            ->get();

        return response()->json($news);
    }
}
