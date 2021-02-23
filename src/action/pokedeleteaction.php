<?php

namespace App\Action;

use App\Domain\Poke\Service\PokeDelete;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class PokeDeleteAction
{
  private $pokeDelete;

  public function __construct(PokeDelete $pokeDelete)
  {
    $this->pokeDelete = $pokeDelete;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response,
    array $args = []                  // <<<<<-------- NAO ESQUECER
    ): ResponseInterface {

      $pokeId = (int) $args['id'];

      $rowCount = $this->pokeDelete->deleteById($pokeId);

      $result = [
        'success' => $rowCount == 1 ? true : false
      ];

      $response->getBody()->write((string)json_encode($result));

      return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(200);

    }
}
