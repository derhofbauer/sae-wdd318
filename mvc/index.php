<?php

// http://localhost:8080/mvc/index.php?controller=products&action=show&uid=12

// http://localhost:8080/mvc/products/show/12 --> index.php?path=/products/show/12

// http://localhost:8080/mvc/admin/index.php NICHT http://localhost:8080/mvc/index.php?path=/admin/index.php


// var_dump($_GET['path']);

require_once 'routes.php';


// welchen Controller brauchen wir?
$path = "/" . $_GET['path'];
// var_dump($path);

if (array_key_exists($path, $routes)) {
    $controllerDotAction = explode('.', $routes[$path]);
    $controller = $controllerDotAction[0];
    $action = $controllerDotAction[1];
} else {
    die("Route not found!!");
}

// Autoloader
spl_autoload_register(function ($className) {
    // Controller file muss genauso heißen wie die Controller-Klasse!!
    include_once __DIR__ . "/Controllers/{$className}.php";
    
    if (!class_exists($className)) {
        die("Class not found!!");
    }
});

// init controller
$currentController = new $controller();
$currentController->$action();

?>