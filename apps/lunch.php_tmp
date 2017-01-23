<?php
// init
require_once './init.php';



// Twig
$loader = new Twig_Loader_Filesystem(DIR . '/templates');
//$twig = new Twig_Environment($loader, array('cache' => DIR . '/twig_cache'));
// 開発用にキャッシュを無効化
$twig = new Twig_Environment($loader, array());


echo $twig->render('lunch/lunch.tpl');
