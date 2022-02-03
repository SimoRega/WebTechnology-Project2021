<?php
require_once("bootstrap.php");

$templateParams["title"] = "CamperRomagna - Home";
$templateParams["template"] = "login-home.php";


if(isset($_GET["l"])){
    unset($_SESSION["cognome"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["email"]);

}

if(isset($_POST["oldPass"]) && isset($_POST["newpass1"]) && isset($_POST["newpass2"])){
    if($_POST["newpass1"] ==  $_POST["newpass2"] ){
        if(count($dbh->checkLogin($_SESSION["email"],$_POST["oldPass"]))==0){
            $message = "La password non è corretta";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }else{
            $dbh->updatePass($_SESSION["email"],$_POST["newpass1"]);

            $message = "Password cambiata correttamente!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }else {
        $message = "Le password non coincidono";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}


if(!isUserLoggedIn()){
    header('Location: login.php');
}
require("./templates/base.php");
?>