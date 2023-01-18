<?php

namespace App\Models\repositories;


use App\Models\Admin;
use App\Models\Person;
use Config\DBConnection;
use function password_hash;
use const PASSWORD_DEFAULT;

/**
 * @extends Repository<Admin>
 */
class AdminRepositoryImpl extends SongRepositoryImpl implements Repository
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = DBConnection::connect();
    }

    public function add($admin): int
    {
        $lastIdInserted;
        $this->connexion->beginTransaction();
        $statement =$this->connexion->prepare("INSERT INTO users VALUES (null,?,?,?,?,?,?) ; ");
        $statement->execute(array($admin->getNom(),$admin->getPrenom(),$admin->getUsername(),password_hash($admin->getPassword(),PASSWORD_DEFAULT),$admin->getImage(),$admin->getRole()->val()));
        $lastIdInserted= $this->connexion->lastInsertId();
        $this->connexion->commit();
        return $lastIdInserted;
    }

    public function Update($admin): void
    {
    }

    public function delete($id): void
    {
        $statement = $this->connexion->prepare("DELETE from users where id=?");
        $statement->execute(array($id));
    }
    public function findById($id)
    {
        $statement = $this->connexion->prepare("SELECT * from users where id=?");
        $statement->execute(array($id));
        $statement->setFetchMode(\PDO::FETCH_CLASS, Person::class, array());
        $resultSet = $statement->fetch();
//        var_dump($resultSet);
        return  $resultSet;
    }

    public function findAll(): array
    {
        $statement = $this->connexion->prepare("SELECT * from users");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function countAll(): int
    {
        $statement = $this->connexion->prepare("SELECT COUNT(*) from users");
        $statement->execute();
        return $statement->fetch();
    }
    public function authenticate($person){
        $statement = $this->connexion->prepare("select * from users where username = ? ");
        if($statement->execute(array($person->getUsername()))){
            $resultSet=$statement->fetchAll();
            return $resultSet;
        }
    }
}