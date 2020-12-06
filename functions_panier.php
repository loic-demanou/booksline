<?php
    require_once("connexion_BD.php");

function creationPanier(){
    require_once("connexion_BD.php");

    if (!isset($_SESSION['panier'])) {
        
        $_SESSION['panier']=array();
        $_SESSION['panier']['libelleProduit']=array();
        $_SESSION['panier']['qteProduit']=array();
        $_SESSION['panier']['prixProduit']=array();
        $_SESSION['panier']['verrou']=false;
        $data=$db->prepare("SELECT tva FROM ouvrage");
        $data->execute(array());

        $data=$select->fetch(PDO::FETCH_OBJ);

        $_SESSION['panier']['tva']=$data->$tva;

    }
    return true;

}

function ajouterArticle($libelleProduit,$qteProduit,$prixProduit){

    if (creationPanier() && !isVerouille()) {
        
        $positionProduit=array_search($libelleProduit,$_SESSION['panier']['libelleProduit']);
        if ($positionProduit !== false) {

            $_SESSION['panier']['libelleProduit'][$positionProduit] += $qteProduit;
            
        }else {
            
            array_push($_SESSION['panier']['libelleProduit'],$libelleProduit);
            array_push($_SESSION['panier']['qteProduit'],$qteProduit);
            array_push($_SESSION['panier']['prixProduit'],$prixProduit);

        }
    }else {
        
        echo "Erreur, veuillez contacter l'administrateur!";
    }
}

function ModifierQTeArticle($libelleProduit,$qteProduit){

    if (creationPanier() && !isVerouille()) {
        if ($qteProduit>0) {
            
            $positionProduit=array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);
            if ($positionProduit!==false) {
                $_SESSION['panier']['qteProduit'][$positionProduit]=$qteProduit;
                
            }
        }else {
            
            supprimerArticle($libelleProduit);
        }

    }else {
        
        echo "Erreur, veuillez contacter l'administrateur!";
    }

}

function supprimerArticle($libelleProduit){
    if (creationPanier() && !isVerouille()) {

        $tmp=array();
        $tmp['libelleProduit']=array();
        $tmp['qteProduit']=array();
        $tmp['prixProduit']=array();
        $tmp['verrou']=$_SESSION['panier']['verrou'];

        for($i=0 ; $i<count($_SESSION['panier']['libelleProduit']); $i++){

            if($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit){

                array_push($tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
                array_push($tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
                array_push($tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
    
            }
        }

        $_SESSION['panier']=$tmp;
        unset($tmp);
        
    }else {
        echo "Erreur, veuillez contacter l'administrateur!";
    }

}

function montantGlobal(){

    $total=0;
    for($i=0; $i<count($_SESSION['panier']['libelleProduit']); $i++){

        $total += $_SESSION['panier']['qteProduit'][$i]*$_SESSION['panier']['prixProduit'][$i];
    }
    return $total;
}


function montantGlobalTva(){

    $total=0;
    for($i=0; $i<count($_SESSION['panier']['libelleProduit']); $i++){

        $total += $_SESSION['panier']['qteProduit'][$i]*$_SESSION['panier']['prixProduit'][$i];
        $totalGlobal=$total+$total * 19.25/100;
    }
    return $totalGlobal;
}



function supprimerPanier(){
    unset($_SESSION['panier']);

}


function isVerouille(){

    if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou']) {
        
        return true;
    }else {
        
        return false;
    }
}


function compterArticles(){

    if (isset($_SESSION['panier'])) {
        
        return count($_SESSION['panier']['libelleProduit']);
    }else {
        return 0;
    }

}


?>