<?php
require_once('connexion_BD.php');

?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Booksline</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mesmodifs.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-11">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="accueil.php"> <img src="images/booksline.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="accueil.php">Accueil</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Services
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="accueil.php"> Acheter</a>
                                        <a class="dropdown-item" href="gestionArticle.php?action=ajouter">Vendre</a>
                                        <a class="dropdown-item" href="s-echange.php">Echanger</a>

                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Categories
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        </a>
                                        <?php 
                                $select=$db->query("SELECT * FROM categorie");
                                while ($s=$select->fetch(PDO::FETCH_OBJ)) {
                                    ?>
                                        <a class="dropdown-item" href="?categorie=<?php echo $s->nom;?>"><?php echo $s->nom; ?></a>
                                        <?php

                                        }
                                        ?>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="A-propos.php">A propos</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                                <li class="nav-item">
                                <?php
                                if(!isset($_SESSION['id'])){?>
                                    <a class="nav-link" href="login2.php">Se connecter</a>
                                </li>
                                <?php }else {
                                    ?>
                                <li class="nav-item">
                                <a class="nav-link" href="mon_compte.php">Mon compte</a>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                        <!-- en bas c'est la classe:"dropdown cart" -->
                            <div class="">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <a href="panier.php"><i class="fas fa-shopping-cart"></i></a>
                                </a>
                                <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="single_product">
    
                                    </div>
                                </div> -->
                            </div>
                            <a id="search_1" href="javascript:void(0)"><i class="fas fa-search"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="search_input" id="search_input_box">
            <div class="container ">
                <?php
                    if (isset($_GET['show']) or isset($_GET['categorie'])){

                        }else{ 
                    ?>
                <form method="GET" class="d-flex justify-content-between search-inner">
                    <input type="search" name= "q" class="form-control" id="search_input" placeholder="Rechercher le titre d'un ouvrage">
                    <input type="submit" class="btn">search</button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>

                <?php
            }
            ?>

            </div>
        </div>
    </header>
                     <!-- CE BLOC EST DESTINEEE POUR L'AFFICHAGE DES RECHERCHES DANS L'APPLI -->
                <?php

            $select=$db->prepare("SELECT * FROM ouvrage ORDER BY id DESC");
            $select->execute(array());

            if (isset($_GET['q']) AND !empty($_GET['q'])) {
                $q=htmlspecialchars($_GET['q']);

                $article=$db->query('SELECT titre,ville,etat,description,prix,stock FROM ouvrage WHERE titre LIKE "%'.$q.'%" ORDER BY id DESC');


                while($a=$article->fetch(PDO::FETCH_OBJ)){  ?>


                    <article class="item-wrapper">
                        <br><br><br><br>
                    <a href="?show=<?php echo $a->titre; ?>"><img src="imgs/<?php echo $a->titre;?>.jpg"/></a>

                    <p>Titre: <?php echo $a->titre;?>  <br> 
                    Ville: <?php echo $a->ville;?><br>
                    état: <?php echo $a->etat;?>/10 <br>
                    <rien style="color:red">Prix: <?php echo $a->prix;?> fcfa</rien> <br>
                    <?php if($a->stock!=0){ ?>

                    <h5><label>Quantité en stock : </labe><?php echo $a->stock; ?></h5>
                        <button type="button" class="btn btn-success">Ajouter au panier</button><br><br>
                        <?php }else{
                            echo '<h5 style="color:red;">Stock épuisé!</h5>';
                        }
                    ?>



                    
                <?php exit(); }
            }
            ?>       


                <!-- FIN DE L'AFFICHAGE DES RECHERCHES -->


   <!-- **************** affichage de la vue complete  de l'ouvrage **************** -->
    <?php
        if (isset($_GET['show'])) {


            $ouvrage=$_GET['show'];

  
            $select=$db->prepare("SELECT * FROM ouvrage WHERE titre='$ouvrage'");
            $select->execute(array());
            $s=$select->fetch(PDO::FETCH_OBJ)

            ?>
            <div>
                <div class="show">
                    <br><br>
                    <div class="form-row">
                        <div class="form-group col-md-3">

                            <a href="imgs/<?php echo $s->titre; ?>.jpg" ><img src="imgs/<?php echo $s->titre; ?>.jpg" alt="image"></a><br><br>
                            <?php if($s->stock!=0){ ?>

                            <h5><label>Quantité en stock : </labe><?php echo $s->stock; ?></h5>
                                <button type="button" class="btn btn-success">Ajouter au panier</button><br><br>
                                <?php }else{
                                    echo '<h5 style="color:red;">Stock épuisé!</h5>';
                                }
                            ?>
                        </div>

                        <div class="form-group col-md-6">

                            <loic class="details">
                            <p style="text-decoration:underline; font-size:25px;font-weight:bold">Détails</p>
                                <h5><label>Titre de l'ouvrage : </label> <?php echo $s->titre; ?></h5>
                                <h5><label>Ville de disponibilité : </label><?php echo $s->ville; ?></h5>
                                <h5><label>Etat de l'ouvrage : </label><?php echo $s->etat; ?>/10</h5>
                                <h5><label>Description : </labe><?php echo $s->description; ?></h5>
                                <h5><label style="color:red">Prix : <?php echo $s->prix; ?> FCFA</label></h5>
                                
                        </loic>
                    </div>
                 </div>

                </div>
            </div>
              <?php
              require_once("footer.php");
                exit();

            ?>
  
            <?php
            # code...
          }else {
  

if (isset($_GET['categorie'])) {
    // echo("<script>alert('ok!');</script>");

  # code...
  require_once('categorie.php');

}

          }
?>
    <!-- Header part end-->






    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/mixitup.min.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>