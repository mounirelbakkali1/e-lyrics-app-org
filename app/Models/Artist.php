<?php

namespace App\Models;

class Artist extends User
{
    private $biography;

    public function getBiography()
    {
        return $this->biography;
    }

    public function setBiography($biography): void
    {
        $this->biography = $biography;
    }
}