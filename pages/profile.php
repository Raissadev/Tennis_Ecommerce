<section class="welcomeContainer marginDownSmall">
    <div class="wrap w90 center w80Desktop">
        <div class="title marginDownSmall">
            <h1 class="marginDownSmallIn">Profile</h1>
            <h6>Explore The New Collection Of Snearkers</h6>
        </div>
        <div class="line"></div>
    </div>
</section>

<section class="userContainer marginDownSmall">
    <div class="wrap w90 center w80Desktop">
        <div class="box">
            <figure class="imgBiggerUser marginDownSmall">
                <img src="<?php echo BASE; ?>uploads/<?php echo $_SESSION['image']; ?>">
            </figure>
            <div class="col textCenter">
                <h2 class="marginDownSmallIn"><?php echo $_SESSION['name']; ?></h2>
                <h6><?php echo $_SESSION['email']; ?></h6>
            </div>
        </div>
    </div>
</section>

<section class="userInfosContainer marginDownSmall">
    <div class="wrap w90 center w80Desktop">
        <div class="box">
            <div class="col">
                <h2 class="marginDownSmallIn">Endereço</h2>
                <p class="marginDownSmallIn">Latitude: <?php echo $_SESSION['latitude']; ?> | Longitude: <?php echo $_SESSION['longitude']; ?></p>
                <p class="marginDownSmallIn">Cep: <?php echo $_SESSION['cep']; ?> | Rua: <?php echo $_SESSION['road']; ?></p>
            </div>
            <div class="col marginTopSmall textRight">
                <?php 
                    if(isset($_SESSION['login'])){
                ?>
                <a class="buttonOpenFormRating">Atualizar Perfil</a>
                <?php }else{ ?>
                    <a href="<?php echo BASE; ?>login">Acessar Conta</a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php 
    if(isset($_SESSION['login'])){
?>
<section class="welcomeContainer">
    <div class="wrap w90 center w80Desktop">
        <div class="box">
            <?php
                if(isset($_GET['logout'])){
                    \models\userModel::logout();
                }
            ?>
            <a href="?logout" class="itemsFlex alignCenter"><i class="ri-door-lock-fill marginRightDefault"></i><h4>Sair</h4></a>
        </div>
    </div>
</section>

<section class="reviewContainer updateUser itemsFlex alignCenter justCenter hide">
    <div class="wrap w100">
            <form method="POST" enctype="multipart/form-data" class="box formUpdateUser itemsFlex flexWrap positionRelative">
                <a class="buttonOpenFormRating"><i class="ri-close-fill"></i></a>
                <?php
                    if(isset($_POST['update_user'])){
                        \controller\userController::updateUser($_POST['name'], $_POST['email'], $_POST['password'], $_POST['image'], $_POST['latitude'], $_POST['longitude'], $_POST['cep'], $_POST['road'], $_POST['type']);                        
                    }
                ?>
                <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" placeholder="Seu Nome" />
                <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Seu Email" />
                <input type="text" name="password" value="<?php echo $_SESSION['password']; ?>" placeholder="Sua Senha" />
                <div class="col marginTopSmall">
                    <h4>Endereço</h4>
                    <input type="file" name="image" value="<?php echo $_SESSION['image']; ?>" />
                    <input type="text" name="latitude" value="<?php echo $_SESSION['latitude']; ?>" placeholder="Latitude" />
                    <input type="text" name="longitude" value="<?php echo $_SESSION['longitude']; ?>" placeholder="Longitude" />
                    <input type="text" name="cep" value="<?php echo $_SESSION['cep']; ?>" placeholder="Cep" />
                    <input type="text" name="road" value="<?php echo $_SESSION['road']; ?>" placeholder="Rua" />
                </div>
                <div class="marginTopSmall itemsFlex justEnd w100"> 
                    <button type="submit" name="update_user"><span class="marginRightDefault">Atualizar </span><i class="ri-send-plane-fill"></i></button>
                </div>
            </form>
    </div>
</section>
<script src="<?php echo BASE; ?>js/script-form.js"></script>

<?php } ?>