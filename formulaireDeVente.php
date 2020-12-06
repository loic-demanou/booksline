<?php
require_once('connexion_BD.php');


        if (isset($_POST['valider'])) {

        $titre=$_POST['titre'];
        $ville=$_POST['ville'];
        $etat=$_POST['etat'];
        $prix=$_POST['prix'];
        $descript=$_POST['description'];
        $categorie=$_POST['categorie'];
        $stock=$_POST['stock'];
        $utilisateur=$_SESSION['id'];

        $img=$_FILES['img']['name'];
        $img_tmp=$_FILES['img']['tmp_name'];
        if(!empty($img_tmp)){

        $image=explode('.',$img);
        $image_ext=end($image);

        if(in_array(strtolower($image_ext),array('png','jpg','jpeg'))===false){
            echo 'Veuillez rentrer une image ayant l\'extension: .png, .jpg ou .jpeg';

        }else {
            # code...
            $image_size=getimagesize($img_tmp);
            if ($image_size['mime']=='image/jpeg') {
                $image_src=imagecreatefromjpeg($img_tmp);
            }
            else if ($image_size['mime']=='image/png') {
                $image_src=imagecreatefrompng($img_tmp);
            }else {
                $image_src=false;
                echo'image invalide!';
            }
            if ($image_src!==false) {
                $image_width=200;

                if ($image_size[0]==$image_width) {
                $image_finale=$image_src;
                }else {
                    $new_width[0]=$image_width;
                    $new_height[1]=200;
                    $image_finale=imagecreatetruecolor($new_width[0],$new_height[1]);
                    imagecopyresampled($image_finale,$image_src,0,0,0,0,$new_width[0],$new_height[1],$image_size[0],$image_size[1]);

                }
                imagejpeg($image_finale,'imgs/'.$titre.'.jpg');

            }
            
        }

        }else {
            echo 'veuillez rentrer une image';
        }

        /*           ///////////////////////// AJOUT //////////////////*/


        if ($titre && $ville && $etat && $prix&& $categorie && $stock) {
            
            $old_prix=$prix;

            $select=$db->query("SELECT tva FROM ouvrage");
            $s1=$select->fetch(PDO::FETCH_OBJ);
            $tva=$s1->tva;

            $prix_final=$old_prix+($old_prix*($tva/100));

            
            $insert=$db->prepare("INSERT INTO ouvrage(titre, ville, etat, prix, description, categorie, tva, prix_total, stock, date,id_utilisateur) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, now(),?)");
            $insert->execute(array($titre,$ville,$etat,$prix,$descript,$categorie,$tva,$prix_final,$stock, $utilisateur));
            echo("<script>alert('Ajouté avec success!');</script>");
            header("location:accueil.php");


        } else {
            echo'Veuillez remplir tous les champs!';
        }

        }
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
            <p><strong>Vendre!</strong> Remplissez ce formulaire pour publier votre annonce de vente dans
            l'application</p>
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
            <p class="titre-pub">Créez  facilement votre annonce de vente</p><br>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Titre de l'ouvrage<red style="color:red"> *</red></label>
                    <input type="text" class="form-control " name="titre" id="inputEmail4">
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

                        <?php $select=$db->query("SELECT * FROM ville");
                            while($v=$select->fetch(PDO::FETCH_OBJ)){
                            ?>

                            <option selected><?php echo $v->nom;?></option>
                            <?php
                            }
                            ?>                         

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
                    <input type="number" name="prix" class="form-control" id="prix" placeholder="fcfa">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Stock<red style="color:red"> *</red></label>
                    <input type="number" name="stock" class="form-control" id="stock">
                </div>
            </div>

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Photo<red style="color:red"> *</red></label>
                    <input type="file" class="form-control" id="stock" name="img">
                </div>

                <div class="form-group col-md-6">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="soumission">
                    <input type="submit" name='valider' class="btn btn-primary" value="Créer l'annonce">
                </div>
                <p class="obligatoire">Champs obligatoires <red style="color:red"> *</red></p>

            </form>
        </div>
    </body>
</html>