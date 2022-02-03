<div class="container rounded-3 bg-light p-3">

    <div class="row">
        <div class="col-8">
            <div class="tab-content m-3 " id="nav-tabContent">
                <div class="tab-pane fade show active "  id="login" role="tabpanel" aria-labelledby="list-home-list">
                    <h2>Login</h2>
                    <form action="login.php" method="POST">

                    <div class="form-floating m-2">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating m-2">
                        <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="password">
                        <label for="floatingInput">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary " type="submit">Sign in</button>

                    </form>
                </div>

                <div class="tab-pane fade" id="registrati" role="tabpanel" aria-labelledby="list-profile-list">
                    <h2>Registrati</h2>
                </div>
            </div>
        </div>
    </div>

        <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#login" role="tab" aria-controls="list-home">Login</a>
                <a style="position:absolute;right:20%;max-width:30%" class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#registrati" role="tab" aria-controls="list-profile">Registrati</a>
            </div>
        </div>
</div>
