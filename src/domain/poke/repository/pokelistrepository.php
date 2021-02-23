<?php

namespace App\Domain\Poke\Repository;

use PDO;
use App\Domain\Poke\Model\Poke;

class PokeListRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function findAll()
  {

    $sql = "SELECT id, name, element1, element2, gender, age, trainer FROM pokemon;";

    $statement = $this->connection->prepare($sql);
    $statement->execute();

    $rows = $statement->fetchAll();

    $pokers = [];
    foreach($rows as $row) {
      $poke = new poke();

      $poke->id = (int) $row['id'];
      $poke->name = (string) $row['name'];
      $poke->element1 = (string) $row['element1'];
      $poke->element2 = (string) $row['element2'];
      $poke->gender = (string) $row['gender'];
      $poke->age = (string) $row['age'];
      $poke->trainer = (string) $row['trainer'];

      $pokers[] = $poke;
    }

    return $pokers;

  }
}
