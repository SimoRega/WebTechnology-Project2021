<div class="container">
    <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="col-lg-10">
            <div class="row">

                <?php foreach($templateParams["accessori"] as $accessorio): ?>


                    <div class="col-lg-4 col-md-6 ">
                        <div class="single-product prod">
                        <a href="item.php">
                            <img class="img-fluid " src="<?php echo UPLOAD_DIR.$accessorio["img"]; ?>" alt="">
                        </a>
                            <div class="product-details">
                                <h5 class="fw-bold"><?php echo $accessorio["nome"]; ?></h5>

                                <div class="price">
                                    <h5 class="fw-bold"><?php echo $accessorio["prezzo"]; ?>€</h5>
                                </div>

                                <a href="#" class="btn btn-primary btn-lg " tabindex="-1" role="button"
                                    aria-disabled="true">Compra</a>


                            </div>
                        </div>
                    </div>

                <?php endforeach; ?> 

            </div>
        </div>
    </div>
</div>  