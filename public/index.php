<?php
// Autoloader
require_once '../vendor/autoload.php';
// Configration loading
require_once '../config/config.php';
// load router
require_once APP_ROOT.'../routes/router.php';

/*
 *
 *
 * Routing
 *
 *
 */


get('/','public/home.php');
//get('/','public/home.php');

any('/404','views/404.php');

//
//
//
//$repo = new \App\Models\repositories\ArtistRepositoryImpl();
////var_dump($repo->findAllUsers());
//
//$repo1 = new \App\Models\repositories\AdminRepositoryImpl();
////var_dump($repo1->findAllUsers());
//$adminCtr  = new \App\Controllers\AdminController();
//$user1 = new \App\Models\User();
//$user1->setNom("el bakkali");
//$user1->setPrenom("Mounir");
//$user1->setUsername("mounirelbakkali1");
//$user1->setPassword(password_hash("12345",CRYPT_MD5));
//$adminCtr->addUser($user1);
//
//$user = $adminCtr->findUser(1);
//var_dump($user);
//var_dump($user->getUsername());
//
//
//$auth =$adminCtr->authenticate("mounirelbakkali1","12345","EUD98EYSHC");
//var_dump($auth);
//
//
//$album = new \App\Models\Album();
//echo '<img src = "data:image/png;base64,' . base64_encode($album->getImage()) . '" width = "350px" height = "350px"/>'.'<br>'.'<br>';
//$song1 = new \App\Models\Lyric();
//$song1->setTitle("song1");
//$song2 = new \App\Models\Lyric();
//$song2->setTitle("song2");
//$album->addSong($song1);
//$album->addSong($song2);
//
//
////var_dump($album);
//
//echo $album;

?>

