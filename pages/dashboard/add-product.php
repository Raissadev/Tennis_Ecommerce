<?php
    \models\dashboardModel::registerProduct();
?>
<section class="containerAddProduct h100 itemsFlex alignCenter justCenter marginDownSmall">
    <div class="wrap w80">
        <div class="logo marginDownDefault textCenter">
            <i class="ri-contrast-drop-fill iconEmphasis"></i>
        </div>
        <div class="formContent">
            <form method="post" enctype="multipart/form-data" class="itemsFlex flexWrap">
                <input type="text" name="name" class="marginDownSmall w100" autocomplete="off" placeholder="Nome do Produto" />
                <input type="text" name="description" class="marginDownSmall w100" autocomplete="off" placeholder="Descrição do Produto" />
                <input type="text" name="price" size="12" onKeyUp="mascaraMoeda(this, event)" class="marginDownSmall w100" autocomplete="off" placeholder="Preço do Produto" />
                <input type="text" name="color" class="marginDownSmall w100" autocomplete="off" placeholder="Cores do Produto (separe por virgulas)" />
                <input type="text" name="size" class="marginDownSmall w100" autocomplete="off" placeholder="Tamanhos do Produto (separe por virgulas)" />
                <input type="number" name="quantity" value="1" class="marginDownSmall w100" autocomplete="off" />
                <div class="marginDownDefault w100 itemsFlex alignCenter justSpaceBetween">
                    <div class="marginRightSmall w50">
                        <label>Imagem</label>
                        <input type="file" name="image" class="marginTopSmallIn w80" />
                    </div>
                    <div class="marginLeftSmall w50">
                        <label>Transparente</label>
                        <input type="file" name="image_transparent" class="marginTopSmallIn w80" />
                    </div>
                </div>
                <button type="submit" name="register_product" class="w40 center">Registrar</button>
            </form>
        </div>
    </div>
</section>