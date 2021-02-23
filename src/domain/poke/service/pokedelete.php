<?php

namespace App\Domain\Poke\Service;

use App\Domain\Poke\Repository\PokeDeleteRepository;
use App\Domain\Poke\Model\Poke;
use App\Exception\ValidationException;

final class PokeDelete
{

    private $repository;

    public function __construct(PokeDeleteRepository $repository)
    {
      $this->repository = $repository;
    }

    public function deleteById(int $pokeId): int
    {
      if(empty($pokeId)) {
        throw new ValidationException('código do usuário requerido!');
      }

      $rowCount = $this->repository->deleteById($pokeId);

      return $rowCount;

    }

}
