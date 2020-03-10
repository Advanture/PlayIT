<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Http\Requests\PromocodeRequest;
use App\Models\Promocode;
use App\Services\PromocodeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromocodeController extends Controller
{
    /**
     * @param PromocodeRequest $request
     * @param PromocodeService $promocodeService
     * @return RedirectResponse
     */
    public function generate(PromocodeRequest $request, PromocodeService $promocodeService): RedirectResponse
    {
        $promocode = $promocodeService->create(
            $request->task, $request->count, auth()->id()
        );

        return redirect()->back()
            ->with('promocode', $promocode->value);
    }
}
