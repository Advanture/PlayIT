<?php

namespace App\Http\Controllers\Admin\Smm;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $newsList = News::latest()
            ->get();

        return view('admin.smm.index', compact('newsList'));
    }

    /**
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        News::create([
            'title' => request('title'),
            'description' => request('description'),
            'creator_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    /**
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return redirect()->back();
    }
}
