<?php
session_start();
require_once('connexion_BD.php');
require("panier.class.php");
$panier=new panier($db);

$json=array('error'=>true);

if (isset($_GET['id'])) {
    # code...
    $id=$_GET['id'];
    $select=$db->prepare("SELECT id FROM ouvrage WHERE id=:id");
    $select->execute(array('id'=>$id));
    $product= $select->fetch(PDO::FETCH_OBJ);
    
    if (empty($product)) {
        $json['message']="Ce produit n'existe pas!";
    }
$panier->add($product->id);
$json['error']=false;
$json['total']=$panier->total();
$json['count']=$panier->count();

$json['message']='Produit ajouté au panier';

}else {
    $json['message']=("Aucun produit selectionné pour le panier!");
}
echo json_encode($json);
?>
