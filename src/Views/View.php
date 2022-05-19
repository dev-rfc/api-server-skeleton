<?php

namespace App\Views;

use Psr\Http\Message\ResponseInterface;

class View
{
  public static function withJson(ResponseInterface $response, array $values): ResponseInterface
  {
    $response->getBody()->write((string)json_encode($values));
    return $response->withHeader('Content-Type', 'application/json');
  }
}
