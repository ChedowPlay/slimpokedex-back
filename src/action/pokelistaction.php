<?php
namespace App\Action;

use App\Domain\Poke\Service\PokeList;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


final class PokeListAction
{
 private $pokeList;

 public function __construct(PokeList $pokeList)
 {
    $this->pokeList = $pokeList;
  }
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
      {

      $pokers = $this->pokeList->findAll();

      $result = [
        'pokers' => $pokers
      ];

      $response->getBody()->write((string)json_encode($result));

      return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(200);

    }

}
