<?php

    namespace models;

    class productsModel{

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

        public static function getItem(){
            $itemId = $_GET['id'];
            $item = \MySql::connect()->prepare("SELECT * FROM `products` WHERE id = $itemId");
            $item->execute();
            $item = $item->fetch();
            return $item;
        }

        public static function getOrders(){
            $userId = $_SESSION['id'];
            $orders = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE user_id = $userId");
            $orders->execute();
            $orders = $orders->fetchAll();
            return $orders;
        }

        public static function getRatings($idItem){
            $starsOne = \MySql::connect()->prepare("SELECT * FROM `ratings` WHERE stars = 1 AND product_id = $idItem");
            $starsTwo = \MySql::connect()->prepare("SELECT * FROM `ratings` WHERE stars = 2 AND product_id = $idItem");
            $starsThree = \MySql::connect()->prepare("SELECT * FROM `ratings` WHERE stars = 3 AND product_id = $idItem");
            $starsFour = \MySql::connect()->prepare("SELECT * FROM `ratings` WHERE stars = 4 AND product_id = $idItem");
            $starsFive = \MySql::connect()->prepare("SELECT * FROM `ratings` WHERE stars = 5 AND product_id = $idItem");
            $starsOne->execute();
            $starsTwo->execute();
            $starsThree->execute();
            $starsFour->execute();
            $starsFive->execute();
            $starsOne = $starsOne->fetchAll();
            $starsTwo = $starsTwo->fetchAll();
            $starsThree = $starsThree->fetchAll();
            $starsFour = $starsFour->fetchAll();
            $starsFive = $starsFive->fetchAll();

            $calcOne = (5*count($starsFive) + 4*count($starsFour) +3*count($starsThree) +2*count($starsTwo) +1*count($starsOne));
            $calcTwo = (count($starsFive) + count($starsFour) + count($starsThree) + count($starsThree) + count($starsTwo) + count($starsOne));

            if($calcOne === 0 || $calcTwo === 0){
                $calcOne = 1; $calcTwo = 1;
            }
            $calcStars = intdiv($calcOne, $calcTwo);
            
            echo $calcStars;
            
        }

    }

?>

