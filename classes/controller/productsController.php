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

        public static function deleteCart($idItem){
            $order = \MySql::connect()->prepare("DELETE FROM `orders` WHERE id = $idItem");
            $order->execute();
            return $order;

            echo "<script> alert('Item excluido com sucesso!'); </script>";
            echo "<script> Location.reload(); </script>";
        
        }

        public static function deleteOrder(){
            $date = date('Y-m-d', strtotime('-30 days'));
            $deleteOrder = \MySql::connect()->prepare("DELETE FROM `orders` WHERE created < '$date'");
            $deleteOrder->execute();
            $deleteOrder = $deleteOrder->fetchAll();
        }

        public static function getOptionsOrder($product_id, $user_id, $price, $color, $size){
            $order = \MySql::connect()->prepare("INSERT INTO `orders` VALUES (null,?,?,?,?,?,?)");
            $order->execute(array($product_id,$user_id,$price,$color,$size,date('Y-m-d')));

            echo "<script> alert('Pedido realizado com sucesso!'); </script>";
            echo "<script> Location.reload(); </script>";

        }

        public static function postFeedback(){
            if(isset($_POST['evaluate_product'])){
                $product_id = $_POST['product_id'];
                $user_id = $_POST['user_id'];
                $stars = $_POST['star'];
                $feedback = $_POST['feedback'];

                $register = \MySql::connect()->prepare("INSERT INTO `ratings` VALUES (null,?,?,?,?)");
                $register->execute(array($product_id,$user_id,$stars,$feedback));
                
                echo "<script> alert('Avaliação realizada com sucesso!'); </script>";
                echo "<script> Location.reload(); </script>";
            }
        }

    }

?>