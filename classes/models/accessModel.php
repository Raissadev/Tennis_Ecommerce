<?php

    namespace models;

    class accessModel{

        public static function register(){
            if(isset($_POST['register'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $image = $_FILES['image'];
                $latitude = $_POST['latitude'];
                $longitude = $_POST['longitude'];
                $cep = $_POST['cep'];
                $road = $_POST['road'];
                $type = $_POST['type'];

                move_uploaded_file($image['tmp_name'], BASE_UPLOADS.$image['name']);

                $register = \MySql::connect()->prepare("INSERT INTO `users` VALUES (null,?,?,?,?,?,?,?,?,?)");
                $register->execute(array($name, $email, $password, $image['name'], $latitude, $longitude, $cep, $road,'user'));

                header('Location: '.BASE.'');
                @$_SESSION['login'] = true;
            }
        }

        public static function login(){
            if(isset($_POST['logar'])){
                $name = $_POST['name'];
                $password = $_POST['password'];
                $login = \MySql::connect()->prepare("SELECT * FROM `users` WHERE name = ? AND password = ?");
                $login->execute(array($name,$password));
                if($login->rowCount() == 1){
                    $info = $login->fetch();
                    @$_SESSION['login'] = true;
                    $_SESSION['id'] = $info['id'];
                    $_SESSION['name'] = $name;
                    $_SESSION['password'] = $password;
                    $_SESSION['email'] = $info['email'];
                    $_SESSION['image'] = $info['image'];
                    $_SESSION['latitude'] = $info['latitude'];
                    $_SESSION['longitude'] = $info['longitude'];
                    $_SESSION['cep'] = $info['cep'];
                    $_SESSION['road'] = $info['road'];
                    $_SESSION['type'] = $info['type'];
                    if(isset($_POST['remember'])){
                        setcookie('remember', true, time()+(60*60*24), '/');
                        setcookie('name', @$name, time()+(60*60*24), '/');
                        setcookie('password', @$password, time()+(60*60*24), '/');
                    }
                    if($_SESSION['type'] == "user"){
                        header('Location: '.BASE.'');
                    }
                    if($_SESSION['type'] == "admin"){
                        header('Location: '.BASE.'dashboard');
                    }
                }else {
                    echo "<script> alert('Erro ao logar!'); </script>";
                }
            }

        }

    }

?>