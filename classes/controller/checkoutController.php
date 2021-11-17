<?php

    namespace controller;

    class checkoutController{

        public static function insertPayment($product_id, $user_id, $payment_id, $card_number, $date_valid, $cvv, $amount){
            $insertPayment = \MySql::connect()->prepare("INSERT INTO `payments` VALUES (null,?,?,?,?,?,?,?,?)");
            $insertPayment->execute(array($product_id,$user_id,$payment_id,$card_number,$date_valid,$cvv,$amount,date('Y-m-d')));
            
            if($insertPayment == true){
                $deleteOrder = \MySql::connect()->prepare("DELETE FROM `orders` WHERE user_id = $_SESSION[id]");
                $deleteOrder->execute();
                echo "<script> Location.reload(); </script>";
                echo "<script> alert('Compra realizada com sucesso!') </script>";
            }
        }

    }

?>