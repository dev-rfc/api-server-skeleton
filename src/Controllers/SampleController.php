<?php

namespace App\Controllers;

use App\Views\View;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SampleController
{
  public function home(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
  {
    return View::withJson($response, [
      "hello" => "world"
    ]);
  }

  public function listUsers(ServerRequestInterface $request, ResponseInterface $response, int $id): ResponseInterface
  {
    return View::withJson($response, [
      "user_id" => $id
    ]);
  }
}
