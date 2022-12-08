<?php

use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

require __DIR__ . '/../vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals();

### Action

$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = (new HtmlResponse('Hello, ' . $name . '!'))
    ->withHeader('X-Developer', 'ElisDN');

### Sending
$emitter = new SapiEmitter();
$emitter->emit($response);
//header('HTTP/1.0 ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase());
//foreach ($response->getHeaders() as $name => $values) {
//    header($name . ':' . implode(', ', $values));
//}
//echo $response->getBody();
