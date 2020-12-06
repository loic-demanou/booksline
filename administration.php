<?php
session_start();

require_once("connexion_BD.php");
$erreur='Remplir tous les champs';
if (!isset($_SESSION['id'])) {


  if (isset($_POST['valider'])) {
    $nom=$_POST['login'];
    $passe=$_POST['password'];

    if (!empty($nom) AND !empty($passe)) {
        $requser=$db->prepare("SELECT * FROM administrateur WHERE nom=? AND password=?");
        $requser->execute(array($nom, $passe));
        $userexist=$requser->rowCount();
        if ($userexist==1) {
          $userinfo=$requser->fetch();
          $_SESSION['id']=$userinfo['id'];
          $_SESSION['nom']=$userinfo['nom'];
          $_SESSION['passe']=$userinfo['passe'];
          header("location:gestionArticleAdmin.php");

     }else {

      ?>

      <div class="alert alert-warning" role="alert">
      Identifiants incorrects!
      </div>
  <?php

  //     echo $erreur="<div class='row'>
  //     <div class='alert alert-danger'>
  //     Identifiants incorrects!
  //     </div>
  // </div>";

        }
        
    } else {
      ?>

      <div class="alert alert-warning" role="alert">
        Veuillez remplir tous les champs!
      </div>
      <?php

}


  }
}else {
  echo $erreur="<div class='row'>
  <div class='alert alert-danger'>
  Administrateur non existant!
  </div>
</div>";
}

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
        <title>Administration</title>
  </head>
  <body class="text-center">
        <form class="format" id="form" action ="administration.php" method="post">
            <div class="principal">
            <img class="mb-4" src="icones/director.png" alt="" width="80" height="82">

                  <input type="text" name="login" class="form-control" placeholder="Pseudo" autofocus="" required="">
                      <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="">
                  <div class="checkbox mb-3">
                      <label>
                          <input type="checkbox" value="remember-me"> Se souvenir de moi
                      </label>
                  </div>
              <button class="btn btn-lg btn-primary btn-block" name="valider" type="submit">Se connecter</button>
                  <p class="copyright"> ©2019 Tous droits réservés</p>
                </div>
          </form>

<script src="javascript/admin.js">

</script>
</body>
</html>
