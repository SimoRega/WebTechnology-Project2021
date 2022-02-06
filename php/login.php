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

if(isset($_POST["email"]) && isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["password1"]) && isset($_POST["password2"])){
    if($_POST["password1"] != $_POST["password2"]){
        echo "<script type='text/javascript'>alert('Le password non coincidono');</script>";
    }else{

        $dbh->registerUser($_POST["email"],$_POST["nome"],$_POST["cognome"],$_POST["password1"]);
        echo "<script type='text/javascript'>alert('2');</script>";

        $login_result = $dbh->checkLogin($_POST["email"], $_POST["password1"]);
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