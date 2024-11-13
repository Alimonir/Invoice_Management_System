<?php declare(strict_types=1);

namespace Invoice;

//my interface to handle html markup and render it
interface ResponseInterface{
    public function template(string $name,array $vars = []): void;//triggerd in our action controller __invoke method
    public function render(): void;//rendering
}