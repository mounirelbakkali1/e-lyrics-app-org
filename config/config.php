<?php
//site name
use Doctrine\Common\Collections\ArrayCollection;

define('SITE_NAME', 'lyrics-org');

//App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '');

//DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'lyrics-org-db');

//Other Params
define('DEFAULT_ALBUM_IMAGE',file_get_contents('..\public\uploads\images\default_album_image.jpg'));
define('DEFAULT_ARTIST_IMAGE',file_get_contents('..\public\uploads\images\default_artist_image.png'));
define('DEFAULT_ADMIN_IMAGE',file_get_contents('..\public\uploads\images\user_default.png'));
define('DEFAULT_SONG_IMAGE',file_get_contents('..\public\uploads\images\default_song_image.gif'));

// CACH
