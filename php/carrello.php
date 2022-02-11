<?php
require_once("bootstrap.php");
require_once("utils/functions.php");
$templateParams["title"] = "CamperRomagna - Carrello";


if(isset($_GET["id"]) && isset($_GET["qnt"])){
    $id=$_GET["id"];
    $qnt=$_GET["qnt"];
    if(isUserLoggedIn()){
        $checkItem=$dbh->checkItemInCart($_SESSION["email"],$id);


        if(empty($checkItem[0]["idProdotto"])){
            if($dbh->getTipologia($id)=="camper"){
                $dbh->salvaConfigurazione($_GET["color"],$_GET["motor"],$_GET["optional"]);
                $lastID=$dbh->getLastConfId()[0]["idConfigurazione"];
                $dbh->addToCart($_SESSION["email"],$id,$qnt,$lastID);    
            }else{
                $dbh->addToCart($_SESSION["email"],$id,$qnt,NULL);
            }
        }else if($qnt==0){
            $dbh->removeItemCart($_SESSION["email"],$id,$_GET["idConfigurazione"]);
            $item= $dbh->getCartItems($_SESSION["email"]);
            if(empty($item[0]["idProdotto"])){
                $templateParams["template"] = "carrello-vuoto-template.php";
                require("./templates/base.php");
                exit;
            }
        }else if($checkItem[0]["qnt"]!=0){
            #update, aggiungere quantità
            if($dbh->getTipologia($id)=="camper"){
                $dbh->salvaConfigurazione($_GET["color"],$_GET["motor"],$_GET["optional"]);
                $lastID=$dbh->getLastConfId()[0]["idConfigurazione"];
                $dbh->addToCart($_SESSION["email"],$id,$qnt,$lastID);
            }else{
                $q=$qnt+$checkItem[0]["qnt"];
                $dbh->updateCart($_SESSION["email"],$id,$q);
            }
        } 
    }else{
        header('Location: login.php');
        exit;
    }
}else {
    if(!isUserLoggedIn()){
        header('Location: login.php');
    }else{
        $item= $dbh->getCartItems($_SESSION["email"]);
        if(empty($item[0]["idProdotto"])){
            $templateParams["template"] = "carrello-vuoto-template.php";
            require("./templates/base.php");
            exit;
        }
    }
}

$templateParams["template"] = "carrello-template.php";
require("./templates/base.php");
?>