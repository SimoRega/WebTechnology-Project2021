
<div class="d-flex flex-column justify-content-center">
    <p class="fs-3 text-warning mx-auto">Ecco il risultato della tua Ricerca!</p>
    
    <?php if( $templateParams["itemFound"]!=NULL):?>
    <div class="col-lg-10  mx-auto">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-1 g-md-3 mx-2">
            <?php foreach($templateParams["itemFound"] as $a):?>
                <div class="col-lg-4">
                    <div class="single-product prod">
                        <a href="<?php echo $a["idProdotto"]; ?>">
                            <img class="img-fluid "  src="<?php echo UPLOAD_DIR.$a["img"]; ?>" alt="" >
                        </a>
                        <div class="product-details">
                            <a href="<?php echo $a["idProdotto"]; ?>" style="text-decoration: none;">
                                <h5  class="fw-bold" ><?php echo $a["nome"]; ?></h5>
                            </a>
                            
                            <div class="price">
                                <h5 class="fw-bold"><?php echo $a["prezzo"]; ?>€</h5>
                            </div>
                            <a href="<?php echo $a["idProdotto"]; ?>" class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true">Compra</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php else:?>
        <div class="container rounded-3 bg-light p-3">
            <p class="text-center">La tua ricerca non ha prodotto risultati, controlla meglio i parametri inseriti nella barra di ricerca, i parametri sono opzionali quindi non preoccuparti se non selezioni qualcosa</p>
        </div>
        <?php endif;?>

</div>
        