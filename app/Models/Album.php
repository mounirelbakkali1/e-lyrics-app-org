<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;

use const DEFAULT_ALBUM_IMAGE;

class Album
{
    private $id = null;
    private $title;
    private static ArrayCollection $albums ; // for caching purpose
    private $image;


    public function __construct()
    {
        $this->image=DEFAULT_ALBUM_IMAGE;
        //$this->addToAlbumsCollection();
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }





    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }



    public function  addToAlbumsCollection() :void
    {
        self::$albums->set($this->getTitle(),array("title"=>$this->getTitle(),"image"=>$this->getImage(),"lyrics"=>new ArrayCollection()));
    }
    public function addLyricToAlbum(Album $album, Song $lyric){
       self::$albums->get($album->getTitle())->add($lyric->getTitle(),$lyric);
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