<section class="welcomeContainer marginDownSmall">
    <div class="wrap w90 center w80Desktop">
        <div class="title marginDownSmall">
            <h1 class="marginDownSmallIn">Discover</h1>
            <h6>Explore The New Collection Of Snearkers</h6>
        </div>
        <div class="line"></div>
    </div>
</section>

<section class="productsContainer marginDownDefault">
    <div class="wrap w90 center w80Desktop">
        <div class="title itemsFlex alignCenter marginDownSmall">
            <div class="row w50">
                <h1>Discover</h1>
            </div>
            <div class="row w50 textRight">
                <a href="<?php echo BASE; ?>shop"><p>Ver tudo</p></a>
            </div>
        </div>
        <div class="slide">
            <div class="listItems itemsFlex">
                <?php 
                $items = \models\productsModel::getProducts();
                foreach($items as $key => $value){
                ?>
                <div class="box">
                    <figure class="imgMiddleProduct marginDownSmallIn">
                        <i class="ri-price-tag-3-fill iconEmphasis icon"></i>
                        <img src="<?php echo BASE_GET_DASH_UPLOADS; ?><?php echo $value['image']; ?>" />
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
                            <a href="<?php echo BASE; ?>product?id=<?php echo $value['id']; ?>"><i class="ri-heart-fill"></i></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="productsContainerSmall marginDownDefault">
    <div class="wrap w90 center w80Desktop">
        <div class="title itemsFlex alignCenter marginDownSmall">
            <div class="row w50">
                <h1>Discover</h1>
            </div>
            <div class="row w50 textRight">
                <a href="<?php echo BASE; ?>shop"><p>Ver tudo</p></a>
            </div>
        </div>
        <div class="slide">
            <div class="listItems itemsFlex">
                <?php 
                $items = \models\productsModel::getProducts();
                foreach($items as $key => $value){
                ?>
                <div class="box positionRelative">
                    <figure class="imgSmallProduct marginDownSmallIn">
                        <img src="<?php echo BASE_GET_DASH_UPLOADS; ?><?php echo $value['image_transparent']; ?>" />
                    </figure>
                    <div class="col">
                        <div class="row">
                            <h4 class="limitLineClampOne"><?php echo $value['name'] ?></h4>
                            <h5>R$ <?php echo $value['price'] ?></h5>
                        </div>
                        <div class="row">
                            <a href="<?php echo BASE; ?>product?id=<?php echo $value['id']; ?>" class="button"><i class="ri-price-tag-3-fill"></i></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
