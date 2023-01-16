<?php

namespace App\Models;

class Lyric
{
    private $title;
    private $artist;
    private $album;
    private $parole;
    private $anne_de_creation;
    private $song_image;

    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getArtist()
    {
        return $this->artist;
    }


    public function setArtist($artist): void
    {
        $this->artist = $artist;
    }


    public function getAlbum()
    {
        return $this->album;
    }


    public function setAlbum($album): void
    {
        $this->album = $album;
    }




    public function getParole()
    {
        return $this->parole;
    }

    public function setParole($parole): void
    {
        $this->parole = $parole;
    }

    public function getAnneDeCreation()
    {
        return $this->anne_de_creation;
    }


    public function setAnneDeCreation($anne_de_creation): void
    {
        $this->anne_de_creation = $anne_de_creation;
    }


    public function getSongImage()
    {
        return $this->song_image;
    }

    public function setSongImage($song_image): void
    {
        $this->song_image = $song_image;
    }



}