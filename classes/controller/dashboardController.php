<?php

    namespace controller;
    use \views\mainView;

    class dashboardController{

        public static function index(){
            mainView::renderDashboard('index.php');
        }

        public static function addProduct(){
            mainView::renderDashboard('add-product.php');
        }

        public static function products(){
            mainView::renderDashboard('products.php');
        }

    }

?>