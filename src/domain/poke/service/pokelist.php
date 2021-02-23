<?php

namespace App\Domain\Poke\Service;

use App\Domain\Poke\Repository\PokeListRepository;

final class PokeList
{
  private $repository;

  public function __construct(PokeListRepository $repository)
  {
    $this->repository = $repository;
  }

  public function findAll()
    {
      $pokers = $this->repository->findAll();


      return $pokers;
    }

}
