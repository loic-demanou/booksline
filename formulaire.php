<?php
session_start();
// require('connexion_BD.php');

$host="localhost";
$db="booksline";
try {
   $pdo=new PDO(
     "mysql:host=$host; dbname=$db; charset=utf8",
     "root",
     "",
     array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)
   );
} catch (PDOException $e) {
    echo "Erreur : ".$e->getMessage();
    die();
}
$erreur='';



if (isset($_POST["valider"]) ){

    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $passe=$_POST['passe'];
    $repeat=$_POST['repeat'];
    $telephone=$_POST['telephone'];
    $ville=$_POST['ville'];


    if($nom  && $email && $passe && $repeat && $telephone && $ville){
        if(FILTER_VAR($email, FILTER_VALIDATE_EMAIL))
        {
            if($passe==$repeat){
            //    $pdo->prepare("INSERT INTO utilisateur('nom', 'email', 'passe', 'telephone', 'ville') VALUES(?,?,?,?,?)");
            //    $insert=$db->prepare("INSERT INTO utilisateur(nom, email, passe, telephone, ville) VALUES (?, ?, ?, ?, ?)");
            //    $insert->execute(array($nom, $email, $passe, $telephone, $ville));
                $pdo->query("INSERT INTO `utilisateur`( `nom`, `email`, `passe`, `telephone`, `ville`,`date_creation` ) VALUES('$nom','$email','$passe',$telephone,'$ville', now())");
                array();


            //     $insert=$db->prepare("INSERT INTO utilisateur(nom, email, passe, telephone, ville, date_creation)
            //      VALUES (?, ?, ?, ?, ?, now()");
            //    $insert->execute(array($nom, $email, $passe, $telephone, $ville));

                ?>

                <div class="alert alert-success" role="alert">
                Compte crée avec success; Connectez-vous maintenant <a href="login2.php">en cliquant ici</a>
              </div>
              <?php

            }
            else {
            //     echo $erreur="<div class='row'>
            //     <div class='alert alert-danger'>
            //     Les mots de passes ne sont pas identiques!
            //     </div>
            // </div>";
            ?>

            <div class="alert alert-warning" role="alert">
            Les mots de passes ne sont pas identiques!
            </div>
        <?php
            }
            // header("location:accueil.php");
        }
       else {
                echo $erreur="<div class='row'>
                    <div class='alert alert-danger'>
                    Email incorrect!
                    </div>
                </div>";
       }

    }
    else {
                // echo $erreur="<div class='row'>
                //     <div class='alert alert-danger'>
                //     Remplir tous les champs!
                //     </div>
                // </div>";
                ?>

                <div class="alert alert-warning" role="alert">
                Veuillez remplir tous les champs!
                </div>
            <?php
    
    }
    
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/formulaire.css">
        <title>Formulaire</title>
    </head>
    <body>


        <form action="" method="post" class="formulaire">
            <div class="principal">
            <p>Inscrivez-vous</p><br>
            <input type="text" name="nom" id="inputEmail" class="form-control" placeholder="Nom d'utilisateur" required="" autofocus="" value="<?php if(isset($nom)){ echo $nom;} ?>"><br>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Adresse e-mail" required="" autofocus="" value="<?php if(isset($email)){ echo $email;} ?>"><br>
            
            <input type="password" name="passe" id="inputEmail" class="form-control" placeholder="Mot de passe" required="" autofocus=""><br>
            <input type="password" name="repeat" id="inputEmail" class="form-control" placeholder="Confirmez le mot de passe" required="" autofocus=""><br>
            <input type="tel" name="telephone" id="inputEmail" class="form-control" placeholder="Téléphone" required="" autofocus="" value="<?php if(isset($telephone)){ echo $telephone;} ?>"><br>

        Ville   <select name="ville" >
                <option value="Douala">Douala</option>
                <option value="Yaoundé">Yaoundé</option>
                <option value="Bafoussam">Bafoussam</option>

            </select><br><br>


            
            <input type="reset" name="reset" class="btn">
            <input type="submit" name="valider" class="btn"><br><br>
            <label class="txt">Vous avez déjà un compte?<br><label>
            <a href="login2.php" class="txtt">cliquez ici pour vous connectez</a>

            
            </div>
            

            <?php
            if(isset($erreur))
            {
                echo '<font color="red">'. $erreur. "</font>";
            }
        ?>

        </form>


    </body>
</html>