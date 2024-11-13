<?php declare(strict_types=1);

namespace Invoice\Controller;
use Invoice\RequestInterface;
use Invoice\ResponseInterface;

class pageNotFoundcontroller implements ActionInterface
{
    public function __invoke(RequestInterface $request , ResponseInterface $response): ResponseInterface
    {
        http_response_code(404);
       $response->template("page/pageNotFound");
        return $response;
    }
}