<?php 
require_once './vendor/autoload.php';
require 'array-var.php';

$loader = new Twig_Loader_Filesystem('./views');
$twig = new Twig_Environment($loader, []);

$params = array(
			'local' => $reserve,
			'global' => $globals
		);


echo $twig->render('contact.twig',$params);