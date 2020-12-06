<?php
session_start();
require_once('connexion_BD.php');
require("panier.class.php");
require('functions_panier.php');
require("header.php");
require_once('paypal.php');
$panier=new panier($db);

?>

<?php

?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/supprimerUser.css">
        <title>Panier</title>
    </head>
    <body>
        <?php
    $count=count($_SESSION['panier']);

if ($count<=0) { 
    echo '<p style="font-size:25px; color:red">Ooops, panier vide!</p>';
} else {

    ?>

    <form action="panier.php" method="post">
        
        <div class="global">
            <div class="tableau">
            <p class="liste" style="font-weight:bold; font-size:23px">Votre panier</p>

                <table class="table table-striped">
                    <thead style="background:rgb(0,162,232); color:white" class="thead">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Libellé</th>
                        <th scope="col">Prix unitaire</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Tva</th>
                        <th scope="col">Prix_tva(FCFA)</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                        
                        # code...
                    
                    


                    $ids=array_keys($_SESSION['panier']);
                    if (empty($ids)) {
                        # code...
                        $product=array();
                    }else {
                        # code...
                   
                        $select=$db->prepare('SELECT * FROM ouvrage WHERE id IN ('.implode(',',$ids).')');
                        $select->execute(array());
                     while ($product= $select->fetch(PDO::FETCH_OBJ)) {
                        
                    ?>
                    <tr>
                        <td><img height=70px whith=70px src="imgs/<?php echo $product->titre;?>.jpg"/></td>
                        <td><?php echo $product->titre;?></td>
                        <td><?php echo number_format($product->prix,2,',',' ') ;?></td>
                        <td><input type="text" class="form-control" style="width:70px" name="panier[quantity][<?= $product->id; ?>]" value="<?= $_SESSION['panier'][$product->id];?>"> </td>
                        <td><?php echo $product->tva;?>%</td>
                        <td><?php echo number_format($product->prix_total,2,',',' ') ;?></td>
                        <td><a href="panier.php?delPanier=<?= $product->id; ?>"> <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                    </tr>
                    
                    <?php  
                        }
                    ?>
                    <tr>
                        <td colspan="2"><br>
                            <p>Total à payer : <red style="color:red; font-size:19px"><?php echo number_format($panier->total(),2,',',' ') ;?> FCFA</red></p>
                        </td>
                    </tr>
   
                    <!-- le else du if(empty($ids)) -->
                    <?php  } 
                    
                    if (isset($_GET['deletepanier'])==true) {
                        supprimerPanier();
                    }
                    
                }
            
                    
                    ?>
                    <tr>
                        <td colspan="4">
                        <a href="#"> <button type="button" class="btn btn-primary">Payer la commande</button></a>
                        <input type="submit" class="btn btn-secondary" value="Recalculer">
                        <a href="?deletepanier=true"> <button type="button" class="btn btn-danger">Supprimer le panier</button></a>

                        </td>
                    </tr>

                    </tbody>
                </table>
                
            </div>
        </div>
    </form>
        <?php
            require('footer.php');
        ?>
        
    </body>
</html>