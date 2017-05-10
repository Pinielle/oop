<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 10.05.17
 * Time: 14:20
 */
require_once 'blocks/header.php';
$file = str_replace('/', '', $_SERVER['REDIRECT_URL']) . '.php';

if (is_file($_SERVER['DOCUMENT_ROOT']. $file)) {
    require_once $file;
} else {
    echo '404';
}

require_once 'blocks/footer.php';
