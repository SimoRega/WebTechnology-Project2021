<div class="container mt-3 white">
    <div class="row ">
        <div class="col-lg-4 mt-3">
            <div class="row">
                <div class="col-lg-12 col-md-6  accTab"  >


                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center"> 

                                <img src="<?php echo UPLOAD_DIR.$dbh->getPropic($_SESSION["email"])[0]["propic"]?>" alt="Propic" class="rounded-circle" width="150">
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
                                <a class="list-group-item list-group-item-action active" id="list-notifiche-list" data-bs-toggle="list" href="#list-notifiche" role="tab" aria-controls="list-notifiche">Notifiche</a>
                                <a class="list-group-item list-group-item-action" id="list-ordini-list" data-bs-toggle="list" href="#list-ordini" role="tab" aria-controls="list-ordini">Ordini</a>
                                <a class="list-group-item list-group-item-action" id="list-password-list" data-bs-toggle="list" href="#list-password" role="tab" aria-controls="list-password">Modifica profilo</a>
                                <?php if($dbh->checkIsAdmin($_SESSION["email"])):?>
                                    <a class="list-group-item list-group-item-action" id="list-product-list" data-bs-toggle="list" href="#list-product" role="tab" aria-controls="list-product">Aggiungi prodotti</a>
                                    <?php endif; ?>
                                <a class="list-group-item list-group-item-action text-danger" id="list-logout-list" data-bs-toggle="list" href="#list-logout" role="tab" aria-controls="list-logout">Logout</a>

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
                <div class="col-12">
                    <div class="tab-content " id="nav-tabContent">
                    <?php $allNotify=$dbh->getNotification($_SESSION["email"])  ?>

                    <div class="tab-pane fade show active text-dark" id="list-notifiche" role="tabpanel" aria-labelledby="list-notifiche-list">
                        <?php foreach($allNotify as $not): ?>
                            <div class="card m-1 text-center">
                                <p> <?php echo $not["descrizione"] ?></p>
                                <hr>
                                <p> <?php echo $not["dataNotifica"] ?></p>
                            </div>
                        <?php endforeach?>
                    </div>



                    <div class="tab-pane fade" id="list-ordini" role="tabpanel" aria-labelledby="list-ordini-list">
                        <?php $allOrder=$dbh->getAllOrder($_SESSION["email"])?>
                        <div class="tab-pane fade show active text-dark" id="list-notifiche" role="tabpanel" aria-labelledby="list-notifiche-list">
                            <?php foreach($allOrder as $not): ?>
                                <div class="card m-1 text-center">
                                    <p> <?php echo "Ordine # ".$not["idOrdine"] ?></p>
                                    <p> <?php echo "Ordine effettuato il: ".$not["dataOrdine"] ?></p>
                                    <p> <?php if($not["isConsegnato"] ){echo "L'ordine è stato consegnato";}else{echo "L'ordine è ancora in transito";} ?></p>

                                </div>
                            <?php endforeach?>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="list-password" role="tabpanel" aria-labelledby="list-password-list">
                        <div class=" form-container ">
                            <form action="account.php" enctype="multipart/form-data" method="POST">

                                <h2>Modifica immagine di profilo</h2>
                                <label for="side-photo">Carica l'immagine</label>
                                <input type="file" id="propic" name="propic" class="form-control text-dark" required><br>

                                <input type="submit" class=" btn btn-light"  value="Carica immagine">

                            </form>
                        </div>
                        <br>


                        <div class=" form-container ">
                            <form action="account.php" method="POST">
                                <h2>Modifica password</h2>
                                <label for="oldPass"> Inserisci la password corrente</label><br>
                                <input type="password"  name="oldPass"/><br>
                                <label for="pass1"> Inserisci la nuova password</label><br>
                                <input type="password" name="newpass1"/><br>
                                <label for="pass2"> Ripeti la password</label><br>
                                <input type="password"  name="newpass2"/><br><br>

                                <input type="submit" class=" btn btn-light"  value="Cambia password">

                            </form>
                        </div>
                    </div>



                    <div class="tab-pane fade" id="list-logout" role="tabpanel" aria-labelledby="list-logout-list">
                        <form action="account.php" method="GET">
                            <button class="m-2 w-100 btn btn-light" type="submit" name="l" value="1">Logout</button>
                        </form>
                    </div>



                    <div class="tab-pane fade" id="list-product" role="tabpanel" aria-labelledby="list-product-list">
                        <form action="" enctype="multipart/form-data" method="POST">

                            <label for="side-photo">Inserisci l'immagine del prodotto</label>
                            <input type="file" id="photo" name="img" class="form-control m-2 text-dark" required>

                            <label for="side-photo">Titolo</label>
                            <input type="text" id="nome-articolo" name="nome" class="form-control m-2 text-dark" required>

                            <label for="side-photo">Marca</label>
                            <input type="text" id="marca" name="marca" class="form-control m-2 text-dark" required>

                            <label for="side-photo">Prezzo</label>
                            <input type="numeric" id="price" name="prezzo" class="form-control m-2 text-dark" required>

                            <label for="side-photo">Inserisci una categoria</label>
                            <input type="text" id="category" name="tipo" class="form-control m-2 text-dark" required>

                            <label for="side-photo">Inserisci una descrizione</label>
                            <input type="text" id="desc" name="descr" class="form-control m-2 text-dark" required>

                            <label for="side-photo">Inserisci la quantità in magazzino</label>
                            <input type="numeric" id="qnt" name="qnt" class="form-control m-2 text-dark" required>

                            <input type="submit" class="m-2 w-100 btn btn-light" value="Aggiungi prodotto">
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>