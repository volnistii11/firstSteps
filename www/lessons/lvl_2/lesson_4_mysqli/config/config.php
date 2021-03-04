<?php
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);

/*DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'root');
define('DB', 'test');
define('BIG_IMAGES_DIR', '/images/gallery_img/big/');
define('SMALL_IMAGES_DIR', '/images/gallery_img/small/');

include ROOT_DIR . "/../engine/db.php";
include ROOT_DIR . "/../engine/controller.php";
include ROOT_DIR . "/../engine/functions.php";
include ROOT_DIR . "/../engine/catalog.php";
