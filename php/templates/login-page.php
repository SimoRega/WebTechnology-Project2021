<div class="container rounded-3 bg-light p-3">

    <div class="row">
        <div class="col-8 m-auto">
            <?php 
                if(isset($templateParams["errorelogin"] )):
            ?>
                <span class="bg-red-500">Errore, controlla mail e password</span>
            <?php
                endif;
            ?>
            <div class="tab-content m-3  mb-5  list-group list-tab" id="nav-tabContent">
                <div class="tab-pane fadeIn fade show active "  id="login" role="tabpanel" >
                    <form action="login.php" method="POST">
                    <h2>Login</h2>

                    <div class="form-floating m-2">
                        <input type="email" class="form-control" id="loginEmail" placeholder="name@example.com" name="email">
                        <label for="loginEmail">Email</label>
                    </div>
                    <div class="form-floating m-2">
                        <input type="password" class="form-control" id="loginPass" placeholder="name@example.com" name="password">
                        <label for="loginPass">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary " type="submit">Login</button>


                    <div class=" ">
                            <p>Non hai un account? <a class=""  data-bs-toggle="list" href="#registrati">Registrati</a> </p>
                    </div>


                    </form>
                </div>

                <div class="tab-pane  " id="registrati" role="tabpanel" >
                    <form action="login.php" method="POST">
                        <h2>Registrati</h2>

                        <div class="form-floating m-2">
                            <input type="email" class="form-control" id="RegistratiMail" placeholder="name@example.com" name="email">
                            <label for="RegistratiMail">Email</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="text" class="form-control" id="RegistratiNome" placeholder="name@example.com" name="nome">
                            <label for="RegistratiNome">Nome</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="text" class="form-control" id="RegistratiCognome" placeholder="name@example.com" name="cognome">
                            <label for="RegistratiCognome">Cognome</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="password" class="form-control" id="RegistratiPass1" placeholder="name@example.com" name="password1">
                            <label for="RegistratiPass1">Password</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="password" class="form-control" id="RegistratiPass2" placeholder="name@example.com" name="password2">
                            <label for="RegistratiPass2">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary " type="submit">Registrati</button>

                       
                        <div class=" ">
                            <p>Hai già un account? <a class=""  href="login.php" >Login</a> </p>                        
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
