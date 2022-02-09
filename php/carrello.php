<?php
require_once("bootstrap.php");
require_once("utils/functions.php");

if(isset($_GET["id"]) && isset($_GET["qnt"])){
    $id=$_GET["id"];
    $qnt=$_GET["qnt"];
    if(isUserLoggedIn()){
        $checkItem=$dbh->checkItemInCart($_SESSION["email"],$id);

        if(empty($checkItem[0]["idProdotto"])){
            $dbh->addToCart($_SESSION["email"],$id,$qnt);
        }else if($checkItem[0]["qnt"]!=0){
            #update, aggiungere quantità
            $q=$qnt+$checkItem[0]["qnt"];
            $dbh->updateCart($_SESSION["email"],$id,$q);
        }else if($checkItem[0]["qnt"]==0){
            $dbh->removeItemCart($_SESSION["email"],$id);
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