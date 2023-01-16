<?php

namespace App\Models;

class Admin extends User
{
    private $custom;

    public function getCustom()
    {
        return $this->custom;
    }


    public function setCustom($custom): void
    {
        $this->custom = $custom;
    }


}