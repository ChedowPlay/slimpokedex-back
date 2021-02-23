<?php

namespace App\Domain\Poke\Service;

use App\Domain\Poke\Repository\PokeReaderRepository;
use App\Domain\Poke\Model\Poke;
use App\Exception\ValidationException;

final class PokeReader
{

    private $repository;

    public function __construct(PokeReaderRepository $repository)
    {
      $this->repository = $repository;
    }

    public function getPokeById(int $pokeId): Poke
    {
      if(empty($pokeId)) {
        throw new ValidationException('código do usuário requerido!');
      }

      $poke = $this->repository->getPokeById($pokeId);

      return $poke;

    }

}
