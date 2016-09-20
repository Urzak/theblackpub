<?php 
require_once './vendor/autoload.php';
require_once 'array-var.php';

$loader = new Twig_Loader_Filesystem('./views');
$twig = new Twig_Environment($loader, []);

$params = array(
			'local' => $home,
			'global' => $globals
		);

echo $twig->render('boutique.twig');