<?php
    $item= $dbh->getCartItems($_SESSION["email"]);
?>
<section id="listaArticoli" class=" container-fluid rounded-3 bg-light p-2 mt-5 text-dark">
            <h3 class="ps-3">I miei articoli</h3>
            <div class="container ">
                <div class="list-group">

                <?php foreach($item as $i): ?>
                    <div href="item.php?id=<?php echo $i["idProdotto"]?>" class="list-group-item list-group-item-action " aria-current="true"> 
                      <div class="d-flex w-100 justify-content-between align-items-center flex-wrap">
                        <img src="<?php echo UPLOAD_DIR.$i["img"]?>" class="img-thumbnail rounded " alt="..." style="max-width:200px;">
                        <div class="d-flex flex-column">
                            <small class="text-muted"><?php echo $i["marca"]?></small>
                            <h5 class="mb-1 pe-1"><?php echo $i["nome"]?></h5>
                        </div>
                        <div class="d-flex flex-column">
                          <p>Prezzo: € <span class="fw-bold prezzo"><?php echo $i["prezzo"]?></span></p>
                          <div class="d-flex justify-content-end align-items-center">
                            <span class="pe-3">Quantità :</span>
                            <button type="button" name="minus" class="btn btn-primary btn-sm" onclick="diminuisciQ()">-</button>
                            <span class="ps-1 pe-1 quantity"><?php echo $i["qntCart"]?></span>
                            <button type="button" class="btn btn-primary btn-sm" name="plus" onclick="aumentaQ()">+</button>
                          </div>
                        </div>
                      </div>
                </div>
                    <?php endforeach; ?>     
                </div>
            </div>
        </section><aside id="totale" class="mt-5">
            <div class="container-fluid">
                <div class="card" >
                    <div class="card-body d-flex flex-column mb-3">
                        
                      <h5 class="card-title">Totale Provvisorio: </h5>
                      <p class="card-text fw-bold fs-1 prezzoFinale" onload="calcolaTotale();" ></p>
                      <a href="acquisto.html" class="btn btn-primary">Procedi all'acquisto</a>
                    </div>
                  </div>
            </div>
        </aside>