<?php declare(strict_types=1);

namespace Invoice;

use Invoice\Controller\ActionInterface;

interface RouterInterface //we are going to make another class that will provide a list of routes which will be responsible to config router
{
    public function get(string $path, string $callback): void;
    public function dispatch(RequestInterface $request): ActionInterface;
    public function pageNotFound(string $callback): void;
}