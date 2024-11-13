<?php declare(strict_types=1);

namespace Invoice\Controller;
use Invoice\RequestInterface;
use Invoice\ResponseInterface;
use Invoice\Entity\InvoiceRepository;
class InvoicesController implements ActionInterface
{
    public function __invoke(RequestInterface $request , ResponseInterface $response): ResponseInterface
    {
        $invoices = (new InvoiceRepository())->load();
        //var_dump($request->getParams());
        //array(2) { ["invoice_id"]=> string(5) "12398" ["title"]=> string(11) ""invoice 1"" }
        $response->template("page/invoices",
        ["title"=>"Invoices",
        "invoices"=> $invoices
            
            //will use created array from mysql and config
            
            ]);
        //"invoice_id"=> (int) $request->getparam("invoice_id")]
        return $response;
    }
}