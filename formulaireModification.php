<?php
require_once('connexion_BD.php');

    $id=$_GET['id'];

    $select=$db->prepare("SELECT * FROM ouvrage WHERE id=$id");
    $select->execute(array());
    $data=$select->fetch(PDO::FETCH_OBJ);
?>

    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/formulaireDeVente.css">
        <title></title>
    </head>
    <body>
        <div class="intro">
            <p><strong>Modifier!</strong> Remplacez les valeurs à modifier dans le formulaire.</p>


            <?php

                if (isset($_SESSION['id'])) {
                ?>

                <div class="other">
                <div class="">
                    <article id="img1" class="col-sm-6 col-md-6 col-lg-4">
                        <a href="?action=ajouter"><img src="icones/add_ouvrage.png" height="100px" width="100px" alt=""></a>
                        <p style="font-size:15px;">Ajouter un ouvrage</p>
                    </article>

                    <article id="img1" class="col-sm-6 col-md-6 col-lg-4">
                        <a href="?action=modifetsup"><img src="icones/modifyAndDelete_ouvage.png" height="100px" width="100px" alt=""></a>
                        <p style="font-size:15px;">Modifier ou Supprimer<br> une publication</p>
                    </article>
                </div>
                </div>


        <?php

        }
        ?>





        </div>
        <div class="global">
            <p class="titre-pub">Modifiez votre annonce de vente</p><br>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Titre de l'ouvrage<red style="color:red"> *</red></label>
                    <input value="<?php echo $data->titre;?>" type="text" class="form-control is-valid" name="titre" id="inputEmail4">
                    <div class="valid-feedback">
                        ok!
                    </div>
                </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Catégorie<red style="color:red"> *</red></label>
                        <select id="inputState" name="categorie" class="form-control" >
                            <!-------///////////// CHARGEMENT DES CATEGORIES DANS LE SELECT //////////////////-->

                            <?php $select=$db->query("SELECT * FROM categorie");
                            while($s=$select->fetch(PDO::FETCH_OBJ)){
                            ?>

                            <option selected><?php echo $s->nom;?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Ville<red style="color:red"> *</red></label>
                        <select id="inputState" name="ville" class="form-control">
                            <option selected value="Douala">Douala</option>
                            <option value="Yaoundé">Yaoundé</option>
                            <option value="Bafoussam">Bafoussam</option>

                        </select>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">Etat<red style="color:red"> *</red></label>
                    <select id="inputState" name="etat" class="form-control">
                        <option selected value="10">10 (neuf)</option>
                        <option value="09">09</option>
                        <option value="08">08</option>
                        <option value="07">07</option>
                        <option value="06">06</option>
                        <option value="05">05</option>
                        <option value="04">04</option>
                        <option value="03">03</option>
                        <option value="02">02</option>
                        <option value="01">01</option>
                    </select>
                </div>
                </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Prix<red style="color:red"> *</red></label>
                    <input type="number" value="<?php echo $data->prix;?>" name="prix" class="form-control" id="prix" placeholder="fcfa">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Stock<red style="color:red"> *</red></label>
                    <input type="number" value="<?php echo $data->stock; ?>" name="stock" class="form-control" id="stock">
                </div>
            </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Photo<red style="color:red"> *</red></label>
                    <input type="file" class="form-control" id="stock" name="img">
                </div>

                <div class="form-group col-md-6">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" value="<?php echo $data->description;?>" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="soumission">
                    <input type="submit" name='valider' class="btn btn-primary" value="Modifier l'annonce">
                </div>
                <p class="obligatoire">Champs obligatoires <red style="color:red"> *</red></p>

            </form>

            <?php
                if(isset($_POST['valider'])){
                                
                    $titre=$_POST['titre'];
                    $ville=$_POST['ville'];
                    $etat=$_POST['etat'];
                    $prix=$_POST['prix'];
                    $descript=$_POST['description'];
                    $stock=$_POST['stock'];
                    $update=$db->prepare("UPDATE ouvrage SET titre='$titre', ville='$ville', etat='$etat', prix='$prix', description='$descript', stock='$stock' WHERE id=$id");
                    $update->execute(array());
        
                    echo("<script>alert('Modifié avec success');</script>");
                    // header('Location:gestionArticle.php?action=modifetsup');
                }

            ?>
        </div>
    </body>
</html>