<?php 
require_once './vendor/autoload.php';
require 'array-var.php';

$loader = new Twig_Loader_Filesystem('./views');
$twig = new Twig_Environment($loader, []);

$params = array(
			'local' => $about,
			'global' => $globals
		);
<<<<<<< HEAD

echo $twig->render('about.twig',$params);
=======
echo $twig->render('about.twig', $params);
>>>>>>> fb53278cf0a873ec5bc938665e07520d998726be
