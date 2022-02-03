<div class="container mt-3 white">
    <div class="row ">
        <div class="col-lg-4 mt-3">
            <div class="row">
                <div class="col-lg-12 col-md-6  accTab"  >


                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center"> 
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h3 class="text-secondary mb-1"><?php echo $_SESSION["nome"]?></h3>

                                    <p class="text-muted font-size-sm"><?php echo $_SESSION["email"]?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-12 mt-3 ">
                        <div class="list-group" id="list-tab" role="tablist">


                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#notifiche" role="tab" aria-controls="notifiche">Notifiche</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#ordini" role="tab" aria-controls="ordini">I miei ordini</a>
                            <a class="list-group-item list-group-item-action" id="list-password-list" data-toggle="list" href="#change-password" role="tab" aria-controls="password">Cambia password</a>
                            <a class="list-group-item list-group-item-action" id="list-logout-list" data-toggle="list" href="#logout" role="tab" aria-controls="logout">Logout</a>
                            
                            
                            <?php if($dbh->checkIsAdmin($_SESSION["email"])):?>

                            <a class="list-group-item list-group-item-action" id="list-prodotti-list" data-toggle="list" href="#prodotti" role="tab" aria-controls="prodotti">Aggiungi prodotti</a>
                            
                            <?php endif; ?>
                        

                        </div>
                    </div>
                
            </div>
            
        </div>
    </div>
    
    <div class="col-lg-8 mt-3" >
        <div class="row">
            <div class="col-lg-12 col-md-6  accTab " >
                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="notifiche" role="tabpanel" aria-labelledby="list-home-list">    
                        notifiche
                    </div>
                    
                    <div class="tab-pane fade" id="ordini" role="tabpanel" aria-labelledby="list-profile-list">
                        ordini
                    </div>


                    <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="list-password-list">
                        <div class=" form-container ">
                            <form action="account.php" method="POST">
                                <h2>Modifica password!</h2>
                                <label for="oldPass"> Inserisci la password corrente</label><br>
                                <input type="password"  name="oldPass"/><br>
                                <label for="pass1"> Inserisci la nuova password</label><br>
                                <input type="password" name="newpass1"/><br>
                                <label for="pass2"> Ripeti la password</label><br>
                                <input type="password"  name="newpass2"/><br><br>

                                <input type="submit"  value="Cambia password">

                            </form>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="logout" role="tabpanel" aria-labelledby="list-logout-list">
                        <form action="account.php" method="GET">
                            <button type="submit" name="l" value="1">Logout</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="prodotti" role="tabpanel" aria-labelledby="list-prodotti-list">
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

                            <input type="submit"  value="Aggiungi prodotto">
                        </form>
                    </div>
                    
    
                </div>
            </div>
        </div>
    </div>
</div>
