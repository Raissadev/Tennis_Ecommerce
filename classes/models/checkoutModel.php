<?php

    namespace models;

    class checkoutModel{

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

        public static function getPayments(){
            $payments = \MySql::connect()->prepare("SELECT * FROM `payments`");
            $payments->execute();
            $payments = $payments->fetchAll();
            return $payments;
        }
    }

?>