<section class="containerSearch marginDownSmall">
    <div class="wrap w90 center">
        <form method="post" class="itemsFlex alignCenter">
            <?php 
                \models\dashboardModel::getProducts();
            ?>
            <input type="text" name="name_product" placeholder="Pesquisar..." class="w90 marginRightSmall" autocomplete="off" />
            <button type="submit" name="search" class="w10"><i class="ri-search-line"></i></button>
        </form>
    </div>
</section>

<section class="listContainer">
    <div class="wrap w90 center">
        <ul class="list itemsFlex flexWrap">
            <?php 
                $items =\models\dashboardModel::getProducts();
                foreach($items as $key => $value){
            ?>
            <li class="boxItem w30 w100Mobile">
                <a href="<?php echo BASE; ?>product?id=<?php echo $value['id']; ?>">
                    <figure class="imgProduct">
                        <img src="<?php echo BASE_GET_DASH_UPLOADS; ?><?php echo $value['image']; ?>" />
                    </figure>
                    <div class="col textCenter">
                        <h3><?php echo $value['name']; ?></h3>
                        <h4><?php echo $value['price']; ?></h4>
                    </div>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</section>