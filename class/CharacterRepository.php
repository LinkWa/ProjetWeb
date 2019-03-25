<?php
class CharacterRepository
{
    private $base;

    public function __construct(PDO $base)
    {
        $this->base = $base;
    }



public function add(Character $character)
    {
        $response = $this->base->prepare('INSERT INTO characters (name, password, hp, ap) VALUES(:name, :password, :hp, :ap)');
        $response->bindValue(':name', $character->getName());
        $response->bindValue(':password', $character->getPassword());
        $response->bindValue(':hp', $character->getHp());
        $response->bindValue(':ap', $character->getAp());

        $response->execute();

        $character->hydrate(['id' => $this->base->lastInsertId()]);
    }

    public function exists(Character $character)
    {
      $reponse = $this->base->prepare('SELECT COUNT(*) FROM characters WHERE name = :name');
      $reponse->bindValue(':name',$character->getName());
      $reponse->execute();

      return (bool) $reponse->fetchColumn();
    }

    public function findByName(string $name)
   {
       $response = $this->base->prepare('SELECT * FROM characters WHERE name = :name');
       $response->bindValue(':name', $name);
       $response->execute();

       return $response->fetch();
   }

  }



?>
