<?php
require('connexion_BD.php');
require('headerGestion.php');
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/supprimerUser.css">
        <title>Liste des utilisateurs</title>
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
            <p class="liste" style="font-weight:bold; font-size:23px">Liste des utilisateurs</p>

                <table class="table table-striped">
                    <thead style="background:rgb(0,162,232); color:white" class="thead">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Date d'inscription</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $select=$db->prepare("SELECT * FROM utilisateur");
                            $select->execute(array());
                            while ($s= $select->fetch(PDO::FETCH_OBJ)) {

                        ?>
                    <tr>
                        <th scope="row"><?php echo $s->id;?></th>
                        <td><?php echo $s->nom;?></td>
                        <td><?php echo $s->email;?></td>
                        <td><?php echo $s->telephone;?></td>
                        <td><?php echo $s->ville;?></td>
                        <td><?php echo $s->date_creation;?></td>
                        <td><a href="?action=supprimer_user&amp;id=<?php echo $s->id; ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                    </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
                <?php
                    $select=$db->prepare("SELECT COUNT(*) AS nb FROM utilisateur");
                    $select->execute(array());
                    $s= $select->fetch();
                    
                ?>
                <p style="font-weight:bold"><?php echo $nb=$s['nb']; ?> utilisateur(s) au total</p>
                
            </div>
        </div>
        
    </body>
</html>