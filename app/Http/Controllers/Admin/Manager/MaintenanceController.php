<?php

namespace App\Http\Controllers\Admin\Manager;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class MaintenanceController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function switchMode(): RedirectResponse
    {
        if (app()->isDownForMaintenance())
            Artisan::call('up');
        else
            Artisan::call('down');

        return redirect()->back();
    }
}
