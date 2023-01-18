<?php

namespace App\Models;

enum rule
{
    case ADMIN ;
    case USER;
    public function val(): int
    {
        return match($this)
        {
            rule::ADMIN => 1,
            rule::USER=>2
        };
    }
}
