<?php
namespace App\Domain\Poke\Repository;

use PDO;

class PokeUpdateRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function updatePoke(array $poke): int
  {
    $row = [
      'id' => $poke['id'],
      'name' => $poke['name'],
      'element1' => $poke['element1'],
      'element2' => $poke['element2'],
      'gender' => $poke['gender'],
      'age' => $poke['age'],
      'trainer' => $poke['trainer'],
    ];

    $sql = "UPDATE pokemon SET
            name=:name,
            element1=:element1,
            element2=:element2,
            gender=:gender,
            age=:age,
            trainer=:trainer
            WHERE id=:id;";

    $statement = $this->connection->prepare($sql);
    $statement->execute($row);

    return (int) $statement->rowCount();
  }
}
