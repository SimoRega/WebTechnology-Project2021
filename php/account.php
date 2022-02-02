<?php
require_once("bootstrap.php");

$templateParams["title"] = "CamperRomagna - Home";
$templateParams["template"] = "login-home.php";

if(!isUserLoggedIn()){
    header('Location: login.php');
}

require("./templates/base.php");
?>