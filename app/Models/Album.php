<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;

use const DEFAULT_ALBUM_IMAGE;

class Album
{
    private $title;
    private $lyrics;
    private $image;

    public function __toString(): string
    {
       $_songs = "";
       foreach ($this->lyrics as $song){
           $_songs.=$song->getTitle()."<br>";
       }
       return $_songs;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }


    public function __construct()
    {
        $this->lyrics= new ArrayCollection();
        $this->image=DEFAULT_ALBUM_IMAGE;
        
    }

    public function addSong($song)
    {
        $this->lyrics[] = $song;
    }

    public function getLyrics()
    {
        return $this->lyrics;
    }

    public function setLyrics($lyrics): void
    {
        $this->lyrics = $lyrics;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }



}