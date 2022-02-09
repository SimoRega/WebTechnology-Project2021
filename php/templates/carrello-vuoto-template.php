<section id="listaArticoli" class=" container-fluid rounded-3 bg-light p-2 mt-5 text-dark">
            <h3 class="ps-3">I miei articoli</h3>
            <div class="container ">
                <div class="list-group rounded-3 bg-warning d-flex flex-column align-items-center p-4">
                    <h4 class="fw-2 fs-2 pt-4">IL TUO CARRELLO È  VUOTO!</h4> 
                    <p>Vai nella sezione Shop e aggiungi accessori e camper al carrello</p>
                    <a class="btn btn-outline-primary m-1" role="button" href="shop.php?tipo=camper">Shop sezione camper</a>
                    <a class="btn btn-outline-primary m-1" role="button" href="shop.php?tipo=accessori">Shop sezione accessori</a>
                </div>
            </div>
        </section>
        <aside id="totale" class="mt-5">
            <div class="container-fluid">
                <div class="card" >
                    <div class="card-body d-flex flex-column mb-3">
                        
                      <h5 class="card-title">Totale Provvisorio: </h5>
                      <p class="card-text fw-bold fs-1 prezzoFinale" onload="calcolaTotale();" ></p>
                      <a href="acquisto.php" class="btn btn-primary">Procedi all'acquisto</a>
                    </div>
                  </div>
            </div>
        </aside>