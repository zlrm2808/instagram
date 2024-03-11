<?php
use Zlrm2\Instagram\Controller\Singup;
    
    $router = new \Bramus\Router\Router();
    session_start();

    $dotnenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../config/");
    $dotnenv->load();

    $router->get('/', function(){
        echo "Inicio";
        echo $_ENV['DB'];
    });

    $router->get('/login', function(){
        echo "Login";
    });

    $router->post('/auth', function(){
        echo "Auth";
    });

    $router->get('/singup', function(){
        $controller = new Singup;
        $controller->render("/singup/index");
    });

    $router->post('/register', function(){
        echo "Register";
    });

    $router->get('/home', function(){
        echo "Home";
    });

    $router->post('/publish', function(){
        echo "Publish";
    });

    $router->get('/profile', function(){
        echo "Profile";
    });

    $router->post('/addlike', function(){
        echo "AddLike";
    });

    $router->get('/singout', function(){
        echo "SingOut";
    });

    $router->get('/profile/{username}', function($username){
        echo "Profile $username";
    });

    $router->run();