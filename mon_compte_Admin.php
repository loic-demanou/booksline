<?php
session_start();
require_once('headerGestion.php');
?>

<link rel="stylesheet" href="css/monCompte.css">
<div class="enveloppe">
<h3>Mon compte</h3><br>
<h4>Mes informations</h4>

<?php
if (isset($_SESSION['id'])) {
    # code...


$id=$_SESSION['id'];
$select=$db->query("SELECT * FROM administrateur WHERE id ='$id'");
while ($s=$select->fetch(PDO::FETCH_OBJ)) {
    ?>
    <h6>Nom : <?php echo $s->nom;?></h6>
    <h6>Votre mot de passe est : <?php echo $s->password;?></h6>
    <?php
}
?>


<a href="deconnexion.php"><button type="button" class="btn btn-success">Se déconnecter</button></a>
<?php
}else {
    echo "Vous n'êtes pas connecté<br>";
    ?>
        <a href="login.php"><button type="button" class="btn btn-success">Me connecter</button></a>

    <?php

}
?>

</div>

<?php
require_once("footer.php");
?>

