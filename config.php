<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    $autoload = function($class){
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    define('HOST','localhost');
    define('PASSWORD','');
    define('USER','root');
    define('DATABASE','ecommerce_tenis');
    define('BASE','http://192.168.0.107/Projects/EcommerceTenis/');
    define('BASE_DASHBOARD','http://192.168.0.107/Projects/EcommerceTenis/pages/dashboard/');
    define('BASE_UPLOADS',__DIR__.'/uploads/');
    define('BASE_UPLOADS_DASHBOARD',__DIR__.'/pages/dashboard/uploads/');
    define('BASE_GET_DASH_UPLOADS',BASE.'/pages/dashboard/uploads/');

    if(!isset($_SESSION['login'])){
        $_SESSION['id'] = uniqid();
        $_SESSION['name'] = 'Visitante';
        $_SESSION['email'] = 'email@example.com';
        $_SESSION['image'] = 'avatar.png';
        $_SESSION['latitude'] = null;
        $_SESSION['longitude'] = null;
        $_SESSION['cep'] = null;
        $_SESSION['road'] = null;
        $_SESSION['type'] = 'user';
    }

?>