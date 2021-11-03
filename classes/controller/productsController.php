<?php

    namespace controller;
    use \views\mainView;

    class productsController{

        public static function product(){
            mainView::render('product.php');
        }

        public static function shop(){
            mainView::render('shop.php');
        }

        public static function cart(){
            mainView::render('cart.php');
        }

        public static function freight(){
            mainView::render('freight.php');
        }

    }

?>