<?php declare(strict_types=1);

namespace Invoice;

use Exception;

class Request implements RequestInterface
{
    private array $server;
    private array $params = [];

    public function __construct()
    {
        $this->server = $_SERVER;
        $this->addParams($this->getQueryparams());
        $this->addParams($_POST);
    }
    private function addParams(array $params): void{
        $this->params = array_merge($this->params,$params);
    }
    public function getServer(string $name): mixed
    {
        return $this->server[$name] ?? null;//check wether we have key or not
    }

    public function getUri(): array
    {
        return parse_url($this->getServer('REQUEST_URI'));
    }

    public function getPath(): string
    {

        $uri = $this->getUri();
        //array(2) { ["path"]=> string(9) "/invoices" ["query"]=> string(20) "invoice_id=123456789" }
        return $uri['path'];
    }

    public function getMethod(): string
    {
        return $this->getServer('REQUEST_METHOD');
    }

    public function getparam(string $name):mixed{
        return $this->params[$name] ?? null;
    }
    public function getParams():array{
        return $this->params;
    }
    public function getQuery():string{
        $uri = $this->getUri();
        if(isset($uri['query'])){
            return $uri['query'];
        }else{
            return "Nothing to Get please check get method";
        }
    }
    public function getQueryparams():array{
        $query = $this->getQuery();
        $params = [];
         parse_str($query, $params);
         return $params;
    }

}