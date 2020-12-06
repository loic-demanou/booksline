<?php
require('connexion_BD.php');
require('headerGestion.php');
?>

<html>

    <body>

<?php
// require_once("headerGestion.php");


if (isset($_SESSION['id'])) {
?>
   

   <div class="row">
        <article id="img1" class="col-sm-6 col-md-6 col-lg-4">
            <a href="?action=ajouter"><img src="icones/add_ouvrage.png" height="150px" width="150px" alt=""></a>
            <p>Ajouter un ouvrage</p>
        </article>

        <article id="img1" class="col-sm-6 col-md-6 col-lg-4">
            <a href="?action=modifetsup"><img src="icones/modifyAndDelete_ouvage.png" height="150px" width="150px" alt=""></a>
            <p>Modifier ou Supprimer<br> une publication</p>
        </article>
        <article id="img1" class="col-sm-6 col-md-6 col-lg-4">
            <a href="?action=add_categorie"><img src="icones/add_categorie.png" height="150px" width="150px" alt=""></a>
            <p>Ajouter une nouvelle<br> catégorie d'ouvrage</p>
        </article>
        <article id="img1" class="col-sm-6 col-md-6 col-lg-4">
            <a href="?action=modifetsup_categorie"><img src="icones/delete_categorie.png" height="150px" width="150px" alt=""></a>
            <p>Supprimer une <br>catégorie existante</p>
        </article>
        <article id="img1" class="col-sm-6 col-md-6 col-lg-4">
            <a href="?action=modifetsup_user"><img src="icones/delete_user.png" height="150px" width="150px" alt=""></a>
            <p>Supprimer un utilisateur</p>
        </article>
        <article id="img1" class="col-sm-6 col-md-6 col-lg-4">
            <a href="?action=option"><img src="icones/option.webp" height="150px" width="150px" alt=""></a>
            <p>Option</p>
        </article>
    </div>



<?php

}
?>

        
    </body>
</html>