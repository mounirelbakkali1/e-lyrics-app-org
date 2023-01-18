<?php

namespace App\Controllers;

use App\Models\repositories\AlbumRepositoryImpl;
use App\Models\repositories\ArtistRepositoryImpl;
use App\Models\Song;
use App\Models\repositories\AdminRepositoryImpl;
use App\Models\repositories\SongRepositoryImpl;
use function var_dump;

class SongController
{

    private $songRepository;
    private $albumRepository;
    private $artistRepository;

    public function __construct()
    {
        $this->songRepository = new SongRepositoryImpl();
        $this->albumRepository=new  AlbumRepositoryImpl();
        $this->artistRepository = new ArtistRepositoryImpl();
    }

    /*
   *       Manage Songs
   * */

    public function addSong(Song $song){
        $album_id;
        $artist_id;
        if(empty($song->getAlbum()->getId())){
            $album_id=$this->albumRepository->add($song->getAlbum());     // persist album first
            $song->getAlbum()->setId($album_id);                         //  set the id of persisted album to the song
            //die("err");
        }
        if(empty($song->getArtist()->getId())){
            $artist_id= $this->artistRepository->add($song->getArtist());
            $song->getArtist()->setId($artist_id);
        }
        $this->songRepository->add($song);
    }
    public function updateSong(Song $song){
        $this->songRepository->Update($song);
    }
    public function deleteSong(Song $song){
        $this->songRepository->delete($song);
    }

    public function getAllSongs(): array
    {
        return $this->songRepository->findAll();
    }

    public function countAllSongs(): int
    {
        return $this->songRepository->countAll();
    }

}