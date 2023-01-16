<?php

namespace App\Models\repositories;

use App\Models\Artist;
use App\Models\User;

/**
 * @extends UserRepository<Artist>
 */

class ArtistRepositoryImpl implements UserRepository
{

    public function addUser(User $user): void
    {

    }

    public function UpdateUser(User $user): void
    {

    }

    public function deleteUser(int $id): void
    {
    }

    public function findById(int $id): User
    {
        $artist = new Artist();
        $artist->setNom("Mounir");
        return $artist;
    }

    public function findAllUsers(): array
    {
        $artist = new Artist();
        $artist->setNom("Mounir");
        $artist2 = new Artist();
        $artist2->setNom("Ahmed");
        return [$artist,$artist2];
    }

    public function countAllUsers(): int
    {
        return 2;
    }
}