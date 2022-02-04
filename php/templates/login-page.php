<div class="container rounded-3 bg-light p-3">

    <div class="row">
        <div class="col-8">
            <div class="tab-content m-3  mb-5" id="nav-tabContent">
                <div class="tab-pane fade show active "  id="login" role="tabpanel" aria-labelledby="list-home-list">
                    <form action="login.php" method="POST">
                    <h2>Login</h2>

                    <div class="form-floating m-2">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating m-2">
                        <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="password">
                        <label for="floatingInput">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary " type="submit">Login</button>


                    <div class="list-group" id="list-tab" role="tablist">
                        <p>Non hai un account? <a href="#registrati">Registrati</a> </p>
                    </div>


                    </form>
                </div>

                <div class="tab-pane fade " id="registrati" role="tabpanel" aria-labelledby="list-profile-list">
                    <form action="login.php" method="POST">
                        <h2>Registrati</h2>

                        <div class="form-floating m-2">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nome">
                            <label for="floatingInput">Nome</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="cognome">
                            <label for="floatingInput">Cognome</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="password1">
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="password2">
                            <label for="floatingInput">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary " type="submit">Registrati</button>

                        <div class="list-group" id="list-tab" role="tablist">
                            <p>Hai già un account? <a href="#login">Login</a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
