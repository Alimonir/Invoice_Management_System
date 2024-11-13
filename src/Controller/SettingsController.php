<?php declare(strict_types=1);

namespace Invoice\Controller;
use Invoice\RequestInterface;
use Invoice\ResponseInterface;
class SettingsController implements ActionInterface
{
    public function __invoke(RequestInterface $request , ResponseInterface $response): ResponseInterface
    {
        $response->template("page/settings");
        return $response;
        //string(77) "C:\xampp\htdocs\dashboard\InvoiceManagementSystem/templates/page/settings.php"
    }
}