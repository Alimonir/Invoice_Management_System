<?php declare(strict_types=1);

namespace Invoice;

use Invoice\Controller\DashboardController;
use Invoice\Controller\InvoicesController;
use Invoice\Controller\SettingsController;
use Invoice\Controller\pageNotFoundcontroller;

class RoutesList
{
    public function configure(RouterInterface $router): void
    {
        $router->get('/', DashboardController::class);
        $router->get('/invoices', InvoicesController::class);
        $router->get('/settings', SettingsController::class);
        $router->pageNotFound( pageNotFoundcontroller::class);
    }
}