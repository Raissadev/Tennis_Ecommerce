<?php 
    if($filename != 'product.php' && $filename != 'cart.php'){ 
?>
<div class="divisor"></div>
<footer class="footerMain">
    <div class="wrap w85 center w80Desktop">
        <nav class="menu">
            <ul class="itemsFlex alignCenter justSpaceBetween">
                <li class="positionRelative"><a href="<?php echo BASE; ?>"><i class="ri-home-smile-2-line"></i></a></li>
                <li class="positionRelative"><a href="<?php echo BASE; ?>shop"><i class="ri-gift-2-line"></i></a></li>
                <li class="positionRelative"><a href="<?php echo BASE; ?>cart"><i class="ri-heart-3-line"></i></a></li>
                <li class="positionRelative"><a href="<?php echo BASE; ?>profile"><i class="ri-user-3-line"></i></a></li>
            </ul>
        </nav>
    </div>
</footer>
<?php } ?>

<?php 
    if($filename == 'product.php'){ 
?>
<footer class="footerConteinerCart">
    <div class="wrap w85 center w80Desktop">
        <form method="POST">
            <nav class="menu itemsFlex justSpaceBetween">
                <a class="button buttonOptionTwo buttonOpenForm"><i class="ri-star-fill"></i></a>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>" />
                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>" />
                <input type="hidden" name="price" value="<?php echo $item['price']; ?>" />
                <button type="submit" name="order" class="button addToCart w80"><i class="ri-shopping-bag-fill"></i> Add To Cart</button>
            </nav>
        </form>
    </div>
</footer>    
</form>
<script src="<?php echo BASE; ?>js/image360.js"></script>
<section class="reviewContainer formContainer itemsFlex alignCenter justCenter hide">
    <div class="wrap w100">
            <form method="post" class="box itemsFlex flexWrap positionRelative">
                <a class="buttonOpenForm"><i class="ri-close-fill"></i></a>
                <?php
                    \controller\productsController::postFeedback();
                ?>
                <ul class="rate stars marginDownSmallIn itemsFlex">
                    <li><input type="checkbox" name="star" value="1" id="oneStar" /><label for="oneStar"><i class="ri-star-fill star starOne"></i></label></li>
                    <li><input type="checkbox" name="star" value="2" id="twoStar" /><label for="twoStar"><i class="ri-star-fill star starTwo"></i></label></li>
                    <li><input type="checkbox" name="star" value="3" id="threeStar" /><label for="threeStar"><i class="ri-star-fill star starThree"></i></label></li>
                    <li><input type="checkbox" name="star" value="4" id="fourStar" /><label for="fourStar"><i class="ri-star-fill star starFour"></i></label></li>
                    <li><input type="checkbox" name="star" value="5" id="fiveStar" /><label for="fiveStar"><i class="ri-star-fill star starFive"></i></label></li>
                </ul>
                <textarea name="feedback" placeholder="Deixe-nos o seu FeedBack"></textarea>
                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>" />
                <input type="hidden" name="user_id" value="<?php echo @$_SESSION['id']; ?>" />
                <div class="marginTopSmall itemsFlex justEnd w100"> 
                    <button type="submit" name="evaluate_product"><i class="ri-send-plane-fill"></i></button>
                </div>
            </form>
    </div>
</section>
<script src="<?php echo BASE; ?>js/script-form.js"></script>
<?php } ?>

<?php 
    if($filename == 'cart.php'){ 
?>
<div class="divisor"></div>
<footer class="footerConteinerCart">
    <div class="wrap w85 center w80Desktop">
        <form>
            <nav class="menu itemsFlex justSpaceBetween">
                <a class="button buttonOptionTwo w30"><span>R$<?php echo @$amountVisible; ?></span></a>
                <a class="button buttonOpenForm addToCart w70"><i class="ri-refund-2-line"></i> Payment</a>
            </nav>
        </form>
    </div>
</footer>
<script src="<?php echo BASE; ?>js/script-form.js"></script>
<?php } ?>
<script src="<?php echo BASE; ?>js/script.js"></script>

</body>
</html>