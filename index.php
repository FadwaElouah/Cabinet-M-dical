<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Router;
use App\Core\Database;
use App\Core\App;

// Charger la configuration
$config = require_once __DIR__ . '/app/config/config.php';

// Initialiser l'application
$app = new App($config);

// Obtenir le routeur de l'application
$router = $app->getRouter();

// Définir les routes
$router->addRoute('GET', '/', 'HomeController@index');
$router->addRoute('GET', '/patients', 'PatientController@index');
$router->addRoute('GET', '/medecins', 'MedecinController@index');
$router->addRoute('GET', '/rendez-vous', 'RendezVousController@index');

// Routes pour l'authentification
$router->addRoute('GET', '/login', 'AuthController@login');
$router->addRoute('POST', '/login', 'AuthController@login');
$router->addRoute('GET', '/logout', 'AuthController@logout');
$router->addRoute('GET', '/register', 'AuthController@register');
$router->addRoute('POST', '/register', 'AuthController@register');

// Dispatcher la requête
$router->dispatch();

