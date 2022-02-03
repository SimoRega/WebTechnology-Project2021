<div class="container">
    <div class="row">
        <div class="col-lg-2">


            <div class="row">
                <div class="col-lg-12 col-md-6  filter " >
                    <form action="shop.php" style="color:white" method="POST">
                        <input <?php if(isset($_POST["disponibile"])){echo "checked='checked'";} ?> type="checkbox" id="disponibile" name="disponibile" value="true">
                        <label for="disponibile"> Solo disponibili</label><br><br>

                        <label for="minPrice">Prezzo minimo</label>
                        <input type="range" name="min" id="rangeMin" value="<?php if(isset($_POST["min"])){echo $_POST["min"];}else{echo "0";}?>" min="0" max="1000" oninput="this.nextElementSibling.value = this.value">
                        <output >
                            <?php if(isset($_POST["min"])){echo $_POST["min"];}else{echo "0";}?>
                        </output><br>

                        <label for="minPrice">Prezzo massimo</label>
                        <input type="range" name="max" id="rangeMax" value="<?php if(isset($_POST["max"])){echo $_POST["max"];}else{echo "1000";}?>" min="0" max="1000" oninput="this.nextElementSibling.value = this.value">
                        <output >
                            <?php if(isset($_POST["max"])){echo $_POST["max"];}else{echo "1000";}?>
                        </output><br>
                        <input type="submit"  value="Applica filtri">


                    </form>
                </div>
            </div>



        </div>
        <div class="col-lg-10">
            <div class="row ">
                <?php 
                    if(isset($_POST["min"]) && isset($_POST["max"])){
                        if(isset($_POST["disponibile"])){
                            $templateParams["accessori"] = $dbh->getAccessoriWithParam(true,$_POST["min"],$_POST["max"]);
                        }else{
                            $templateParams["accessori"] = $dbh->getAccessoriWithParam(false,$_POST["min"],$_POST["max"]);
                        }
                    }
                
                ?>
                <?php foreach($templateParams["accessori"] as $accessorio): ?>
                    <?php if($tipo=="camper"){

                        $redirect="camper.php?id=";

                    }else{
                        $redirect="item.php?id=";
                    }
                    ?>
                    <!-- devo mettere in un parametro il redirect di ogni singolo prodotto camper/accessorio -->
                    <div class="col-lg-4 col-md-6 ">
                        <div class="single-product prod">
                            <a href="<?php echo $redirect.$accessorio["idProdotto"]; ?>">
                                <img class="img-fluid "  src="<?php echo '../upload/'.$accessorio["img"]; ?>" alt="" >
                            </a>
                            <div class="product-details">
                                <a href="<?php echo $redirect.$accessorio["idProdotto"]; ?>" style="text-decoration: none;">
                                    <h5  class="fw-bold" ><?php echo $accessorio["nome"]; ?></h5>
                                </a>

                                <div class="price">
                                    <h5 class="fw-bold"><?php echo $accessorio["prezzo"]; ?>€</h5>
                                </div>

                                <?php
                                    if($accessorio["qnt"] <= 0):?>
                                            <a href="<?php echo $redirect.$accessorio["idProdotto"]; ?>" class="btn btn-secondary btn-lg " tabindex="-1" role="button"
                                            aria-disabled="true">Non disponibile</a>
                                    <?php else: ?>
                                        <a href="<?php echo $redirect.$accessorio["idProdotto"]; ?>" class="btn btn-primary btn-lg " tabindex="-1" role="button"
                                            aria-disabled="true">Compra</a>
                                    <?php endif; ?>

                            </div>
                        </div>
                    </div>

                <?php endforeach; ?> 

            </div>
        </div>
    </div>
</div>  

