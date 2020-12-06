<?php
require_once('connexion_BD.php');

?>


<?php



                if (isset($_GET['categorie'])) {
                  $categorie=$_GET['categorie'];
                  $select=$db->prepare("SELECT * FROM ouvrage WHERE categorie='$categorie'");
                  $select->execute(array());
                  
                  while ($s= $select->fetch(PDO::FETCH_OBJ)) {
                  ?>

                  <a href="?show=<?php echo $s->titre; ?>"><div style="text-align:center">
                   <img height=120px whith=120px src="imgs/<?php echo $s->titre;?>.jpg"/></a><br>

                     <?php echo $s->titre;?><br>

                      <?php echo $s->ville;?><br>
                      <?php echo $s->etat;?><br>
                      <prix style="color:red"><?php echo $s->prix.' ';?>fcfa</prix><br><br>
                      <?php if($s->stock!=0){ ?>
                     <button type="button" class="btn btn-success">Ajouter au panier</button><br><br>
                     <?php }else{
                         echo '<h5 style="color:red;">Stock épuisé!</h5>';
                     }
                     ?>
                    </div>

                  <?php
                  }
                  require_once("footer.php");
                  
                  ?>
                  <?php
                  exit();
                  
              }else {
                        echo 'aucun produit';
                        
                      }

        
        
        ?>

