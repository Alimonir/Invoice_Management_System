<?php declare(strict_types=1);

namespace Invoice;

use Exception;

interface RequestInterface
{
    public function getPath(): string;
    public function getMethod(): string;
    public function getparam(string $name):mixed;
    public function getParams():array;
    public function getQuery():string;
    public function getQueryparams():array;
}
/**
 * By creating RequestInterface, you define a "contract" that any class implementing this interface must fulfill. This means that any class that implements RequestInterface must have getPath() and getMethod() methods that return the specified types (string)
 * by type-hinting RequestInterface, the Router doesn’t care about the specific class of the $request object as long as it implements RequestInterface and provides the getPath() and getMethod() methods. This promotes loose coupling, which is a key principle in object-oriented programming.
 * 
 */