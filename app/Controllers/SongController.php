<?php

namespace App\Controllers;

use App\Models\repositories\AlbumRepositoryImpl;
use App\Models\repositories\ArtistRepositoryImpl;
use App\Models\Song;
use App\Models\repositories\AdminRepositoryImpl;
use App\Models\repositories\SongRepositoryImpl;
use Config\DBConnection;
use Exception;
use PDOException;
use function var_dump;
use const APP_ROOT;

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
        if (empty($song->getAlbum()->getId())) {
            $album_id = $this->albumRepository->add($song->getAlbum());     // persist album first
            $song->getAlbum()->setId($album_id);                         //  set the id of persisted album to the song
        }
        if (empty($song->getArtist()->getId())) {
            $artist_id = $this->artistRepository->add($song->getArtist());
            $song->getArtist()->setId($artist_id);
        }
        $this->songRepository->add($song);
    }
    public function updateSong($args){
        $this->songRepository->Update($args);
    }
    public function deleteSong($id){
        $this->songRepository->delete($id);
    }

    public function getSongById($id){
        //var_dump($id['id']);
        $song=$this->songRepository->findById($id['id']);
        //var_dump($song);
        include_once APP_ROOT.'/public/index.php';
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