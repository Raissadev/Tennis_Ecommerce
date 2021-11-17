<?php

    namespace models;

    class checkoutModel{

        public static function getPayments(){
            $payments = \MySql::connect()->prepare("SELECT * FROM `payments`");
            $payments->execute();
            $payments = $payments->fetchAll();
            return $payments;
        }
    }

?>