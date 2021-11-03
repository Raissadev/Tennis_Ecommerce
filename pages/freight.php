<?php

    require_once('./classes/models/freightModel.php');

    $frete = new Frete();
 
    $cepUser = $_SESSION['cep'];
    $frete->setCep_origem('38706400');
    $frete->setCep_destino($cepUser);

    $frete->defineServico('sedex');
    
    $frete->setPeso('1');
    
    $retorno = $frete->calcular();
    
    if($frete->getErro()){
        die("Ocorreu um erro: " . $frete->getErro());
    }


    $payments = \models\checkoutModel::getPayments();
    $amount = 0;
    foreach($payments as $key => $value){
        $id = (int)$value['product_id'];
        $paymentsProducts = \MySql::connect()->prepare("SELECT * FROM `products` WHERE  id = '$id'");
        $paymentsProducts->execute();
        $paymentsProducts = $paymentsProducts->fetch();
        $amount += $paymentsProducts['price'];
    }

?>
<div id="google-map"></div>

<section class="infosFreight marginTopSmall">
    <div class="wrap">
        <div class="box">
            <div class="itemsFlex alignCenter justSpaceBetween marginDownSmall">
                <h4>Origem</h4>
                <p>Cep: <?php echo $frete->getCep_origem(); ?></p>
            </div>
            <div class="itemsFlex alignCenter justSpaceBetween marginDownSmall">
                <h4>Destino</h4>
                <p>Cep: <?php echo $frete->getCep_destino(); ?></p>
            </div>
            <div class="itemsFlex alignCenter justSpaceBetween marginDownSmall">
                <h4>Produtos</h4>
                <a href="<?php echo BASE; ?>product?id=<?php echo $paymentsProducts['id']; ?>"><p><?php echo $paymentsProducts['name']; ?></p></a>
            </div>
            <div class="itemsFlex alignCenter justSpaceBetween marginDownSmall">
                <h4>Prazo de Entrega</h4>
                <p><?php echo $retorno->PrazoEntrega; ?> dias</p>
            </div>
            <div class="itemsFlex alignCenter justSpaceBetween marginDownSmall">
                <h4>Valor do Frete</h4>
                <p><?php echo $retorno->Valor; ?></p>
            </div>
            <div class="itemsFlex alignCenter justSpaceBetween">
                <h4>Total</h4>
                <p><?php echo $amount+=$retorno->Valor; ?></p>
            </div>
        </div>
    </div>
</section>

<script src="https://maps.googleapis.com/maps/api/js?callback=googleMapInit" defer></script>

<script type="application/json" id="google-maps-coords">
[{"location_name":"Destino de Origem","latitude":"-15.7801","longitude":"-47.9292"},{"location_name":"Cep: <?php echo $_SESSION['cep']; ?> <br /> Rua <?php echo $_SESSION['road']; ?>","latitude":"<?php echo $_SESSION['latitude']; ?>","longitude":"<?php echo $_SESSION['longitude']; ?>"}]
</script>

<script>
  const GoogleMaps = function(el, coords) {
    const gm = window.google && window.google.maps;

    if (!gm) return;
    
    const map = new gm.Map(el);
    const bounds = new gm.LatLngBounds();
    const infoWindow = new gm.InfoWindow();
    
    for (let coord in coords) {
        placeMarker(coords[coord]);
    }
    
    map.fitBounds(bounds);
    
    const idleListener = gm.event.addListener(map, 'idle', function() {
        if (map.getZoom() > 14) map.setZoom(14);
        gm.event.removeListener(idleListener);
    });
    
    
    if (infoWindow) {
        gm.event.addListener(map, 'click', function() {
            infoWindow.close();
        });
    }

    
    function placeMarker(loc) {
        const marker = new gm.Marker({
            map: map,
            position: {
                lat: Number(loc.latitude),
                lng: Number(loc.longitude),
            },
        });
        
        if (infoWindow) {
            gm.event.addListener(marker, 'click', function() {
                infoWindow.close(); 
                infoWindow.setContent(infoWindowTemplate(loc));
                infoWindow.open(map, marker);
            });
        }

        bounds.extend(marker.position);
    }
    
    
    function infoWindowTemplate(data) {
        const text = data.location_name;
        const link = data.location_link;
        
        const content = link 
            ? '<a href="'+ link +'">' + text + '</a>' 
            : text;
        
        return '<div class="google-map-infowindow-content">' + content + '</div>';
    }
};


window.googleMapInit = function() {
    const el = document.getElementById('google-map');
    const coords = JSON.parse(document.getElementById('google-maps-coords').innerHTML);
    
    GoogleMaps(el, coords);
};

</script>