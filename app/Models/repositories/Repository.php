<?php

namespace App\Models\repositories;


interface Repository
{

    public function add($args) : int;

    public function Update($args) : void;

    public function delete($args) : void;

    public function findById($args);

    public function findAll() :array;

    public function countAll(): int;

}