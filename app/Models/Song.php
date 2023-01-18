<?php

namespace App\Models;

use const DEFAULT_SONG_IMAGE;

class Song
{
    private $title;
    private $artist;
    private $album;
    private $lyric;
    private $anne_de_creation;
    private $song_image=DEFAULT_SONG_IMAGE;

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




    public function getLyric()
    {
        return $this->lyric;
    }

    public function setLyric($lyric): void
    {
        $this->lyric = $lyric;
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