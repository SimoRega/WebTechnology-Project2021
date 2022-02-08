<?php
require_once("bootstrap.php");
require_once("utils/functions.php");

if(isset($_GET["id"]) && isset($_GET["qnt"])){
    $id=$_GET["id"];
    $qnt=$_GET["qnt"];
    if(isUserLoggedIn()){
        $checkItem=$dbh->checkItemInCart($_SESSION["email"],$id,$qnt);

        if(empty($checkItem["idProdotto"])){
            $dbh->addToCart($_SESSION["email"],$id,$qnt);
        }else if($checkItem["qnt"]!=$qnt){
            #update, aggiungere quantità
        }
    }else{
        header('Location: login.php');
        exit;
    }
}else if(!isUserLoggedIn()){
    header('Location: login.php');
    exit;
}

$templateParams["title"] = "CamperRomagna - Carrello";
$templateParams["template"] = "carrello-template.php";

require("./templates/base.php");
?>