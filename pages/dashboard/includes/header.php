<!DOCTYPE html>
<html>
<head>
    <title>Ecommerce de Tenis</title>
    <meta charset="utf-8" />
    <link href="<?php echo BASE_DASHBOARD; ?>css/style.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>

<aside class="aside hide">
    <div class="wrap h100">
        <div class="logo h15 itemsFlex alignCenter">
            <i class="ri-contrast-drop-fill iconEmphasis marginRightSmall"></i>
            <h2>Raissa<span>Dev</span></h2>
        </div>
        <div class="col h60 marginDownSmall">
            <nav class="h100">
                <ul class="h100 itemsFlex flexWrap">
                    <li class="active"><a href="<?php echo BASE; ?>dashboard/"><i class="ri-command-fill marginRightDefault"></i> Painel</a></li>
                    <li><a href="<?php echo BASE; ?>dashboard/add-product"><i class="ri-upload-cloud-2-fill marginRightDefault"></i> Novo Produto</a></li>
                    <li><a href="<?php echo BASE; ?>dashboard/products"><i class="ri-shopping-bag-2-fill marginRightDefault"></i> Loja</a></li>
                    <li><a href="<?php echo BASE; ?>cart/"><i class="ri-shopping-basket-2-fill marginRightDefault"></i> Carrinho</a></li>
                    <li><a href="<?php echo BASE; ?>profile/"><i class="ri-user-3-fill marginRightDefault"></i> Perfil</a></li>
                    <li><a href="<?php echo BASE; ?>"><i class="ri-home-4-fill marginRightDefault"></i> Home</a></li>
                </ul>
            </nav>
        </div>
        <div class="col box">
            <i class="ri-money-dollar-circle-line"></i>
            <h4>History</h4>
            <p>Lorem ipsum amet dolor</p>
        </div>
    </div>
</aside>

<main class="mainContent center">

    <header class="itemsFlex alignCenter marginDownDefault">
        <div class="col w50 itemsFlex alignCenter hideMobile">
            <form class="itemsFlex alignCenter positionRelative w100">
                <button class="buttonStyleless"><i class="ri-search-line"></i></button>
                <input type="text" placeholder="Pesquisar" class="w40" />
            </form>
        </div>
        <div class="col w50 itemsFlex alignCenter justEnd w100Mobile">
            <div class="row itemsFlex alignCenter marginRightDefault">
                <figure class="imgSmallUser marginRightDefault">
                    <img src="<?php echo BASE; ?>uploads/<?php echo $_SESSION['image']; ?>" />
                </figure>
                <div class="marginLeftDefault">
                    <h6><?php echo $_SESSION['name']; ?></h6>
                    <p class="fontSmall"><?php echo $_SESSION['type']; ?></p>
                </div>
            </div>
            <div class="row marginLeftDefault">
                <a class="toggleMenu"><i class="ri-menu-3-fill"></i></a>
            </div>
        </div>
    </header>
