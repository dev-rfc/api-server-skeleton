<?php

namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;

class ExampleBeforeMiddleware
{
  /**
   * Example middleware invokable class
   *
   * @param  ServerRequest  $request PSR-7 request
   * @param  RequestHandler $handler PSR-15 request handler
   *
   * @return Response
   */
  public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler): Response
  {
    $response = $handler->handle($request);
    $existingContent = (string) $response->getBody();

    $response = new Response();
    $response->getBody()->write('BEFORE' . $existingContent);

    return $response;
  }
}
