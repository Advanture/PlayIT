<?php

namespace App\Http\Controllers\Admin\Manager;

use App\Models\User;
use App\Services\UserService;
use App\Utils\UserManagerUtil;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return View
     */
    public function index(User $user): View
    {
        $userManagerUtil = new UserManagerUtil($user);

        return view('admin.manager.user', [
            'user' => $user,
            'userUtil' => $userManagerUtil
        ]);
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function ban(User $user): RedirectResponse
    {
        $user->update(['is_banned' => (! $user->is_banned)]);

        return redirect()->back();
    }

    /**
     * @param User $user
     * @param UserService $userService
     * @return RedirectResponse
     */
    public function editRole(User $user, UserService $userService): RedirectResponse
    {
        $role = \request('role');

        $userService->resetRole($user, $role);

        return redirect()->back();
    }
}
