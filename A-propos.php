<?php
session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        
        <link rel="stylesheet" href="CSS/A-propos.css">
        
        <title>A-propos</title>
    </head>
    <body>
    <?php
        require_once('header.php');

        ?>    


        <div class="global">
            <p class="apropos">A propos</p>
        <p class="but">Quel est le but du site?</p>
        <p>Vous vous demandez sûrement à quoi sert vaiment ce site?
            Cette plate-forme a pour but d'aider les personnes qui souhaitent vendre des livres au Cameroun, en postant leurs
            articles en ligne tout en faisant leur propre publicité sur divers articles qu'ils possèdent. Tout ceci
        dans le but de promouvoir la clientèle. </p>
         <p>Elle permet également aux acheteurs de pouvoir commander des livres en ligne au Cameroun 
            à moindre coût, ceci dans le but de faire des économies.</p>
            <p>Mon site vise également les personnes et surtout les élèves et étudiants désirant échanger leurs manuels
                scolaires contre d'autres manuels.
            </p>

            <p class="personne"> Qui suis-je?</p>
<img src="images/moi.jpg" height="220" width="170" class="img">
       <p> Demanou Loïc est un jeune étudiant né en 2000, ayant grandi dans plusieurs villes différentes du
           Cameroun. Il est ambitieux, passionné et aime bien le domaine du développement et s'intègre encore 
           dans la chose. Je mène une une vie banale d'étudiant sans trop d'histoire à raconter. </p>

        </div>
         </div>

        

         <?php
            require_once("footer.php")
        ?>

<script src="javascript/script.js"></script>

    </body>
</html>