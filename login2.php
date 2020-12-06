<?php
session_start();
require_once("connexion_BD.php");
if (!isset($_SESSION['id'])) {


  if (isset($_POST['valider'])) {
    $email=$_POST['email'];
    $passe=$_POST['password'];

    if (!empty($email) AND !empty($passe)) {
        $requser=$db->prepare("SELECT * FROM utilisateur WHERE email=? AND passe=?");
        $requser->execute(array($email, $passe));
        $userexist=$requser->rowCount();
        if ($userexist==1) 
        {
          if(isset($_POST['rememberMe'])){
            setcookie('email',$email,time()+365*24*3600,null,null,false,true);
            setcookie('password',$passe,time()+365*24*3600,null,null,false,true);

          }
          $userinfo=$requser->fetch();
          $_SESSION['id']=$userinfo['id'];
          $_SESSION['nom']=$userinfo['nom'];
          $_SESSION['email']=$userinfo['email'];
          $_SESSION['passe']=$userinfo['passe'];
          $_SESSION['telephone']=$userinfo['telephone'];
          $_SESSION['ville']=$userinfo['ville'];
          header("location:accueil.php");

        } else if($email=="admin@admin.com" && $passe=="admin"){
              header("location:administration.php");
        }else {

          ?>

          <div class="alert alert-danger" role="alert">
          Identifiants incorrects!
          </div>
      <?php

      //     echo $erreur="<div class='row'>
      //     <div class='alert alert-danger'>
      //     Identifiants incorrect!
      //     </div>
      // </div>";

        }
        

    
    } else {
      ?>

      <div class="alert alert-warning" role="alert">
      veuillez remplir tous les champs!
      </div>
  <?php

        //     echo $erreur="<div class='row'>
        //     <div class='alert alert-danger'>
        //     Remplir tous les champs!
        //     </div>
        // </div>";

    }


  }
}else {
  header("location:mon_compte.php");
}

?>

<meta charset="utf-8">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/login2.css">

<div class="wrapper">
    <form class="form-signin" action="" method="POST">       
      <h2 class="form-signin-heading">Connexion</h2>
      <input type="text" class="form-control" name="email" placeholder="Adresse email"autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Mot de passe"/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Se souvenir de moi
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="valider">Se connecter</button> 
          <label class="txt">Vous n'avez pas de compte?<label>
        <a href="formulaire.php" class="txtt">cliquez ici pour vous créer un compte</a>
   <p class="copy"> ©2019 Tous droits réservés</p> 

    </form>
  </div>