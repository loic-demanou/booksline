<?php
require_once('connexion_BD.php');
require('headerGestion.php');
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/supprimerUser.css">
        <title>Supprimer catégorie</title>
    </head>
    <body>
        
        <div class="global">
            <div class="tableau">
            <p class="liste" style="font-weight:bold; font-size:23px">Toutes les catégories existantes</p>

                <table class="table table-striped">
                    <thead style="background:rgb(0,162,232); color:white" class="thead">
                    <tr>
                        <th scope="col">Nom de la categorie</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
            
                    $select=$db->prepare("SELECT * FROM categorie");
                    $select->execute(array());
                    while ($s= $select->fetch(PDO::FETCH_OBJ)) {

                    ?>
                    <tr>
                        <td><?php echo $s->nom;?>  </td>
                        <td><a href="?action=supprimer_categorie&amp;id=<?php echo $s->id; ?>"> <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                    </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                </table>
                
            </div>
        </div>
        
    </body>
</html>