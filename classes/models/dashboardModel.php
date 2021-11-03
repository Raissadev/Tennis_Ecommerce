<?php

    namespace models;

    class dashboardModel{

        public static function registerProduct(){
            if(isset($_POST['register_product'])){
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $image = $_FILES['image'];
                $image_transparent = $_FILES['image_transparent'];
                $color =  explode(',',$_POST['color']);
                $size = explode(',',$_POST['size']);
                $quantity = $_POST['quantity'];

                $colors = implode(',',$color);
                $sizes = implode(',',$size);

                move_uploaded_file($image['tmp_name'], BASE_UPLOADS_DASHBOARD.$image['name']);
                move_uploaded_file($image_transparent['tmp_name'], BASE_UPLOADS_DASHBOARD.$image_transparent['name']);

                $register = \MySql::connect()->prepare("INSERT INTO `products` VALUES (null,?,?,?,?,?,?,?,?)");
                $register->execute(array($name,$description,$price,$image['name'],$image_transparent['name'],$colors,$sizes,$quantity));
                
                echo "<script> alert('Produto adicionado com sucesso!'); </script>";
                echo "<script> Location.reload(); </script>";
            }
        }

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

        public static function getAddVisits(){
            if(!isset($_COOKIE['visit'])){
                setcookie('visit', true, time()+(60*60*24*7));
                $visitUser = \MySql::connect()->prepare("INSERT INTO `visits` VALUES (null,?,?)");
                $visitUser->execute(array($_SERVER["REMOTE_ADDR"], date('Y-m-d')));
                return $visitUser;
            }
            if(isset($_COOKIE['visit'])){
                $visits = \MySql::connect()->prepare("SELECT * FROM `visits`");
                $visits->execute();
                $visits = $visits->fetchAll();
                return @$visits;
            }
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