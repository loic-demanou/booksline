
<?php
session_start();
require_once('connexion_BD.php');

    if (isset($_GET['action'])) {
        # code...

        if ($_GET['action']=='ajouter') {
            if (isset($_SESSION['id'])) {
                require("formulaireDeVente.php");
                exit();
            }else {
                echo $erreur="<script>
                alert:'Identifiants incorrect!'
                </script>";

                header("location:login2.php");
            }
                // FIN AJOUT

        } elseif($_GET['action']=='modifetsup') {
                require("TabModifEtSup.php");
                exit();
            /* //////////////////////////////////  MODIFICATION  //////////// */ 
        } elseif($_GET['action']=='modifier') {

            require("formulaireModification.php");
            exit();

            # code...    /* ///////////////////// SUPPRESSON ////////////////////*/
        }else if ($_GET['action']=='supprimer') {
            # code...
            $id=$_GET['id'];
            $delete=$db->prepare("DELETE FROM ouvrage WHERE id=$id");
            $delete->execute(array());
            echo("<script>alert('Supprimé avec success');</script>");
            header("location:TabModifEtSup.php");


        }else if ($_GET['action']=='add_categorie'){
            /* ///////////////////////// AJOUTER CATEGORIE ////////////*/
            if (isset($_POST['valider'])) {
                $nom=$_POST['nom'];
                if ($nom) {
                    $insert=$db->prepare("INSERT INTO categorie(nom) VALUES (?)");
                    $insert->execute(array($nom));
                    echo("<script>alert('Categorie créée!');</script>");

                }else {
                    echo'Remplir tous les champs!';
                }
                
            } 
            
        ?>
        <div class="categorie">
        <form action= "" method="post">
         <label for="" class="lblCategorie"> Nom de la catégorie </label>: <input type="text" name="nom">
            <input type="submit" name="valider" class="btn btn-success" value="Ajouter" class="button_categorie">
        </form>
        </div>

          <?php  
          /* //////////////////////////// MODIFIER  ET SUPPRIMER CATEGORIE/////////////*/
        }else if ($_GET['action']=='modifetsup_categorie'){
            
            $select=$db->prepare("SELECT * FROM categorie");
            $select->execute(array());
            while ($s= $select->fetch(PDO::FETCH_OBJ)) {
                # code...
                echo $s->nom;
                ?>
                <a href="?action=supprimer_categorie&amp;id=<?php echo $s->id; ?>"><button type="button" class="btn btn-danger">supprimer</button></a></br></br>
                <?php
            }
            /* ///////////////////// SUPPRIMER CATEGORIE //////////////////*/
        }else if ($_GET['action']=='supprimer_categorie'){

            $id=$_GET['id'];
            $delete=$db->prepare("DELETE FROM categorie WHERE id=$id");
            $delete->execute(array());
            echo("<script>alert('Supprimé!');</script>");

            /* ///////////////////// SUPPRIMER USER CATEGORIE ////////////////////*/
        }else if ($_GET['action']=='modifier_categorie'){


        }else if ($_GET['action']=='modifetsup_user'){
            require("supprimerUser.php");
            exit();
        
        }else if ($_GET['action']=='supprimer_user'){
            $id=$_GET['id'];
            $deluser=$db->prepare("DELETE FROM utilisateur WHERE id=$id");
            $deluser->execute(array());
            echo("<script>alert('Utilisateur supprimé!');</script>");
            
        }else if($_GET['action']=='option') {

            $select=$db->query("SELECT tva FROM ouvrage");
            $s=$select->fetch(PDO::FETCH_OBJ);

            if (isset($_POST['valider2'])) {
                $tva=$_POST['tva'];

                if ($tva) {
                    $update=$db->query("UPDATE ouvrage SET tva=$tva");
                }
            }

            ?>
            <h5>TVA : </h5>


            <form action="" method="post">
            <input type="text" name="tva" value="<?php echo $s->tva; ?> ">
            <input type="submit" name="valider2" value="modifier">

            </form>            
            
            <?php
        }else {
            die('Une erreur s\'est produite!');
        }

    }else {
        # code...
    }

?>

    <!-- <a href="?action=ajouter">Ajouter un ouvrage</a></br>
    <a href="?action=modifetsup">Modifier/Supprimer un ouvrage</a></br>
    <a href="?action=add_categorie">Ajouter une nouvelle catégorie</a></br>
    <a href="?action=modifetsup_categorie">Supprimer une catégorie</a></br>
    <a href="?action=modifetsup_user">Supprimer un utilisateur</a></br>
    <a href="?action=option">Option</a></br> -->

<?php
require("TabDeBordGestion.php");

?>




