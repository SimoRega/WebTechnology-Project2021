<?php


function isUserLoggedIn(){
    if( isset($_SESSION["email"]) && !empty($_SESSION['email'] )){
        return "true";
    }else {
        return "false";
    };
}

 function registerLoggedUser($user){
    $_SESSION["email"] = $user["email"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["cognome"] = $user["cognome"];
}

?>