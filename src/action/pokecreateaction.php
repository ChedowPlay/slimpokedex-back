<?php
namespace App\Action;

use App\Domain\Poke\Service\PokeCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


final class PokeCreateAction
{
 private $pokeCreator;

 public function __construct(PokeCreator $pokeCreator)
 {
    $this->pokeCreator = $pokeCreator;
  }
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
      {
      $data = (array) $request->getParsedBody();

      $pokeId = $this->pokeCreator->createPoke($data);

     $result = [
        'poke_id' => $pokeId
      ];
      $response->getBody()->write((string)json_encode($result));

    return $response
    ->withHeader('Content-Type', 'application/json')
    ->withStatus(201);

    }


}
