<?php

namespace App\Http\Controllers\Admin\Manager;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.manager.index');
    }

    /**
     * @return RedirectResponse
     */
    public function search(): RedirectResponse
    {
        $id = \request('id');

        try {
            $user = User::where('vk_id', $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }

        return redirect()->route('admin.manager.user', ['user' => $user]);
    }
}
