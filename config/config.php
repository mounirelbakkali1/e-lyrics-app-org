<?php
//site name
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
