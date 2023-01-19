<?php

namespace App\Models\repositories;

use App\Models\Admin;
use App\Models\Album;
use Config\DBConnection;
use Exception;
use http\Exception\InvalidArgumentException;
use PDOException;
use function call_user_func;
use const U_ILLEGAL_ARGUMENT_ERROR;

class AlbumRepositoryImpl implements Repository
{
    private $connexion ;

    public function __construct()
    {
        $this->connexion=DBConnection::connect();
    }


    public function add($album): int
    {
        $this->connexion->beginTransaction();
        $lastIdInserted;
        if($album instanceof Album){
            try{
                $statement =$this->connexion->prepare("INSERT INTO albums VALUES (null,?,?) ; ");
                $statement->execute(array($album->getTitle(),$album->getImage()));
                $lastIdInserted= $this->connexion->lastInsertId();
                $this->connexion->commit();
            }catch (PDOException $e){
                $this->connexion->rollBack();
            }
        }else throw new \InvalidArgumentException("Opps ! obejct passed is not an instance of Album.");
        return $lastIdInserted;

    }

    public function Update($album): void
    {
        if ($album instanceof Album) {

        }else throw new \InvalidArgumentException("Opps ! obejct passed to update is not an instance of Album.");

    }
    public function delete($id): void
    {
        $statement = $this->connexion->prepare("DELETE from albums where id=?");
        $statement->execute(array($id));
    }
    public function findById($id)
    {
        $statement = $this->connexion->prepare("SELECT * from albums where id=?");
        $statement->execute(array($id));
        $statement->setFetchMode(\PDO::FETCH_CLASS, Admin::class, array());
        $resultSet = $statement->fetch();
//        var_dump($resultSet);
        return  $resultSet;
    }

    public function findAll(): array
    {
        $statement = $this->connexion->prepare("SELECT * from albums");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function countAll(): int
    {
        $statement = $this->connexion->prepare("SELECT COUNT(*) from albums");
        $statement->execute();
        return $statement->fetch();
    }
}