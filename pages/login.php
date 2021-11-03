<?php
    \models\accessModel::login();
?>

<section class="containerAccess h75vh itemsFlex alignCenter justCenter">
    <div class="wrap w90 w80Desktop">
        <div class="logo marginDownDefault textCenter">
            <i class="ri-contrast-drop-fill iconEmphasis"></i>
        </div>
        <div class="formContent">
            <form method="post" class="itemsFlex flexWrap">
                <input type="text" name="name" class="marginDownSmall w100" autocomplete="off" />
                <input type="password" name="password" class="marginDownSmall w100" autocomplete="off" />
                <div class="w100 marginDownSmall">
                    <input type="checkbox" name="remember" id="remember" class="hide" />
                    <label for="remember" class="itemsFlex alignCenter"><i class="ri-check-double-line marginRightDefault"></i> <p>Lembrar</p></label>
                </div>
                <button type="submit" name="logar" class="w30 center"><span>Entrar</span></button>
            </form>
        </div>
        <div class="marginTopSmall">
            <p>Não possui uma conta? <a href="<?php echo BASE; ?>register">Registre-se</a></p>
        </div>
    </div>
</section>