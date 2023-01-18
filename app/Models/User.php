<?php

namespace App\Models;

use const DEFAULT_ADMIN_IMAGE;

class User extends Person
{
    public function __construct()
    {
        $this->setImage(DEFAULT_ADMIN_IMAGE);
        $this->setRole(rule::USER);
    }
}