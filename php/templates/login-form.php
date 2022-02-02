
<div id="login">
       <link href="../css/login-style.css" rel="stylesheet" type="text/css" >
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="#" method="POST">
                    <h1>Crea il tuo Account</h1>
                    
                    <input type="text" placeholder="Nome" />
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Password" />
                    <button>Iscriviti</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="login.php" method="POST">
                    <h1>Bentornato!</h1>
                    
                    <input type="email" placeholder="Email" name="email"/>
                    <input type="password" placeholder="Password" name="password"/>
                    <a href="#">Dimenticato le credenziali?</a>
                    <button>Accedi</button>
                    <input type="submit"  value="Accedi">

                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Ciao, Bentornato!</h1>
                        <p>Per restare connessi e salvare i propri dati effettua l'Accesso</p>
                        <button class="ghost" id="signIn">Accedi</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Ciao, nuovo qui?</h1>
                        <p>Goditi a pieno le potenzialità del nostro sito iscrivendoti !</p>
                        <button class="ghost" id="signUp">Registrati</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/login-script.js"></script>

</div>