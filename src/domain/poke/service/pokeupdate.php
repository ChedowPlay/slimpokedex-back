<?php

namespace App\Domain\Poke\Service;

use App\Domain\Poke\Repository\PokeUpdateRepository;
use App\Exception\ValidationException;

final class PokeUpdate
{
  private $repository;

  public function __construct(PokeUpdateRepository $repository)
  {
    $this->repository = $repository;
  }

  public function updatePoke(array $data): int
  {
    $this->validateNewPoke($data);

    $rowCount = $this->repository->updatePoke($data);

    return $rowCount;
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
