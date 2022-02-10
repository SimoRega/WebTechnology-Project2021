
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
            <img class="card-img-top mb-5 mb-md-0" src="<?php echo UPLOAD_DIR.$item["img"]; ?>" alt="...">
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
            <form action="carrello.php" method="GET">
                <input class="toast" type="num" value=" <?php  echo $item["idProdotto"]; ?>" name="id" >
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" name="qnt" type="num" value="1" style="max-width: 3rem">
                    <input class=" btn btn-primary btn-lg" type="submit">
                </div>
            </form>
        </div>
    </div>
</div>