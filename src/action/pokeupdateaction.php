<?php
namespace App\Action;

use App\Domain\Poke\Service\PokeUpdate;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


final class PokeUpdateAction
{
 private $pokeUpdate;

 public function __construct(PokeUpdate $pokeUpdate)
 {
    $this->pokeUpdate = $pokeUpdate;
  }
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
      {
      $data = (array) $request->getParsedBody();

      $rowCount = $this->pokeUpdate->updatePoke($data);

     $result = [
        'success' => $rowCount ==1 ? true : false
      ];
      $response->getBody()->write((string)json_encode($result));

    return $response
    ->withHeader('Content-Type', 'application/json')
    ->withStatus(200);

    }


}
