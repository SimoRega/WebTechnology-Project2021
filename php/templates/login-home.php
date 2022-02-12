<div class="container mt-3 white">
    <div class="row ">
        <div class="col-lg-4 mt-3">
            <div class="row">
                <div class="col-lg-12 col-md-6  accTab"  >
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?php echo UPLOAD_DIR.$dbh->getPropic($_SESSION["email"])[0]["propic"]?>" alt="user Propic" class="rounded-circle" width="150">
                            <div class="mt-3">
                            <h3 class="text-secondary mb-1"><?php echo $_SESSION["nome"]?></h3>
                            <p class="text-muted font-size-sm"><?php echo $_SESSION["email"]?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3 ">
                    <div class="row ">
                        <div class="col-12">
                            <div class="list-group" id="list-tab" role="tablist">
                                <?php if($dbh->checkIsAdmin($_SESSION["email"])):?>
                                    <a class="list-group-item list-group-item-action active" id="list-order-list" data-bs-toggle="list" href="#list-order" role="tab" aria-controls="list-order" onclick="$('.activeOrdine').removeClass('bg-warning');">Gestisci ordini</a>
                                    <a class="list-group-item list-group-item-action  " id="list-product-list" data-bs-toggle="list" href="#list-product" role="tab" aria-controls="list-product" onclick="$('.activeOrdine').removeClass('bg-warning');">Aggiungi prodotti</a>
                                    <a class="list-group-item list-group-item-action  " id="list-editproduct-list" data-bs-toggle="list" href="#list-editproduct" role="tab" aria-controls="list-editproduct" onclick="$('.activeOrdine').removeClass('bg-warning');">Modifica prodotti</a>
                                <?php endif; ?>
                                <a class="list-group-item list-group-item-action <?php if(!$dbh->checkIsAdmin($_SESSION["email"])){echo "active";}?> " id="list-ordini-list" data-bs-toggle="list" href="#list-ordini" role="tab" aria-controls="list-ordini" onclick="$('.activeOrdine').removeClass('bg-warning');">I miei ordini</a>
                                <a class="list-group-item list-group-item-action " id="list-notifiche-list" data-bs-toggle="list" href="#list-notifiche" role="tab" aria-controls="list-notifiche" >Le mie notifiche</a>
                                <a class="list-group-item list-group-item-action" id="list-password-list" data-bs-toggle="list" href="#list-password" role="tab" aria-controls="list-password" onclick="$('.activeOrdine').removeClass('bg-warning');">Modifica profilo</a>
                                <a class="list-group-item list-group-item-action text-danger" id="list-logout-list" data-bs-toggle="list" href="#list-logout" role="tab" aria-controls="list-logout" onclick="$('.activeOrdine').removeClass('bg-warning');">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-3" >
            <div class="row">
                <div class="col-lg-12 col-md-6  accTab " >
                <div class="col-12 ">
                    <div class="tab-content " id="nav-tabContent">
                        

                        <div class="tab-pane fade  text-dark" id="list-notifiche" role="tabpanel" aria-labelledby="list-notifiche-list">
                            <?php $allNotify=$dbh->getNotification($_SESSION["email"])  ?>
                            <?php 
                                if(empty($allNotify)):
                            ?>
                                <p class="card">Non ci sono notifiche</p>
                            <?php
                                endif;
                            ?>
                            <?php foreach($allNotify as $not): ?>
                            <div class="card text-center my-2">
                            <p> <?php echo $not["descrizione"] ?></p>
                            <hr>
                            <p> <?php echo $not["dataNotifica"] ?></p>
                            <div class="list-group " role="tablist">
                                <a class="w-25 m-auto my-1 btn btn-warning" data-bs-toggle="list" href="#list-ordini" role="tab" aria-controls="list-ordini" onclick="$('#<?php echo $not['idOrdine']?>').addClass('bg-warning');$(this).removeClass('active');">
                                Visualizza Ordine
                                </a>
                            </div>
                            </div>
                            <?php endforeach?>
                        </div>


                        <div class="tab-pane fade  text-dark <?php if(!$dbh->checkIsAdmin($_SESSION["email"])){echo "show active";}?>" id="list-ordini" role="tabpanel" aria-labelledby="list-ordini-list">
                            <?php $allOrder=$dbh->getAllOrder($_SESSION["email"]);
                                if(empty($allOrder)):
                            ?>
                                <p class="card">Non ci sono ordini</p>
                            <?php
                                endif;
                            ?>
                            <?php foreach($allOrder as $order): ?>
                            <div class="card m-1 text-center p-2 activeOrdine" id="<?php echo $order["idOrdine"];?>">
                            <h3> <?php echo "Ordine # ".$order["idOrdine"] ?></h3>
                            <p> <?php echo "Ordine effettuato il: ".$order["dataOrdine"] ?></p>
                            <p> <?php echo "Stato ordine: ".$order["stato"] ?></p>
                            <?php if($order["stato"]=="Spedito"):?>
                                    <form action="account.php" method="POST">
                                    <input type="hidden"  name="idOrdine" value="<?php echo $order["idOrdine"] ?>">
                                    <input type="submit"  class="btn btn-danger" name="ordineArrivato" value="Arrivato">
                                    </form>
                                <?php endif; ?>
                            <?php
                                $prodInOrder = $dbh->getProdOnOrder($order["idOrdine"]);
                                foreach($prodInOrder as $prod):
                                ?>
                            <hr>
                            <div class="text-center">
                                <p class="fw-bold"><?php echo $prod["nome"]." x ".$prod["qnt"]?></p>
                                <img  src="<?php echo UPLOAD_DIR.$prod["img"]?>" class="w-25 img-thumbnail rounded " alt="image <?php echo $prod["nome"]?>" style="max-width:100px;">
                            </div>
                            <?php
                                endforeach;
                                ?>
                                
                            </div>
                            <?php endforeach?>
                        </div>


                        <div class="tab-pane fade" id="list-password" role="tabpanel" aria-labelledby="list-password-list">
                            <div class=" form-container ">
                            <form action="account.php" enctype="multipart/form-data" method="POST">
                                <h2>Modifica immagine di profilo</h2>
                                <label for="propic">Carica l'immagine</label>
                                <input type="file" id="propic" name="propic" class="form-control text-dark" required><br>
                                <input type="submit" class=" btn btn-light"  value="Carica immagine">
                            </form>
                            </div>
                            <br>
                            <div class=" form-container ">
                            <form action="account.php" method="POST">
                                <h2>Modifica password</h2>
                                <label for="oldPass"> Inserisci la password corrente</label><br>
                                <input type="password" class="form-control" id="oldPass"  name="oldPass"/><br>
                                <label for="pass1"> Inserisci la nuova password</label><br>
                                <input type="password" class="form-control" id="pass1" name="newpass1"/><br>
                                <label for="pass2"> Ripeti la password</label><br>
                                <input type="password" class="form-control" id="pass2"  name="newpass2"/><br><br>
                                <input type="submit" class=" btn btn-light"  value="Cambia password">
                            </form>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="list-logout" role="tabpanel" aria-labelledby="list-logout-list">
                            <form action="account.php" method="GET">
                            <button class="m-2 w-100 btn btn-light" type="submit" name="l" value="1">Logout</button>
                            </form>
                        </div>



                        <div class="tab-pane fade " id="list-editproduct" role="tabpanel" aria-labelledby="list-editproduct-list">
                            <h2>Modifica prodotti</h2>
                            <?php 
                                $AllProd = $dbh->getAllProdotti();
                                foreach($AllProd as $singleProd):
                            ?>
                                <div class="card m-2 p-1 text-dark">
                                    <form action="account.php" class="row row-col-auto" method="POST">
                                        <input type="hidden" name="idProdottoToEdit" value="<?php echo $singleProd["idProdotto"] ?>">
                                        <div class="row">
                                            <div class="col-4">
                                                <label class="form-label" for="name<?php echo $singleProd["idProdotto"]?>"> Nome</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control" id="name<?php echo $singleProd["idProdotto"]?>" name="newName" value="<?php echo $singleProd["nome"] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                            <label class="form-label" for="prezzo<?php echo $singleProd["idProdotto"]?>"> Prezzo</label>
                                            </div>
                                            <div class="col-8">
                                            <input type="text" class=" form-control" id="prezzo<?php echo $singleProd["idProdotto"]?>" name="newPrice" value="<?php echo $singleProd["prezzo"] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                            <label class="form-label" for="qnt<?php echo $singleProd["idProdotto"]?>"> Quantità</label>
                                            </div>
                                            <div class="col-8">
                                            <input type="text" class="form-control" id="qnt<?php echo $singleProd["idProdotto"]?>" name="newQnt" value="<?php echo $singleProd["qnt"] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                            <input type="submit" class=" btn btn-primary " name="editProdButton" value="Modifica">
                                            </div>
                                            <div class="col">
                                            <input type="submit" class=" btn btn-danger "  name="delProdButton" value="Elimina">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php 
                                endforeach;
                            ?>
                        </div>


                        <div class="tab-pane fade text-dark <?php if($dbh->checkIsAdmin($_SESSION["email"])){echo "show active";}?>" id="list-order" role="tabpanel" aria-labelledby="list-order-list">
                            <?php 
                            $allOrder = $dbh->getOrder();
                            foreach($allOrder as $o):
                            ?>
                            <div class="card p-2 m-1">
                            <div class="row row-col-auto ">
                                <div class="col-6">
                                    <span> <?php echo "Ordine # ".$o["idOrdine"]; ?> </span>
                                </div>
                                <div class="col-6">
                                    <span> <?php echo "Stato corrente: ".$o["stato"]; ?> </span>
                                </div>
                                <div class="col-12">
                                    <span> <?php echo "Città: ".$o["citta"]; ?> </span>
                                    <span> <?php echo "Via: ".$o["via"]; ?> </span>
                                    <span> <?php echo "Cap: ".$o["cap"]; ?> </span>

                                </div>
                                <div class="mx-auto ">

                                    <form action="account.php"  method="POST">
                                        <input type="hidden"  name="idOrdine" value="<?php echo $o["idOrdine"] ?>">
                                    <?php 
                                        if($o["stato"] == "Cancellato" || $o["stato"] == "Consegnato"):
                                            ?>
                                        <input type="submit" disabled class="btn btn-primary" name="spedisciOrdine" value="Spedisci">
                                        <input type="submit" disabled class="btn btn-danger" name="cancecllaOrdine" value="Cancella">
                                        <?php
                                        elseif($o["stato"] == "Spedito"):
                                            ?>
                                        <input type="submit" disabled class="btn btn-primary" name="spedisciOrdine" value="Spedisci">
                                        <input type="submit"  class="btn btn-danger" name="cancecllaOrdine" value="Cancella">
                                        <?php
                                        else:
                                            ?>
                                        <input type="submit"  class="btn btn-primary" name="spedisciOrdine" value="Spedisci">
                                        <input type="submit"  class="btn btn-danger" name="cancecllaOrdine" value="Cancella">
                                        <?php
                                        endif;
                                        ?>
                                    </form>
                                </div>
                            </div>
                            <?php
                                $prodInOrder = $dbh->getProdOnOrder($o["idOrdine"]);
                                foreach($prodInOrder as $prod):
                                ?>
                            <hr class="dropdown-divider">
                            <p class=""><?php echo $prod["qnt"]." x ".$prod["nome"]?></p>
                            <?php
                                endforeach;
                                ?>
                            </div>
                            <?php 
                            endforeach;
                            ?>
                        </div>


                        <div class="tab-pane fade" id="list-product" role="tabpanel" aria-labelledby="list-product-list">
                            <form action="account.php" enctype="multipart/form-data" method="POST">
                            <label for="img">Inserisci l'immagine del prodotto</label>
                            <input type="file" id="img" name="img" class="form-control m-2 text-dark" required>
                            <label for="nome">Titolo</label>
                            <input type="text" id="nome" name="nome" class="form-control m-2 text-dark" required>
                            <label for="marca">Marca</label>
                            <input type="text" id="marca" name="marca" class="form-control m-2 text-dark" required>
                            <label for="prezzo">Prezzo</label>
                            <input type="number" id="prezzo" name="prezzo" class="form-control m-2 text-dark" required>
                            <label for="tipo">Inserisci una categoria</label>
                            <select type="text" class="form-select bg-white m-2 text-dark"  name="tipo" id="tipo">
                                <?php $tipologie=$dbh->getAllTipologie(); ?>
                                <?php foreach($tipologie as $t): ?>
                                <option class="text-black" value="<?php echo $t["tipo"];?>"><?php echo $t["tipo"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="descr">Inserisci una descrizione</label>
                            <input type="text" id="descr" name="descr" class="form-control m-2 text-dark" required>
                            <label for="qnt">Inserisci la quantità in magazzino</label>
                            <input type="number" id="qnt" name="qnt" class="form-control m-2 text-dark" required>
                            <input type="submit" class="m-2 w-100 btn btn-light" value="Aggiungi prodotto">
                            </form>
                        </div>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>