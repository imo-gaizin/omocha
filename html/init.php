<?php
// php ini
ini_set('display_errors', 1);

// define
define('DIR','/var/www/mtg');

// define
define('DIR_APPS', DIR . '/apps');
// define
define('DIR_LIBS', DIR . '/libs');
// define
define('DIR_TEMPLATES', DIR . '/templates');

// conposer
require_once DIR . '/vendor/autoload.php';

// セッション処理開始
session_start();
