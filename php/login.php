<?php
require_once("bootstrap.php");

function phpAlert($msg) {     echo '<script type="text/javascript">alert("' . $msg . '")</script>'; }

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


phpAlert(isUserLoggedIn());
if(isUserLoggedIn() == "true"){

    $templateParams["titolo"] = "Blog TW - Admin";
    $templateParams["template"] = "login-home.php";
    require("./templates/base.php");
}
else{
    $templateParams["titolo"] = "Blog TW - Login";
    $templateParams["template"] = "templates/login-form.php";
    require("templates/login-form.php");
}

?>