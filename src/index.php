<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader, [
    'debug' => true,  
]);


session_start();


$path = $_SERVER['REQUEST_URI'] ?? '/';
$path = trim($path, '/');

switch ($path) {
    case '':
    case 'landing':
        echo $twig->render('landing.twig');
        break;
    case 'login':
        echo $twig->render('login.twig');
        break;
    case 'signup':
        echo $twig->render('signup.twig');
        break;
    case 'dashboard':
        echo $twig->render('dashboard.twig');
        break;
    case 'tickets':
        echo $twig->render('tickets.twig');
        break;
    case 'analytics':
        echo $twig->render('analytics.twig');
        break;
    default:
        http_response_code(404);
        echo $twig->render('404.twig');  
        break;
}
?>