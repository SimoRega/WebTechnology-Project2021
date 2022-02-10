


<div class="d-flex justify-content-evenly  flex-wrap">
            <section id="configuraModello" class=" rounded-3 bg-light  text-dark ">
                <div class="d-flex flex-column align-items-center pt-3">
                    <p>Stai configurando:</p>                      
                    <h2><?php echo $templateParams["camper"]["nome"]?></h2>
                </div>
    
            </section><section id="configuraImgModello"  class="  rounded-3 bg-light text-dark ">
                <img src="<?php echo UPLOAD_DIR.$templateParams["camper"]["img"]?>" alt="" class="rounded mx-auto d-block">
            </section><section id="configuraPrezzoModello"  class=" rounded-3 bg-light text-dark ">
                <div class="d-flex flex-column align-items-center pt-3">
                    <p>Prezzo totale provvisorio:</p>                      
                    <h5><?php echo $templateParams["camper"]["prezzo"]?></h5>
                </div>
            </section>
        </div>

        <section id="configuraOpzioni"  class="container rounded-3 bg-light p-2 mt-5 text-dark ">
            <div class="d-flex justify-content-between pb-2">
                <button type="button" class="btn btn-primary" name="indietro" >&lt Indietro</button>
                <button type="button" class="btn btn-primary" name="avanti" >Avanti &gt</button>
            </div>

            <div class="d-flex flex-wrap">

              <form action="carrello.php" method="GET">
                <div class="container-fluid sceltaConfiguratore" style="width: 60%; min-width:400px;">
                    <div class="list-group mx-0 my-5">
                        <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="color" id="listGroupRadios1" value="red" checked="">
                        <span>
                            Rosso
                            <small class="d-block text-muted">700</small>
                        </span>
                        </label>
                        <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="color" id="listGroupRadios2" value="green">
                        <span>
                            Verde
                            <small class="d-block text-muted">700</small>
                        </span>
                        </label>
                        <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="color" id="listGroupRadios3" value="blue">
                        <span>
                            Blu
                            <small class="d-block text-muted">700</small>
                        </span>
                        </label>
                    </div>                           
                </div>
                <div class="container-fluid sceltaConfiguratore" style="width: 60%; min-width:400px;">                  
                    <div class="list-group mx-0 my-5">
                            <label class="list-group-item d-flex gap-2">
                            <input class="form-check-input flex-shrink-0" type="radio" name="motor" id="listGroupRadios1" value="120" checked="">
                            <span>
                                Motore 120 cavalli
                                <small class="d-block text-muted">700</small>
                            </span>
                            </label>
                            <label class="list-group-item d-flex gap-2">
                            <input class="form-check-input flex-shrink-0" type="radio" name="motor" id="listGroupRadios2" value="140">
                            <span>
                                Motore 140 cavalli
                                <small class="d-block text-muted">700</small>
                            </span>
                            </label>
                            <label class="list-group-item d-flex gap-2">
                            <input class="form-check-input flex-shrink-0" type="radio" name="motor" id="listGroupRadios3" value="180">
                            <span>
                                Motore 180 cavalli
                                <small class="d-block text-muted">700</small>
                            </span>
                            </label>
                        </div> 
                    </div>
                <div class="container-fluid sceltaConfiguratore" style="width: 60%; min-width:400px;">
                    <div class="list-group mx-0 my-5">
                        <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="package" id="listGroupRadios1" value="comfort" checked="">
                        <span>
                            Pacchetto Comfort
                            <small class="d-block text-muted">Descrizione di cosa c'è nel pacchetto</small>
                            <small class="d-block text-muted">700</small>
                        </span>
                        </label>
                        <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="package" id="listGroupRadios2" value="assistenza">
                        <span>
                            Pacchetto Assistenza alla Guida
                            <small class="d-block text-muted">Descrizione di cosa c'è nel pacchetto</small>
                            <small class="d-block text-muted">700</small>
                        </span>
                        </label>
                        <label class="list-group-item d-flex gap-2">
                        <input class="form-check-input flex-shrink-0" type="radio" name="package" id="listGroupRadios3" value="style">
                        <span>
                            Pacchetto Style
                            <small class="d-block text-muted">Descrizione di cosa c'è nel pacchetto</small>
                            <small class="d-block text-muted">700</small>
                        </span>
                        </label>
                    </div>                    
                </div>
                <a type="button" class="btn btn-danger" name="invia" href="carrello.php?id=<?php echo $templateParams["camper"]["idProdotto"] ?>&qnt=1">Invia</a>
                <input type="submit" value="inviaaaa">
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