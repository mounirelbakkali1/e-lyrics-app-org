<?php

namespace App\Controllers;


use App\Models\Admin;
use App\Models\Song;
use App\Models\repositories\AdminRepositoryImpl;
use App\Models\Person;
use http\Client\Curl\User;
use function count;
use function password_verify;
use function var_dump;

class AdminController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new AdminRepositoryImpl();
    }
    /*
     *       Manage Users
     * */
    public function addUser(Person $user): void
    {
        $this->repository->add($user);
    }

    public function UpdateUserPrivilege(Person $user): void
    {
        $this->repository->Update($user);
    }

    public function deleteUser(int $id): void
    {
        $this->repository->delete($id);
    }

    public function findUser($id)
    {
        return $this->repository->findById($id);
    }


    public function getAllUsers(): array
    {
       return $this->repository->findAll();
    }

    public function countAllUsers(): int
    {
        return $this->repository->countAll();
    }



    public static function authenticate($username,$pwd, $crfToken){
        // generate feedback depend
        $feedBack=array();
        $feedBack['authenticat']= false;
        $resultSet =(new self)->repository->authenticate($username);
        if(count($resultSet)<=0)$feedBack['message']="username is not part of our records";
        else{
            if(!password_verify($pwd,$resultSet[0]['password'])) $feedBack['message']="incorrect password";
            else {
                // TODO: Here need to add srfToken verification

                $feedBack['message']="authentication succeful";
                $feedBack['authenticat']=true;
                $feedBack['user']=$resultSet;
            }
        }
        return $feedBack;
    }


}