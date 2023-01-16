<?php

namespace App\Models\repositories;


use App\Models\Admin;
use App\Models\Artist;
use App\Models\User;
use Config\DBConnection;
use function count;
use function password_verify;
use function var_dump;

/**
 * @extends UserRepository<Admin>
 */
class AdminRepositoryImpl extends LyricsRepositoryImpl implements UserRepository
{
    private $connexion;

    public function __construct()
    {
        $db= new DBConnection();
        $this->connexion = $db->connect();
    }

    public function addUser(User $user): void
    {
        $statement =$this->connexion->prepare("INSERT INTO admins VALUES (null,?,?,?,?) ; ");
        $statement->execute(array($user->getNom(),$user->getPrenom(),$user->getUsername(),$user->getPassword()));
    }

    public function UpdateUser(User $user): void
    {
    }

    public function deleteUser(int $id): void
    {
        $statement = $this->connexion->prepare("DELETE from admins where id=?");
        $statement->execute(array($id));
    }
    public function findById(int $id): User
    {
        $statement = $this->connexion->prepare("SELECT * from admins where id=?");
        $statement->execute(array($id));
        $statement->setFetchMode(\PDO::FETCH_CLASS, Admin::class, array());
        $resultSet = $statement->fetch();
//        var_dump($resultSet);
        return  $resultSet;
    }

    public function findAllUsers(): array
    {
        $statement = $this->connexion->prepare("SELECT * from admins");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function countAllUsers(): int
    {
        $statement = $this->connexion->prepare("SELECT COUNT(*) from admins");
        $statement->execute();
        return $statement->fetch();
    }
    public function authenticate($username , $password , $crfToken){
        $statement = $this->connexion->prepare("select * from admins where username = ? ");
        if($statement->execute(array($username))){
            $resultSet=$statement->fetchAll();
            return $resultSet;
        }
    }
}