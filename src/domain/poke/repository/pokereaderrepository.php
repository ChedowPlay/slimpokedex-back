<?php
namespace App\Domain\Poke\Repository;

use PDO;
use App\Domain\Poke\Model\Poke;
use Domain\Exception;

class PokeReaderRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function getPokeById(int $pokeId): Poke
  {
    $sql = "SELECT id, name, element1, element2, gender, age, trainer FROM pokemon WHERE id = :id;";
    $statement = $this->connection->prepare($sql);
    $statement->execute(['id' =>$pokeId]);

    $row = $statement->fetch();

    if(!$row) {
      throw new DomainException(sprintf('Usuário não encontrado: %s', $pokeId));

    }
    $poke = new poke();

    $poke->id = (int) $row['id'];
    $poke->name = (string) $row['name'];
    $poke->element1 = (string) $row['element1'];
    $poke->element2 = (string) $row['element2'];
    $poke->gender = (string) $row['gender'];
    $poke->age = (string) $row['age'];
    $poke->trainer = (string) $row['trainer'];

    return $poke;

  }

}
