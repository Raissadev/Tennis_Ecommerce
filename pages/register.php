<?php
    \models\accessModel::register();
?>
<section class="containerAccess h100 itemsFlex alignCenter justCenter marginDownSmallIn">
    <div class="wrap w90 w80Desktop">
        <div class="logo marginDownDefault textCenter">
            <i class="ri-contrast-drop-fill iconEmphasis"></i>
        </div>
        <div class="formContent">
            <form method="post" enctype="multipart/form-data" class="itemsFlex flexWrap">
                <input type="text" name="name" class="marginDownSmall w100" autocomplete="off" placeholder="Seu Nome" />
                <input type="email" name="email" class="marginDownSmall w100" autocomplete="off" placeholder="Seu Email" />
                <div class="marginDownSmall w100 itemsFlex alignCenter justSpaceBetween">
                    <input type="file" name="image" class="w100 marginRightDefault" />
                    <a class="button buttonOptionOne positionRelative hoverInfo" onclick="getLocation()"><i class="ri-map-pin-fill"></i><span class="hover">Pegar localização</span></a>
                </div>
                <input type="text" name="cep" class="marginDownSmall w100" autocomplete="off" placeholder="Cep" required />
                <input type="hidden" name="latitude" value="" id="lat" />
                <input type="hidden" name="longitude" value=""id="long" />
                <input type="hidden" name="road" value="" />
                <input type="hidden" name="type" />
                <input type="password" name="password" class="marginDownSmall w100" autocomplete="off" placeholder="Sua Senha" />
                <button type="submit" name="register" class="w30 center"><span>Registrar</span></button>
            </form>
        </div>
        <div class="marginTopSmall">
            <p>Já possui uma conta? <a href="<?php echo BASE; ?>login">Faça Login</a></p>
        </div>
    </div>
</section>

<script src="<?php echo BASE; ?>js/getLocation.js"></script>