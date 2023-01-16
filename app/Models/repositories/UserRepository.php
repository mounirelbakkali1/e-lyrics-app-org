<?php

namespace App\Models\repositories;
use App\Models\User;

/**
 * @template Entity as User
 */
interface UserRepository
{

    public function addUser(User $user) : void;

    public function UpdateUser(User $user) : void;

    public function deleteUser(int $id) : void;


    /**
     * @return Entity
     */
    public function findById(int $id) : User;


    /**
     * @return Entity[]
     */
    public function findAllUsers() :array;

    public function countAllUsers(): int;

}