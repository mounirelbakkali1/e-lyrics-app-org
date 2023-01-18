<?php

namespace App\Models;

use App\Controllers\AdminController;

class Person
{
 protected $nom;
 protected $prenom;
 protected $username;
 protected $password;
 protected $image;
 protected $role;


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom): void
    {
        $this->nom = $nom;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username): void
    {
        $this->username = $username;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image): void
    {
        $this->image = $image;
    }


    public function getRole()
    {
        return $this->role;
    }


    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function authenticate($crfToken){
        AdminController::authenticate($this,$crfToken);
    }



}
