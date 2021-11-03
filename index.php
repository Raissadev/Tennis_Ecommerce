<?php
    include('config.php');

    $homeController = new \controller\homeController();
    $accessController = new \controller\accessController();
    $dashboardController = new \controller\dashboardController();
    $productsController = new \controller\productsController();
    $userController = new \controller\userController();

    Router::get('/', function() use ($homeController){
        $homeController->index();
    });
    Router::get('/login', function() use ($accessController){
        $accessController->login();
    });
    Router::get('/register', function() use ($accessController){
        $accessController->register();
    });
    Router::get('/dashboard', function() use ($dashboardController){
        $dashboardController->index();
    });
    Router::get('/dashboard/add-product', function() use ($dashboardController){
        $dashboardController->addProduct();
    });
    Router::get('/dashboard/products', function() use ($dashboardController){
        $dashboardController->products();
    });
    Router::get('/product', function() use ($productsController){
        $productsController->product();
    });
    Router::get('/shop', function() use ($productsController){
        $productsController->shop();
    });
    Router::get('/cart', function() use ($productsController){
        $productsController->cart();
    });
    Router::get('/profile', function() use ($userController){
        $userController->profile();
    });
    Router::get('/freight', function() use ($productsController){
        $productsController->freight();
    });

?>