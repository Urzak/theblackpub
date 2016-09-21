<?php 
require_once './vendor/autoload.php';
require 'array-var.php';

$loader = new Twig_Loader_Filesystem('./views');
$twig = new Twig_Environment($loader, []);

$params = array(
			'local' => $gallery,
			'global' => $globals
		);

echo $twig->render('gallery.twig',$params);
