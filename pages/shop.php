<section class="welcomeContainer marginDownSmall">
    <div class="wrap w90 center w80Desktop">
        <div class="title marginDownSmall">
            <h1 class="marginDownSmallIn">Shop</h1>
            <h6>Explore The New Collection Of Snearkers</h6>
        </div>
        <div class="line"></div>
    </div>
</section>

<section class="containerSearch marginDownSmall">
    <div class="wrap w90 center w80Desktop">
        <form method="POST" class="itemsFlex alignCenter">
            <?php 
                \models\productsModel::getProducts();
            ?>
            <input type="text" name="name_product" placeholder="Pesquisar..." class="w90 marginRightSmall" autocomplete="off" />
            <button type="submit" name="search" class="w10"><i class="ri-search-line"></i></button>
        </form>
    </div>
</section>

<section class="productsContainerShop marginDownDefault">
    <div class="wrap w90 center w80Desktop">
        <div class="title itemsFlex alignCenter marginDownSmall">
            <h1>New Collection</h1>
        </div>
        <div>
            <div class="listItems itemsFlex flexWrap">
                <?php 
                $items = \models\productsModel::getProducts();
                foreach($items as $key => $value){
                ?>
                <div class="box">
                    <figure class="imgMiddleProduct marginDownSmallIn">
                        <i class="ri-price-tag-3-fill iconEmphasis"></i>
                        <img src="<?php echo BASE_GET_DASH_UPLOADS; ?><?php echo $value['image_transparent']; ?>" />
                    </figure>
                    <div class="col itemsFlex">
                        <div class="row w80">
                            <a href="<?php echo BASE; ?>product?id=<?php echo $value['id']; ?>">
                                <h4><?php echo $value['name'] ?></h4>
                                <p class="limitLineClampOne"><?php echo $value['description'] ?></p>
                                <h5>R$ <?php echo $value['price'] ?></h5>
                            </a>
                        </div>
                        <div class="row w20 itemsFlex justEnd">
                            <a href="<?php echo BASE; ?>product?id=<?php echo $value['id']; ?>"><i class="ri-shopping-bag-2-fill"></i></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>


