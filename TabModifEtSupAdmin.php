<?php
require('connexion_BD.php');
require("headerGestion.php");

?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/supprimerUser.css">
        <title>Modifier & supprimer ouvrages</title>
    </head>
    <body>

            <div class="wrap">
            <div class="search">
                <input type="search" class="searchTerm" placeholder="rechercher">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            </div>
        

        <div class="global">
            <div class="tableau">
            <p class="liste" style="font-weight:bold; font-size:23px">Liste des ouvrages</p>

                <table class="table table-striped">
                    <thead style="background:rgb(0,162,232); color:white" class="thead">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Aperçu</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Etat(/10)</th>
                        <th scope="col">Prix(FCFA)</th>
                        <th scope="col">Date de publication</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                            $select=$db->prepare("SELECT * FROM ouvrage");
                            $select->execute(array());
                            while ($s= $select->fetch(PDO::FETCH_OBJ)) {

                        ?>
                    <tr>
                        <th scope="row"><?php echo $s->id;?></th>
                        <td><img height=70px whith=70px src="imgs/<?php echo $s->titre;?>.jpg"/></td>
                        <td><?php echo $s->titre;?></td>
                        <td><?php echo $s->ville;?></td>
                        <td><?php echo $s->etat;?></td>
                        <td><?php echo $s->prix;?></td>
                        <td><?php echo $s->date;?></td>
                        <td><a href="?action=modifier&amp;id=<?php echo $s->id; ?>"><button type="button" class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
                            <a href="?action=supprimer&amp;id=<?php echo $s->id; ?>"> <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a></br></br>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
                <?php
                    $select=$db->prepare("SELECT COUNT(*) AS nb FROM ouvrage");
                    $select->execute(array());
                    $s= $select->fetch();
                    
                ?>
                <p style="font-weight:bold"><?php echo $nb=$s['nb']; ?> publication(s) au total</p>
                
            </div>
        </div>
        
    </body>
</html>