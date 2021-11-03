<?php

    namespace controller;
    use \views\mainView;

    class userController{

        public static function profile(){
            mainView::render('profile.php');
        }

    }

?>