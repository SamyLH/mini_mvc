<?php

declare(strict_types=1);

session_start();
$root = dirname($_SERVER['SCRIPT_NAME']);
$root = str_replace('\\', '/', $root);

if ($root === '/') {
    $root = '';
}

define('BASE_URL', $root);

require dirname(__DIR__) . '/vendor/autoload.php';

use Mini\Core\Router;

//Table des routes minimaliste
$routes = [
    ['GET', '/', [Mini\Controllers\HomeController::class, 'index']],
    ['GET', '/users', [Mini\Controllers\HomeController::class, 'users']],

    //Page détail produit
    ['GET', '/product', [Mini\Controllers\HomeController::class, 'show']],
        
    //Authentification
    ['GET', '/login', [Mini\Controllers\AuthController::class, 'loginForm']],
    ['POST', '/login', [Mini\Controllers\AuthController::class, 'login']],
    ['GET', '/register', [Mini\Controllers\AuthController::class, 'registerForm']],
    ['POST', '/register', [Mini\Controllers\AuthController::class, 'register']],
    ['GET', '/logout', [Mini\Controllers\AuthController::class, 'logout']],

    //Panier / Commande
    ['GET', '/panier', [Mini\Controllers\PanierController::class, 'index']],
    ['POST', '/panier/add', [Mini\Controllers\PanierController::class, 'add']],
    ['GET', '/panier/clear', [Mini\Controllers\PanierController::class, 'clear']],

    ['GET', '/commande', [Mini\Controllers\PanierController::class, 'recap']],
    ['POST', '/commande/valider', [Mini\Controllers\PanierController::class, 'valider']],
];

// Bootstrap du router
$router = new Router($routes);
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);


