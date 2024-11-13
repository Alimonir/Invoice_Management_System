<?php declare(strict_types=1);

namespace Invoice\Controller;

use Invoice\RequestInterface;
use Invoice\ResponseInterface;

interface ActionInterface
{
    public function __invoke(RequestInterface $request , ResponseInterface $response): ResponseInterface;
}
/**
 * ActionInterface is used to:
Enforce a standard structure for all controller classes, ensuring they have an __invoke() method and can be called in a consistent way.
Allow controllers to be used interchangeably in the Router, making it easy to add or change controllers without affecting other parts of the application.
Simplify routing logic by enabling controllers to be called as callable objects, thanks to the __invoke() method.
Improve testability by enabling the use of mock controllers that implement ActionInterface.
Prepare for future extensibility by providing a single interface that can be expanded as needed.
 * 
 */