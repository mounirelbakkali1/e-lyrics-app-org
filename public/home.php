<?php


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Dashboard</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
        <!-- MDB -->
        <link rel="stylesheet" href="assets/css/mdb.min.css" />
        <!-- Custom styles -->
        <link rel="stylesheet" href="assets/css/admin.css" />
        <link rel="stylesheet" href="assets/css/style.css">


        <!--Regular Datatables CSS-->
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">


    </head>

    <body>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
            <div class="position-sticky">
                <div class="list-group p-2" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active  py-3 mt-3 bg-transparent ripple" id="list-home-list" data-bs-toggle="list" href="#dashboard" role="tab" aria-controls="dashboard">
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                    </a>
                    <a class="list-group-item list-group-item-action py-3 mt-3 bg-transparent ripple " id="list-profile-list" data-bs-toggle="list" href="#music" role="tab" aria-controls="music">
                        <i class="fas fa-music fa-fw me-3"></i><span>Music</span>
                    </a>
                    <a class="list-group-item list-group-item-action py-3 mt-3 bg-transparent ripple" id="list-messages-list" data-bs-toggle="list" href="#artists" role="tab" aria-controls="artists">
                        <i class="fas fa-user fa-fw me-3"></i><span>Artists</span>
                    </a>
                    <a class="list-group-item list-group-item-action py-3 mt-3 bg-transparent ripple" id="list-settings-list" data-bs-toggle="list" href="#albums" role="tab" aria-controls="albums">
                        <i class="fas fa-book-open fa-fw me-3"></i>
                        <span>Albums</span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg  fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                        aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="#">
                    <div style="height: 30px !important;">
                        <img src="uploads/images/logo2.png" height="35" alt="" loading="lazy" />
                    </div>
                   <i class="logo text-light font-weight-lighter" style="font-family: cursive;"> E-Lyrics</i>
                </a>


                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row align-items-center">
                    <!-- Notification dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                           role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">1</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">bla bla</a></li>
                            <li><a class="dropdown-item" href="#">bla bla</a></li>
                            <li>
                                <a class="dropdown-item" href="#">do somthing</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Avatar -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                           id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <p class="text-light me-2 m-0" style="font-family: cursive;"><?= $_SESSION['user']['username']?></p>
                            <?= "<img src = 'data:image/png;base64, " . base64_encode($_SESSION['user']['image']) . "' width = '35px' height = '35px'/>"?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">My profile</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <!--Section: Minimal statistics cards-->
            <section>

                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card text-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div class="align-self-center">
                                        <i class="fas fa-music text-info fa-3x"></i>
                                    </div>
                                    <div class="text-end">
                                        <h3>
                                            <?php echo count($songs) ?>
                                        </h3>
                                        <p class="mb-0">Music</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card text-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <h3 class="text-success"><?php echo count($artists) ?></h3>
                                        <p class="mb-0">Artists</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="far fa-user text-success fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card text-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <h3 class="text-secondary"><?php echo count($albums) ?></h3>
                                        <p class="mb-0">Album</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-book-open text-secondary fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active text-light" id="dashboard" role="tabpanel" aria-labelledby="list-home-list">
                    <?php include_once "../views/music.php"?>
                </div>
                <div class="tab-pane fade" id="music" role="tabpanel" aria-labelledby="list-profile-list">
                    <?php include_once "../views/music.php"?>
                </div>
                <div class="tab-pane fade" id="artists" role="tabpanel" aria-labelledby="list-messages-list">
                    <?php include_once "../views/artists.php"?>
                </div>
                <div class="tab-pane fade" id="albums" role="tabpanel" aria-labelledby="list-settings-list">
                    <?php include_once "../views/albums.php"?>
                </div>
            </div>
        </div>
    </main>

    <!-- MDB -->
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="assets/js/admin.js"></script>

    <!--SWEET aLERT-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-------BS--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--AJAX--->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-----MY SCRIPt----->
    <script type="text/javascript" src="assets/js/main.js"></script>
    <!------DATA TABLES------>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    </body>

    </html>








<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<?php
//
//$repo = new \App\Models\repositories\ArtistRepositoryImpl();
////var_dump($repo->findAllUsers());
//
////var_dump($repo1->findAllUsers());
//$adminCtr  = new \App\Controllers\AdminController();
////
//$newUser = new \App\Models\Admin();
//$newUser->setNom("el bakkali");
//$newUser->setUsername("user@gmail.com");
//$newUser->setPrenom("mounir");
//$newUser->setPassword("12345");
//$newUser->setRole(\App\Models\rule::USER);
//
//$adminCtr->addUser($newUser);

//$albumRepo = new \App\Models\repositories\AlbumRepositoryImpl();
//
//
//$songContr = new \App\Controllers\SongController();
//
//
//$album = new \App\Models\Album();
//$album->setTitle("album 12");
//
//$song = new \App\Models\Song();
//$song->setLyric("bla bla bla");
//$song->setTitle("song 2023");
//$artist = new \App\Models\Artist();
//$artist->setFirstName("Mounir");
//$artist->setLastName("el bakkali");
//$artist->setBiography("java artist");
//$song->setArtist($artist);
//$song->setAlbum($album);
//$song->setAnneDeCreation("2022");
//
//$songContr->addSong($song);
//
////$user = $adminCtr->findUser(4);
////var_dump($user->getUsername());
//
////var_dump($user->getUsername());
//$authentifiedUser = new \App\Models\User();
//$authentifiedUser->setUsername("mounirelbakkali2024");
//$authentifiedUser->setPassword("123456");
//$auth =$adminCtr->authenticate($authentifiedUser,"EUD98EYSHC");
//
//
//echo "<pre>";
//print_r($auth);
//echo "</pre>";
//
//
//
//echo '<img src = "data:image/png;base64,' . base64_encode($authentifiedUser->getImage()) . '" width = "350px" height = "350px"/>'.'<br>'.'<br>';
//
//
?>