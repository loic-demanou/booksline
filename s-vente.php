
<?php
require_once("connexion_BD.php");

if (isset($_POST['valider'])) {

    $titre=$_POST['titre'];
    $ville=$_POST['ville'];
    $etat=$_POST['etat'];
    $prix=$_POST['prix'];
    $descript=$_POST['description'];
    $categorie=$_POST['categorie'];

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


    if ($titre && $ville && $etat && $prix&& $descript) {
        # code...

        $insert=$db->prepare("INSERT INTO ouvrage(titre, ville, etat, prix, description, categorie) VALUES (?, ?, ?, ?, ?, ?)");
        $insert->execute(array($titre,$ville,$etat,$prix,$descript,$categorie));
        echo("<script>alert('Ajouté avec success!');</script>");


    } else {
        echo'Veuillez remplir tous les champs!';
    }

}

?>











?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" href="css/s-vente.css">

        <title>s-vente</title>
    </head>
    <body>

        
        <form action="post">
         <div class="enveloppe">
                <p class="titre-pub">Créez  gratuitement votre annonce de vente</p><br>
           <div class="part2">
               <!-- <table border width="50%">
                    <tr><td>règles à respecter pour vendre</td></tr>
                    <tr><td>.ne pas ecrire le prix dans le titre</td></tr>
                    <tr><td>.ne publier pas les memes annonces plusieurs fois</td></tr>
                </table>-->
                    <div class="regles">
                        <p class="border"></p>
                <article class="regles2"><p>Règles à respecter pour publier</p>
                *Ne publiez pas la même annonce plusieurs fois <br>
                *N'écrivez pas les prix dans le titre <br>
                *Ne vendez pas les ouvrages illégaux et non adaptés <br></article>
                     </div>
                    

            </div>
            <div class="total">
                <div class="article">
                    <strong><p class="info">Informations sur l'ouvrage</p></strong>
           <label>Titre * </label> <input type="text" placeholder="titre de l'ouvrage" required name="titre"><br>
           <label>Catégorie * </label><select class="categorie" name="categorie">

                    <!-------///////////// CHARGEMENT DES CATEGORIES DANS LA NAVBAR //////////////////-->

                <?php $select=$db->query("SELECT * FROM categorie");
                while($s=$select->fetch(PDO::FETCH_OBJ)){

                    ?>
                <option><?php echo $s->nom;?></option>

                <?php

                }
                  ?>
            </select><br>

            <label class="ville">Ville * </label> <br> <input type="radio" name="ville" value="Douala" required>  <label>Douala</label>
            <input type="radio" name="ville" value="Yaoundé" required>  <label>Yaoundé</label>
           <input type="radio" name="ville" value="Bafoussam" required>  <label>Bafoussam</label><br>
<br>

            <label>Etat* ( /10)</label>
            <select name="etat" id="" required>
                <option value="10">10 (neuf)</option>
                <option value="09">09</option>
                <option value="08">08</option>
                <option value="07">07</option>
                <option value="06">06</option>
                <option value="05">05</option>
                <option value="04">04</option>
                <option value="03">03</option>
                <option value="02">02</option>
                <option value="01">01</option>
            </select><br>

            <label>Prix*</label>
            <input type="number" placeholder="fcfa" required name='prix'><br>

            <input type="file" name='photo'> Ajoutez des photos pour multiplier les chances de ventes<br>
            <label class="lbl-txtarea">Description</label>
            <textarea name='description' placeholder="apportez d'autres détails si vous souhaitez" maxlength="100" cols="35" rows="3"></textarea>

        </div>
        
        <div class="personnels">
                <strong><p class="info2">Vos informations</p></strong><br>

               <label class="perso">Nom*</label> <input type="text" ><br>
               <label class="perso">Email*</label> <input type="email" ><br>
              <label class="perso">Téléphone:*</label> <input type="tel" maxlength="9" placeholder="(whatsapp si possible)"><br>
            </div>
            <div>
                <input type="submit" name='valider' class="btn" value="Créer l'annonce">
            </div>
            <p class="chp"> * Champs obligatoires</p>


        </div>
    </div>
        </form>
        
        
        <?php
            require_once("footer.php")
        ?>
            
        
    </body>
</html>