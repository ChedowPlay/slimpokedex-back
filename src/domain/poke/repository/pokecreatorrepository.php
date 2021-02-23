<?php
namespace App\Domain\Poke\Repository;

use PDO;

class PokeCreatorRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function insertPoke(array $poke): int
  {
    $row = [
      'name' => $poke['name'],
      'element1' => $poke['element1'],
      'element2' => $poke['element2'],
      'gender' => $poke['gender'],
      'age' => $poke['age'],
      'trainer' => $poke['trainer'],
    ];

    $sql = "INSERT INTO pokemon SET
            name=:name,
            element1=:element1,
            element2=:element2,
            gender=:gender,
            age=:age,
            trainer=:trainer;";

            $this->connection->prepare($sql)->execute($row);

            return (int) $this->connection->lastInsertId();
  }

}
