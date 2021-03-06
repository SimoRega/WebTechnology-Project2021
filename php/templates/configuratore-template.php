


<div class="d-flex justify-content-evenly  flex-wrap">
            <section id="configuraModello" class=" rounded-3 bg-light  text-dark my-1">
                <div class="d-flex flex-column align-items-center pt-3">
                    <p>Stai configurando:</p>                      
                    <p class="fs-2"><?php echo $templateParams["camper"]["nome"]?></p>
                </div>
    
            </section><section id="configuraImgModello"  class="  rounded-3 bg-light text-dark my-1">
                <img src="<?php echo UPLOAD_DIR.$templateParams["camper"]["img"]?>" alt="" class="rounded mx-auto d-block">
            </section>
            <section id="configuraPrezzoModello"  class=" rounded-3 bg-light text-dark my-1">
                <div class="d-flex flex-column align-items-center pt-3">
                    <p>Prezzo totale provvisorio:</p>                      
                    <h5 id="prezzo"><?php echo $templateParams["camper"]["prezzo"]?></h5>
                </div>
            </section>
        </div>

        <section id="configuraOpzioni"  class="container rounded-3 bg-light p-2 mt-5 text-dark ">
            <div class="d-flex justify-content-between pb-2">
                <!--<button type="button" class="btn btn-primary" name="indietro" >&lt Indietro</button>-->
                <button type="button" class="btn btn-primary" name="avanti" >Avanti</button>
            </div>

            <div class="d-flex flex-wrap">

              <form action="carrello.php" method="POST">
              <input  type="hidden" value="<?php  echo $templateParams["camper"]["idProdotto"]; ?>" name="id" >
              <input  type="hidden" value="1" name="qnt" >
              <input id="ip" type="hidden" value="<?php  echo $templateParams["camper"]["prezzo"]; ?>" name="prezzo" >
                <div class="container-fluid sceltaConfiguratore" style="width: 60%; min-width:400px;">
                    <div class="list-group mx-0 my-5">
                        <fieldset>

                            <?php foreach ($templateParams["colore"] as $colori):?>
                                <label for="Color<?php echo $colori["idColore"]?>" class="list-group-item d-flex gap-2">
                                    <input id="Color<?php echo $colori["idColore"]?>" class="form-check-input flex-shrink-0 inputprezzo" type="radio" name="color" value="<?php echo $colori["idColore"]?>" checked="">
                                    <span>
                                        <?php echo $colori["nome"]?>
                                        <small class="d-block text-muted"><?php echo $colori["costo"]?></small>
                                    </span>
                                </label>
                                <?php endforeach; ?> 
                            </fieldset>
                    </div>                           
                </div>
                <div class="container-fluid sceltaConfiguratore" style="width: 60%; min-width:400px;">                  
                    <div class="list-group mx-0 my-5">
                        <fieldset>

                            <?php foreach ($templateParams["motore"] as $motori):?>
                                <label for="Motor<?php echo $motori["idMotore"]?>" class="list-group-item d-flex gap-2">
                                    <input class="form-check-input flex-shrink-0 inputprezzo" type="radio" name="motor" id="Motor<?php echo $motori["idMotore"]?>" value="<?php echo $motori["idMotore"]?>" checked="">
                                    <span>
                                        <?php echo $motori["nome"]?>
                                        <small class="d-block text-muted"><?php echo $motori["costo"]?></small>
                                    </span>
                                </label>
                                <?php endforeach; ?> 
                            </fieldset>
                        </div> 
                    </div>
                <div class="container-fluid sceltaConfiguratore" style="width: 60%; min-width:400px;">
                    <div class="list-group mx-0 my-5">
                        <fieldset>

                            <?php foreach ($templateParams["optional"] as $optional):?>
                                <label for="Optional<?php echo $optional["idOptional"]?>" class="list-group-item d-flex gap-2">
                                    <input id="Optional<?php echo $optional["idOptional"]?>" class="form-check-input flex-shrink-0 inputprezzo" type="radio" name="optional" value="<?php echo $optional["idOptional"]?>" checked="">
                                    <span>
                                        <?php echo $optional["nome"]?>
                                        <small class="d-block text-muted"><?php echo $optional["costo"]?></small>
                                    </span>
                                </label>
                                <?php endforeach; ?>
                            </fieldset>
                            </div>                    
                </div>
                <button class="btn btn-danger disabled" name="invia" type="submit" value="inviaaaa">Aggiungi al Carrello</button>
              </form>


                <div id="stepConfigurazione" class="container-fluid" style="width:20%;min-width:200px;max-width: 300px;">
                    <ol>
                        <li>Colore</li>
                        <li>Motore</li>
                        <li>Pacchetti</li>
                    </ol>
                </div>
            </div>

        </section>