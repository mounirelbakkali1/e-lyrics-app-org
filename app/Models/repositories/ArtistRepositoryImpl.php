<?php

namespace App\Models\repositories;

use App\Models\Album;
use App\Models\Artist;
use Config\DBConnection;
use Exception;
use PDOException;

class ArtistRepositoryImpl implements Repository
{
    private $connexion;

    public function __construct()
    {
        $db= new DBConnection();
        $this->connexion = $db->connect();
    }

    public function add($artist): int
    {
        $this->connexion->beginTransaction();
        $lastIdInserted;
        try {
            if($artist instanceof Artist){
                $statement =$this->connexion->prepare("INSERT INTO `artists`( `nom`, `prenom`, `biography`, `image`) VALUES (?,?,?,?)");
                $statement->execute(array($artist->getLastName(),$artist->getFirstName(),$artist->getBiography(),$artist->getImage()));
                $lastIdInserted= $this->connexion->lastInsertId();
            }else throw new \InvalidArgumentException("Opps ! obejct passed is not an instance of an Artist.");
            $this->connexion->commit();
        }catch (PDOException $PDOException) {
            $this->connexion->rollBack();
        }
        return $lastIdInserted;
    }

    public function Update($args): void
    {
        $statement =$this->connection->prepare("UPDATE artists SET ".$args['column']." = ? WHERE id =?;");
        $statement->execute(array($args['data'],$args['id']));
    }

    public function delete($id): void
    {
    }

    public function findById( $id)
    {
        $artist = new Artist();
        $artist->setNom("Mounir");
        return $artist;
    }

    public function findAll(): array
    {
        $artist = new Artist();
        $artist->setNom("Mounir");
        $artist2 = new Artist();
        $artist2->setNom("Ahmed");
        return [$artist,$artist2];
    }

    public function countAll(): int
    {
        return 2;
    }
}