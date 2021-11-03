<?php

    namespace controller;
    use \views\mainView;

    class accessController{

        public static function register(){
            if(@$_SESSION['login'] != true){
                mainView::render('register.php');
            }else{
                header('Location: '.BASE.'');
            }
        }

        public static function login(){
            if(@$_SESSION['login'] != true){
                mainView::render('login.php');
            }else{
                header('Location: '.BASE.'');
            }
        }

    }

?>