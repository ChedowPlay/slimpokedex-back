<?php
namespace App\Domain\Poke\Repository;

use PDO;
use App\Domain\Poke\Model\Poke;
use Domain\Exception;

class PokeDeleteRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function deleteById(int $pokeId): int
  {
    $sql = "DELETE FROM pokemon WHERE id = :id;";

    $statement = $this->connection->prepare($sql);
    $statement->execute(['id' =>$pokeId]);

    return (int) $statement->rowCount();

    return $poke;

  }

}
