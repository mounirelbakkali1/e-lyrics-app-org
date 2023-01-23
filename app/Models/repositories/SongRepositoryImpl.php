<?php

namespace App\Models\repositories;


use App\Models\Album;
use App\Models\Song;
use Config\DBConnection;

class SongRepositoryImpl implements Repository
{

    private $connection ;

    public function __construct()
    {
        $this->connection=DBConnection::connect();
    }


    public function add($args): int
    {
        $this->connection->beginTransaction();
        if($args instanceof Song){
            $statement =$this->connection->prepare("INSERT INTO `songs`(`ID`, `title`, `artist_id`, `album_id`, `lyric`, `anneeDeCreation`, `image`) VALUES (null,?,?,?,?,?,?) ");
            $statement->execute(array($args->getTitle(),$args->getArtist()->getId(),$args->getAlbum()->getId(),$args->getLyric(),$args->getAnneDeCreation(),$args->getSongImage()));
        }else throw new \InvalidArgumentException("Opps ! obejct passed is not an instance of Album.");
        $this->connection->commit();
        return $this->connection->lastInsertId();
    }

    public function Update($args): void
    {
        $statement =$this->connection->prepare("UPDATE songs SET ".$args['column']." = ? WHERE id =?;");
        $statement->execute(array($args['data'],$args['id']));
    }

    public function delete($id): void
    {
        $statement =$this->connection->prepare("DELETE FROM songs WHERE id =?;");
        $statement->execute(array($id));
    }

    public function findById($args)
    {
        $statement =$this->connection->prepare("Select * from songs where id = ?");
        $statement->execute(array($args));
        return $statement->fetchAll();
    }

    public function findAll(): array
    {
        $statement =$this->connection->prepare("Select songs.*,art.prenom as artist , art.image as artist_image , albums.title as album ,albums.image as album_image from songs inner join artists as art on songs.artist_id=art.id inner join albums on songs.album_id = albums.id");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function countAll(): int
    {
        return 0 ;
    }
}