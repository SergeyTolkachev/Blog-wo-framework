<?php

require_once 'vendor/autoload.php';
//require_once 'config/connection.php';
//require_once 'config/twig.php';


$requestString = $_SERVER['REQUEST_METHOD'] . $_SERVER['REQUEST_URI'];

 preg_match('/(?<method>[A-Z]{3,6})\/(?<controller>[a-zA-z]*)\/*(?<action>[a-zA-z]*)\/*(?<slug>[0-9]*)/', $requestString, $matches);

$method = $matches['method'];

$controller = 'App\\Controller\\' . ucfirst($matches['controller']) . 'Controller';

$action = $matches['action'] . 'Action';

$slug = $matches['slug'];

$class = ucfirst($matches['controller']) . 'Controller';

//if(class_exists($class)){
    (new $controller)->$action($slug);
//}else echo 'fuck';

//(new $controller)->$action($slug);

//(new $controller)->$action($slug);



//echo $twig->render('base.html.twig');
