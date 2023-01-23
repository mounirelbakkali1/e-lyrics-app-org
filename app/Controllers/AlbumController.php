<?php

namespace App\Controllers;

use App\Models\Album;
use App\Models\repositories\AlbumRepositoryImpl;
use App\Models\repositories\SongRepositoryImpl;
use App\Models\Song;
use function var_dump;

class AlbumController
{
    private $albumRepository;

    public function __construct()
    {
        $this->albumRepository = new AlbumRepositoryImpl();
    }

    /*
   *       Manage Albums
   * */
    public function addAlbum(Album $album){
        return $this->albumRepository->add($album);
    }
    public function updateAlbum(Album $album){
        $this->albumRepository->Update($album);
    }
    public function deleteAlbum(Album $album){
        $this->albumRepository->delete($album);
    }

    public function getAllAlbums(): array
    {
        return $this->albumRepository->findAll();
    }

    public function countAllAlbums(): int
    {
        return $this->albumRepository->countAll();
    }
}