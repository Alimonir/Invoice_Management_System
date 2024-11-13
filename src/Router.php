<?php declare(strict_types=1);

namespace Invoice;

use Exception;
use Invoice\Controller\ActionInterface;

class Router implements RouterInterface
{
    private const HTTP_GET = 'GET';
    private string $pageNotFound;

    public function __construct(private array $routes = []) {}

    public function get(string $path, string $callback): void
    {
        $this->routes[self::HTTP_GET][$path] = $callback;//to set HTTP_GET
    }

    public function pageNotFound(string $callback): void{
        $this->pageNotFound = $callback;
    }

    public function dispatch(RequestInterface $request): ActionInterface //to relate request with action
    {
        // Retrieve the path and method from the request
        $path = $request->getPath();
        $method = $request->getMethod();
        // Find the matching route
        $callback = $this->routes[$method][$path] ?? $this->pageNotFound;
        
        if (!$callback) {
            throw new Exception('Not Found' , 404);
        }
        
        return new $callback();
    }
    

}