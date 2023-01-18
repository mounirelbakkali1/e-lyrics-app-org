<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Back-Office</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet"/>
</head>
<body>

</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
</html>

















<?php

$repo = new \App\Models\repositories\ArtistRepositoryImpl();
//var_dump($repo->findAllUsers());

//var_dump($repo1->findAllUsers());
$adminCtr  = new \App\Controllers\AdminController();

$newUser = new \App\Models\Admin();
$newUser->setNom("el bakkali");
$newUser->setUsername("mounirelbakkali2024");
$newUser->setPrenom("mounir");
$newUser->setPassword("12345");
$newUser->setRole(\App\Models\rule::USER);

//$adminCtr->addUser($newUser);

$albumRepo = new \App\Models\repositories\AlbumRepositoryImpl();


$songContr = new \App\Controllers\SongController();


$album = new \App\Models\Album();
$album->setTitle("album 1");

$song = new \App\Models\Song();
$song->setLyric("bla bla bla");
$song->setTitle("song 2023");
$artist = new \App\Models\Artist();
$artist->setFirstName("Mounir");
$artist->setLastName("el bakkali");
$artist->setBiography("java artist");
$song->setArtist($artist);
$song->setAlbum($album);
$song->setAnneDeCreation("2022");

$songContr->addSong($song);

//$user = $adminCtr->findUser(4);
//var_dump($user->getUsername());

//var_dump($user->getUsername());
$authentifiedUser = new \App\Models\User();
$authentifiedUser->setUsername("mounirelbakkali2024");
$authentifiedUser->setPassword("123456");
$auth =$adminCtr->authenticate($authentifiedUser,"EUD98EYSHC");


echo "<pre>";
print_r($auth);
echo "</pre>";



echo '<img src = "data:image/png;base64,' . base64_encode($authentifiedUser->getImage()) . '" width = "350px" height = "350px"/>'.'<br>'.'<br>';

?>