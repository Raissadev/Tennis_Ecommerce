<?php
    if($_SESSION['name'] == 'Visitante'){
        echo "<script> alert('Faça login para ver o seu carrinho!') </script>";
        die();
    }
?>
<section class="welcomeContainer marginDownSmall">
    <div class="wrap w90 center w80Desktop">
        <div class="title marginDownSmall">
            <h1 class="marginDownSmallIn">Cart</h1>
            <h6>Explore The New Collection Of Snearkers</h6>
        </div>
        <div class="line"></div>
    </div>
</section>

<section class="productsContainerCart marginDownDefault">
    <div class="wrap w90 center w80Desktop">
        <ul class="listItems itemsFlex flexWrap">
            <?php 
            @$orders = \models\productsModel::getOrders();
            if(isset($_GET['delete'])){
                \controller\productsController::deleteCart($_GET['id']); 
                header('Location: '.BASE.'cart');
            }
            $amount = 0;
            foreach($orders as $key => $value){
                @$id = (int)$value['product_id'];
                @$itemOrder = \MySql::connect()->prepare("SELECT * FROM `products` WHERE  id = '$id'");
                @$itemOrder->execute();
                @$itemOrder = @$itemOrder->fetch();
                $amount += $itemOrder['price'];
                $amountVisible = $amount;
            ?>
            <li class="box itemsFlex">
                <div class="col w50 itemsFlex">
                    <div class="row w100">
                        <a href="<?php echo BASE; ?>product?id=<?php echo @$itemOrder['id']; ?>">
                            <h4 class="marginDownSmallIn"><?php echo @$itemOrder['name'] ?></h4>
                            <p class="marginDownSmallIn limitLineClampOne"><?php echo @$itemOrder['description'] ?></p>
                            <h5>R$ <?php echo @$itemOrder['price'] ?></h5>
                        </a>
                    </div>
                </div>
                <figure class="w50 imgSmallProduct marginDownSmallIn positionRelative">
                    <a href="?delete&id=<?php echo @$value['id']; ?>"><i class="ri-close-fill iconEmphasis"></i></a>
                    <img src="<?php echo BASE_GET_DASH_UPLOADS; ?><?php echo $itemOrder['image_transparent']; ?>" />
                </figure>
            </li>
            <?php } ?>
        </ul>
    </div>
</section>
<?php
    $amount = str_replace("." , "" , $amount );
    $amount = str_replace("," , "" , $amount );
    if(isset($_POST['payment'])){
        include('./classes/models/Payment.php');
        $payment = new Payment;
        $payment->payIntent($_POST['product_id'], $_POST['user_id'], $_POST['card_number'], $_POST['date_valid'], $_POST['cvv'], $_POST['amount']);
    }
?>
<div class="formContainer hide">
    <section class="paymentContainer">
        <div class="wrap w90 center">
            <form method="POST" class="card effectBox positionRelative">
                <input type="decimal" name="card_number" placeholder="Número do cartão" autocomplete="off" onkeyup="mascara(this, number_card)" maxlength="16" />
                <div class="itemsFlex alignCenter justSpaceBetween">
                    <input type="data" name="date_valid" placeholder="10-01-2024" class="w60 marginRightSmall" onkeyup="mascara(this, date_card)" maxlength="8" autocomplete="off" />
                    <input type="text" name="cvv" placeholder="CVV" class="w30 textRight marginLeftSmall" autocomplete="off" onkeyup="mascara(this, cvv_card)" maxlength="3" />
                </div>
                <input type="hidden" name="amount" value="<?php echo @$amount; ?>" />
                <input type="hidden" name="product_id" value="<?php
                    @$id = (int)$value['product_id'];
                    @$itemOrder = \MySql::connect()->prepare("SELECT * FROM `products` WHERE  id = '$id'");
                    @$itemOrder->execute();
                    @$itemOrder = @$itemOrder->fetch();
                    echo $itemOrder['id'].',';
                ?>" />
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>" />
                <button type="submit" name="payment" class="effectBox"><i class="ri-send-plane-fill"></i></button>
            </form>
            <div class="marginTopSmallIn textRight">
                <a class="buttonOpenForm">Fechar</a>
            </div>
        </div> 
    </section>
</div>

<script src="<?php echo BASE; ?>js/masks.js"></script>