<?php
    $item = \models\productsModel::getItem();
    if(isset($_POST['order'])){
        if(!isset($_POST['color']) && !isset($_POST['size'])){
            echo "<script> alert('Hey, escolha uma opção!'); </script>";
            return;
            echo "<script> Location.reload(); </script>";
        }
        \controller\productsController::getOptionsOrder($_POST['product_id'], $_POST['user_id'], $_POST['price'], $_POST['color'], $_POST['size']);
    }
?>
<style>
    a.buttonOptionOne{
        background-color:var(--myWhiteWeak);
    }
    a.buttonOptionOne i{
        color:var(--myBlackWeak);
    }
</style>

<form method="POST">
<section class="productContainer">
    <div class="wrap w90 center h100 itemsFlex alignCenter">
        <div class="col">
            <figure class="imgBiggerProduct">
                <img src="<?php echo BASE_GET_DASH_UPLOADS; ?><?php echo $item['image_transparent']; ?>"/>
            </figure>
        </div>
        <div class="colInfo w100">
            <div class="col itemsFlex alignBaseline flexWrap marginDownSmall">
                <div class="row w80">
                    <h3><?php echo $item['name']; ?></h3>
                </div>
                <div class="row w20 textRight">
                    <h5>R$<?php echo $item['price']; ?></h5>
                </div>
                <div class="row w100 marginTopSmallIn itemsFlex">
                    <i class="ri-star-fill marginRightSmall"></i>
                    <p><?php \models\productsModel::getRatings($item['id']); ?> Reviews</p>
                </div>
            </div>
            <div class="col marginDownSmall">
                <p class="marginDownSmallIn"><?php echo $item['description']; ?></p>
                <p><?php echo $item['quantity']; ?> Items</p>
            </div>
            <div class="col marginDownSmall">
                <div class="title itemsFlex alignCenter marginDownSmallIn">
                        <h1>Size</h1>
                    </div>
                    <div class="listSize slide itemsFlex">
                        <?php
                            $size = $item['size'];
                            $sizes = explode(',',$size);
                            foreach($sizes as $size){
                        ?>
                        <a class="button buttonOptionTwo marginRightSmall positionRelative">
                            <input type="checkbox" name="size" value="<?php echo $size; ?>" />
                            <span><?php echo $size ?></span>
                        </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col">
                <div class="title itemsFlex alignCenter marginDownSmallIn">
                        <h1>Color</h1>
                    </div>
                    <div class="listSize slide itemsFlex">
                        <?php
                            $color = $item['color'];
                            $colors = explode(',',$color);
                            foreach($colors as $color){
                        ?>
                        <a style="background-color:<?php echo $color; ?> !important" class="button buttonOptionTwo marginRightSmall positionRelative">
                            <input type="checkbox" name="color" value="<?php echo $color; ?>" />
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

