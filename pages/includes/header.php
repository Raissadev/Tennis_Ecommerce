<?php 
    \controller\dashboardController::getAddVisits(); 
    \controller\productsController::deleteOrder();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ecommerce de Tenis</title>
    <meta charset="utf-8" />
    <link href="<?php echo BASE; ?>css/style.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>

<header class="marginDownSmall">
    <div class="wrap w90 center itemsFlex alignCenter w80Desktop">
        <div class="col w50 itemsFlex">
        <?php 
            if($filename != 'product.php' && $filename != 'cart.php'){ 
        ?>
            <a class="button buttonOptionOne toggleMenu"><i class="ri-menu-2-fill"></i></a>
        <?php }else{ ?>
            <a href="javascript:history.back()" class="button buttonOptionOne"><i class="ri-arrow-left-line"></i></a>
        <?php } ?>
        </div>
        <div class="col w50 itemsFlex justEnd">
            <a href="<?php echo BASE; ?>cart" class="button buttonOptionOne"><i class="ri-shopping-bag-3-fill"></i></a>
        </div>
    </div>
</header>
<?php 
    if($filename != 'product.php'){ 
?>
<div class="divisor"></div>
<?php } ?>

<aside class="aside asideUser hide">
    <div class="wrap h100 positionRelative">
        <div class="col marginDownSmall itemsFlex alignCenter">
            <figure class="imgUserSmall marginRightDefault">
                <img src="<?php echo BASE; ?>uploads/<?php echo $_SESSION['image']; ?>" />
            </figure>
            <h4><?php echo $_SESSION['name']; ?></h4>
        </div>
        <div class="col h40 marginTopSmall">
            <nav class="h100 itemsFlex flexWrap">
                <li class="positionRelative w100"><a href="<?php echo BASE; ?>"><i class="ri-home-smile-2-fill marginRightDefault"></i> Home</a></li>
                <li class="positionRelative w100"><a href="<?php echo BASE; ?>"><i class="ri-compass-3-line marginRightDefault"></i> Endereço</a></li>
                <li class="positionRelative w100"><a href="<?php echo BASE; ?>cart"><i class="ri-heart-3-line marginRightDefault"></i> Carrinho</a></li>
                <li class="positionRelative w100"><a href="<?php echo BASE; ?>freight"><i class="ri-compass-3-line marginRightDefault"></i> Frete</a></li>
                <?php if(isset($_SESSION['login'])){ ?>
                <li class="positionRelative w100"><a href="<?php echo BASE; ?>profile"><i class="ri-user-3-line marginRightDefault"></i> Perfil</a></li>
                <?php }else{ ?>
                <li class="positionRelative w100"><a href="<?php echo BASE; ?>login"><i class="ri-user-3-line marginRightDefault"></i> Logar</a></li>
                <?php } ?>
                <?php if($_SESSION['type'] == 'admin'){ ?>
                <li class="positionRelative w100"><a href="<?php echo BASE; ?>dashboard"><i class="ri-command-line marginRightDefault"></i> Painel</a></li>
                <?php } ?>
                <a class="button buttonOptionTwo w20 toggleMenu"><i class="ri-arrow-left-line"></i></a>
            </nav>
        </div>
    </div>
</aside>
