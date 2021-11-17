<?php

    namespace models;

    class dashboardModel{

        public static function getProducts(){
            $query = "";
            if(isset($_POST['search']) == 'Buscar'){
                $name_product = $_POST['name_product'];
                $query = "WHERE name LIKE '$name_product%'";
            }
            $products = \MySql::connect()->prepare("SELECT * FROM `products` $query");
            $products->execute();
            $products = $products->fetchAll();
            return $products;
        }

        public static function getVisits(){
            $visits = \MySql::connect()->prepare("SELECT * FROM `visits`");
            $visits->execute();
            $visits = $visits->fetchAll();
            return $visits;
        }

        public static function getFeedbacks(){
            $ratings = \MySql::connect()->prepare("SELECT * FROM `ratings`");
            $ratings->execute();
            $ratings = $ratings->fetchAll();
            return $ratings;
        }

        public static function getUsers(){
            $users = \MySql::connect()->prepare("SELECT * FROM `users`");
            $users->execute();
            $users = $users->fetchAll();
            return $users;
        }

        public static function getOrders(){
            $orders = \MySql::connect()->prepare("SELECT * FROM `orders`");
            $orders->execute();
            $orders = $orders->fetchAll();
            return $orders;
        }

    }

?>