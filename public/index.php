<?php
declare(strict_types=1);
   
include '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
include '../application/config/config.php';

use mvc\app\Application;
use mvc\app\controllers\auth\login\LoginController;
use mvc\app\controllers\PageController;
use mvc\app\controllers\auth\register\UserController;
use mvc\app\controllers\comment\CommentController;
use mvc\app\controllers\post\PostController;

$app = new Application($config['db']);

$app->route->get('/', [PageController::class, 'index']);
$app->route->get('/register', [PageController::class, 'register']);
$app->route->post('/register', [UserController::class, 'createUser']);
$app->route->get('/post', [PageController::class, 'post']);
$app->route->post('/post', [PostController::class, 'createPost']);
$app->route->get('/posts', [PostController::class, 'posts']);
$app->route->post('/posts', [CommentController::class, 'createComment']);
$app->route->get('/login', [PageController::class, 'login']);
$app->route->post('/login', [LoginController::class, 'login']);
$app->route->get('/logout', [LoginController::class, 'logout']);
$app->route->post('/login', [LoginController::class, 'login']);
$app->route->get('/find', [UserController::class, 'findAll']);
$app->route->get('/user', [UserController::class, 'findById']);
$app->route->get('/about', 'about');




$app->run();

 ?>