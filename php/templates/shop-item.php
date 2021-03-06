
<?php

    if(!isset($_GET["id"])){
        echo "missing arguments";
        return;
    }

    $idProdotto = $_GET['id'];
    $item = $dbh->getProdottoSingolo($idProdotto)[0];
?>


<div class="container px-4 px-lg-5 my-5">
    <div class="row gx-4 gx-lg-5 align-items-center white">
        <div class="col-md-6 bg-light rounded-3">
            <img class="card-img-top mb-5 mb-md-0" src="<?php echo UPLOAD_DIR.$item["img"]; ?>" alt="<?php echo $item["nome"]; ?>">
        </div>
        <div class="col-md-6">

            <h1 class=" display-5 fw-bolder"><?php echo $item["nome"]; ?></h1>
            <div class="fs-5 mb-5">
                <!--
                    <span class="text-decoration-line-through">$45.00</span>
                -->
                <p ><?php echo $item["prezzo"]; ?>€</p>
            </div>

            <p class=" lead"><?php  echo $item["descrizione"]; ?></p>
            <div class="container-fluid">

                <form action="carrello.php" method="POST">
                    <input  type="hidden" value=" <?php  echo $item["idProdotto"]; ?>" name="id" >
                    <div class="d-flex">
                        <label class="toast" for="inputQuantity">Quantità: </label>
                        <input class="form-control text-center me-3 px-4" id="inputQuantity" name="qnt" type="number" min="1" max="<?php echo $item["qnt"];?>" value="1" >
                        
                        <?php if($item["qnt"]!=0):?>
                        <input class=" btn btn-primary btn-lg" type="submit" value="Aggiungi al carrello">
                        <?php else:?>
                        <input class=" btn btn-secondary btn-lg" disabled type="submit" value="Non Disponibile">
                        <?php endif;?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>