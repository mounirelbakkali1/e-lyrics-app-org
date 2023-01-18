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
            $statement =$this->connection->prepare("INSERT INTO `songs`(`ID`, `title`, `artist_id`, `album_id`, `lyric`, `annee_de_creation`, `image`) VALUES (null,?,?,?,?,?,?) ");
            $statement->execute(array($args->getTitle(),$args->getArtist()->getId(),$args->getAlbum()->getId(),$args->getLyric(),$args->getAnneDeCreation(),$args->getSongImage()));
        }else throw new \InvalidArgumentException("Opps ! obejct passed is not an instance of Album.");
        $this->connection->commit();
        return $this->connection->lastInsertId();
    }

    public function Update($args): void
    {
        // TODO: Implement Update() method.
    }

    public function delete($args): void
    {
        // TODO: Implement delete() method.
    }

    public function findById($args)
    {
        // TODO: Implement findById() method.
    }

    public function findAll(): array
    {
        return  array();
        // TODO: Implement findAll() method.
    }

    public function countAll(): int
    {
        return 0 ;
        // TODO: Implement countAll() method.
    }
}