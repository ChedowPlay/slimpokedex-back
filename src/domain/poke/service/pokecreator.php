<?php

namespace App\Domain\Poke\Service;

use App\Domain\Poke\Repository\PokeCreatorRepository;
use App\Exception\ValidationException;

final class PokeCreator
{
  private $repository;

  public function __construct(PokeCreatorRepository $repository)
  {
    $this->repository = $repository;
  }

  public function createPoke(array $data): int
  {
    $this->validateNewPoke($data);

    $pokeId = $this->repository->insertPoke($data);

    return $pokeId;
  }

  private function validateNewPoke(array $data): void
  {
    $erros = [];

    if(empty($data['name']))
    {
      $errors ['name'] = "Precisa de Nome";
    }
    if($errors)
    {
      throw new ValidationException("Verficar dados digitados".$errors);
    }

  }





}
