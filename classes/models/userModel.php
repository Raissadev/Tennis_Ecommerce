<?php

    namespace models;

    class userModel{
        
        public static function updateUser($name,$email,$password,$image,$latitude,$longitude,$cep,$road,$type){
            $idUser = $_SESSION['id'];
            $update = \MySql::connect()->prepare("UPDATE `users` SET name = ? , email = ? , password = ? , image = ? , latitude = ?
            , longitude = ? , cep = ? , road = ? , type = ? WHERE id = $idUser ");
            move_uploaded_file($image['tmp_name'], BASE_UPLOADS.$image['name']);
            $update->execute(array($name,$email,$password,$image['name'],$latitude,$longitude,$cep,$road,'user'));

            echo "<script> alert('Usuário editado com sucesso!'); </script>";
            echo "<script> Location.reload(); </script>";
        }

        public static function logout(){
            unset($_SESSION['login']);
            setcookie('remember', false, time()-(60*60*24), '/');
            setcookie('name', @$name, time()-(60*60*24), '/');
            setcookie('password', @$password, time()-(60*60*24), '/');
            session_destroy();
            echo "<script> Location.reload(); </script>";
            if(!isset($_SESSION['login'])){
                header('Location: '.BASE.'profile');
                die();
            }
        }

    }

?>