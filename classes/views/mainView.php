<?php

    namespace Views;

    class mainView{
        
        public static function render($filename, $arg = [], $header = 'pages/includes/header.php', $footer = 'pages/includes/footer.php'){
            include($header);
            include('pages/'.$filename);
            include($footer);
            die();
        }

        public static function renderDashboard($filenameDashboard, $arg = [], $headerDashboard = 'pages/dashboard/includes/header.php', $footerDashboard = 'pages/dashboard/includes/footer.php'){
            if($_SESSION['type'] == "admin"){
                include($headerDashboard);
                include('pages/dashboard/'.$filenameDashboard);
                include($footerDashboard);
            }else {
                header('Location: '.BASE.'');
            }
            die();
        }
    }

?>