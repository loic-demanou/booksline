<?php
session_start();
require_once('connexion_BD.php');

?>
<html>
    <head>
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/accueil.css">
        <meta charset="utf-8">
        <title>Booksline</title>
    </head>
    <body>
        <?php
        
        require_once('header.php');

        ?>

        <div class="container-fluid corps">


            <p class="prim">Ouvrages en vente 
                <a href="c-primaire.html" class="plus">Voir plus...</a>
                <a href="gestionArticle.php?action=ajouter" class="btn btn-primary float-right">Publier un ouvrage</a>
            </p>

            <?php    

                $select=$db->prepare("SELECT * FROM ouvrage ORDER BY id DESC");
                $select->execute(array());
                while ($s= $select->fetch(PDO::FETCH_OBJ)) {

            ?>
            
            <div class="contenir">

                <div class="item">
                    <!-- <img src="images/autre.jpg" height="220px" width="180px" alt=""> -->

                    <article class="item-wrapper">
                    <a href="?show=<?php echo $s->titre; ?>"><img src="imgs/<?php echo $s->titre;?>.jpg"/></a>

                    <p>Titre: <?php echo $s->titre;?>  <br> 
                    Ville: <?php echo $s->ville;?><br>
                    état: <?php echo $s->etat;?>/10 <br>
                    <?php if($s->stock!=0){ ?>
                       Stock : <?php echo $s->stock;?><br>
                        <?php }else{
                            echo '<h5 style="color:red;">Stock épuisé!</h5>';
                        }
                        ?>
                    
                    
                    <p class="separ">
                        <a href="addpanier.php?id=<?= $s->id; ?>" class="addPanier"><button type="button" class="btn btn-success"> <i class="fas fa-cart-plus"></i></a>
                    <rien><?php echo $s->prix;?> fcfa</rien> </button><br>

                     </p>
                    </p>
                    </article>
                    
                </div>            

            </div>

            <?php

            } 
            ?>


        </div>
        <?php
        
        ?>
        <script src="javascript/Jquery.js"></script>
        <script src="javascript/app.js"></script>
        <script src="javascript/accueil.js"></script>

    </body>
</html>