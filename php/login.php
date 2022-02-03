<?php
require_once("bootstrap.php");


$templateParams["title"] = "CamperRomagna - Login";
$templateParams["template"] = "login-form.php";

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare email o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}


if(isUserLoggedIn()){
    header('Location: account.php');
}
else{
    $templateParams["titolo"] = "Login";
    $templateParams["template"] = "login-page.php";
}

require("./templates/base.php");

?>