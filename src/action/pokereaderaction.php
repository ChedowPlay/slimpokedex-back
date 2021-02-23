<?php
namespace App\Action;

use App\Domain\Poke\Service\PokeReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


final class PokeReaderAction
{
 private $pokeReader;

 public function __construct(PokeReader $pokeReader)
 {
    $this->pokeReader = $pokeReader;
  }
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
      {
        $pokeId = (int) $args['id'];

        $poke = $this->pokeReader->getPokeById($pokeId);

     $result = [
        'poke_id' => $poke->id,
        'name' => $poke->name,
        'element1' => $poke->element1,
        'element2' => $poke->element2,
        'gender' => $poke->gender,
        'age' => $poke->age,
        'trainer' => $poke->trainer,
      ];
      $response->getBody()->write((string)json_encode($result));

    return $response
    ->withHeader('Content-Type', 'application/json')
    ->withStatus(200);

    }


}
