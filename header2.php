<?php
include_once('connexion_BD.php');

?>
<link rel="stylesheet" href="CSS/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/header2.css">
<form>
  <div class='container'>
    <div class='row'>
    <article class="col-sm-9">
      <input type="search" class="form-control" placeholder="Rechercher un ouvrage par titre">
        </article>
      <article class="col-sm-3">

      <button type="button" class="btn btn-success">Rechercher</button>
      <a href="#"><img src="images/panier.png" name="propos" class="propos" alt="Apropos" height="30" width="30"></a>
          <a href="A-propos.php"><img src="images/apropos.png" name="propos" class="propos" alt="Apropos" height="30" width="30"></a>
    </article>
</div>
</div>
</form>

<!-- mon html, php personnallisé -->


<section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="#!"><img src="images/booksline.png"></a>
    </div>
    <nav>
      <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
      <ul class="nav-list">
      <li>
          <a href="#" class="menu-principal"><i class="fa fa-home"></i>Accueil</a>
        </li>

        <li>
          <a href="accueil.php" class="menu-principal">Boutique</a>
        </li>
        <li>
          <a href="#!" class="menu-principal">Services</a>
          <ul class="nav-dropdown">
            <li>
              <a href="s-achat.php">Acheter</a>
            </li>
            <li>
              <a href="gestionArticle.php?action=ajouter">vendre</a>
            </li>
            <li>
              <a href="#!">Echanger</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#!" class="menu-principal" name="categorie">Categorie</a>
          <ul class="nav-dropdown">

          <?php 
          
          $select=$db->query("SELECT * FROM categorie");
          while ($s=$select->fetch(PDO::FETCH_OBJ)) {
            ?>
            <li>
              <a href="?categorie=<?php echo $s->nom;?>"><?php echo $s->nom; ?></a>
            </li>
            <?php

          }
          ?>
          </ul>
        </li>



        <li>
          <a href="contact.php" class="menu-principal">Contact</a>
        </li>


        <li>
          <?php
          if(!isset($_SESSION['id'])){?><a href="login2.php"><button type="button" class="menu-principal">Connexion</button></a>
        </li>
        <?php }else{
          ?>
          <li><a href="mon_compte.php"><button type="button" class="menu-principal">Mon compte</button></a>
        </li><?php
        }?>

      </ul>
    </nav>
  </div>
</section>








<!-- <a href="login2.php"><button type="button" class="btn btn-primary">Connexion</button></a> -->


<?php




  if (isset($_GET['categorie'])) {
    # code...
    require_once('categorie.php');

}


?>
<script src="javascript/Jquery.js"></script>
<script src="javascript/header2.js"></script>
