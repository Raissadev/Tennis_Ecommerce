<?php

    namespace controller;
    use \views\mainView;

    class homeController{
        public static function index(){
            mainView::render('home.php');
        }
    }

?>