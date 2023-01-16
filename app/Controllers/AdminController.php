<?php

namespace App\Controllers;


use App\Models\Admin;
use App\Models\Lyric;
use App\Models\repositories\AdminRepositoryImpl;
use App\Models\User;
use function count;
use function password_verify;

class AdminController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new AdminRepositoryImpl();
    }

    public function addUser(User $user): void
    {
        $this->repository->addUser($user);
    }
    public function findUser($id)
    {
        return $this->repository->findById($id);
    }

    public function UpdateUserPrivilege(User $user): void
    {
        $this->repository->UpdateUser($user);
    }

    public function deleteUser(int $id): void
    {
        $this->repository->deleteUser($id);
    }

    public function getAllUsers(): array
    {
       return $this->repository->findAllUsers();
    }

    public function countAllUsers(): int
    {
        return $this->repository->countAllUsers();
    }
    public function addLyric(Lyric $lyric){
        $this->repository->addLyric($lyric);
    }
    public function updateLyric(Lyric $lyric){
        $this->repository->updateLyric($lyric);
    }
    public function deleteLyric(Lyric $lyric){
        $this->repository->deleteLyricById($lyric);
    }
    public function authenticate($username , $password , $crfToken){
        // call repo to verify credentials
        $resultSet = $this->repository->authenticate($username,$password,$crfToken);
        // generate feedback depend
        $feedBack=array();
        $feedBack['authenticat']=false;
        if(count($resultSet)<=0)$feedBack['message']="username is not part of our records";
        else{
            if(!password_verify($password,$resultSet[0]['password'])) $feedBack['message']="incorrect password";
            else {
                $feedBack['message']="authentication succeful";
                $feedBack['authenticat']=true;
            }
        }
        return $feedBack;
    }


}