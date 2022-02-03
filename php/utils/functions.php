<?php


function isUserLoggedIn(){
    return isset($_SESSION["email"]) && !empty($_SESSION['email']); 
}

function checkPass($pass){
}

function registerLoggedUser($user){
    $_SESSION["email"] = $user["email"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["cognome"] = $user["cognome"];
}

?>