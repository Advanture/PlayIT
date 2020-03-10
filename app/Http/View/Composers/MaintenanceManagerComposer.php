<?php

namespace App\Http\View\Composers;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\View\View;

class MaintenanceManagerComposer
{
    /**
     * @var Application
     */
    private $application;

    /**
     * MaintenanceManagerComposer constructor.
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * @param View $view
     */
    public function compose(View $view): void
    {
        $view->with('maintenanceStatus', $this->application->isDownForMaintenance());
    }
}