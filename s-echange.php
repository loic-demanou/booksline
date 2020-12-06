<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/s-echange.css">
        <title>s-echange</title>
    </head>
    <body>


        <div class="titre-echanger">
        <p class="echanger">Echanger!</p>
        <p>Echangez facilement des dizaines de manuels dans les grandes villes du Cameroun et sans frais
            seulement en cliquant sur l'article qui vous intéresse!
        </p>
        </div>
        <form action="post">
                <div class="enveloppe">
                       <p class="titre-pub">Publiez gratuitement votre annonce d'échange !</p><br>
                  <!-- <div class="part2">
                       <p>regles a respecter
                           .............
                       </p>
       
                   </div>-->
                   <div class="total">
                       <div class="article">
                           <strong><p class="info">Informations sur le livre à échanger</p></strong>
                  <label>Titre*</label> <input type="text" placeholder="titre de l'ouvrage" required><br>
                   <label>Catégorie* </label><select class="categorie" name="categorie" id="" required>
                       <option value="Primaire">Primaire</option>
                       <option value="secondaire">Secondaire</option>
                       <option value="autre" selected>Autre</option>
                   </select><br>
       
                   <label class="ville">Ville*</label>
                   <select name="ville" id="" class="select-ville">
                       <option value="">Douala</option>
                       <option value="">Yaoundé</option>
                       <option value="">Bafoussam</option>
                   </select><br>
       
                   <label>Etat* ( /10)</label>
                   <select name="etat" id="" required>
                       <option value="etat">10 (neuf)</option>
                       <option value="etat">09</option>
                       <option value="etat">08</option>
                       <option value="etat">07</option>
                       <option value="etat">06</option>
                       <option value="etat">05</option>
                       <option value="etat">04</option>
                       <option value="etat">03</option>
                       <option value="etat">02</option>
                       <option value="etat">01</option>
                   </select><br>
       
                   <label>Prix*</label>
                   <input type="number" placeholder="fcfa" required><br>
       
                   <input type="file" > Ajoutez des photos pour multiplier les chances de ventes<br>
                   <label class="lbl-txtarea">Description</label><textarea placeholder="apportez d'autres détails si vous souhaitez" maxlength="100"></textarea>
       
               </div>
               
               <div class="personnels">
                   <p>Renseignez les interessés sur votre article</p>
                       <strong><p class="info2">Vos informations</p></strong><br>
       
                      <label class="perso">Nom*</label> <input type="text" required><br>
                      <label class="perso">Email*</label> <input type="email" class="mail" required><br>
                     <label class="perso">Téléphone:*</label> <input type="tel" maxlength="9" placeholder="(whatsapp si possible)" required><br>
                   </div>
                   <div>
                       <input type="submit" class="btn" value="Publier l'annonce">
                   </div>
                   <p class="chp">* Champs obligatoires</p>

                <div class="question-ouvrage">
                   <strong><p class="article-change">Quels ouvrages souhaitez-vous en échange?</p></strong>
                   <p>Entrez les informations concernant les ouvrages que vous souhaitez avoir</p>
                </div>

                <div>
                   <label>Titre(s)*</label><input type="text" id="t-ouvrages" i placeholder="titre de l'ouvrage(si plusieurs les séparés par des tirets)"><br>
                   <input type="checkbox" name="" id="" class="chkbxx"> <label>Primaire</label><br>
                   <label>Catégorie*</label><input type="checkbox" name="" class="chkbx"> <label>Secondaire</label><br>
                   <input type="checkbox" name="" id="" class="chkbxx"> <label>Autre</label><br>

                    <label>Description</label><textarea name="" id="" cols="30" rows="10" maxlength="150" placeholder="Apportez plus de description à l'ouvrage que vous voulez"></textarea><br>
                    <input type="submit" name="" id="" class="submit-veux">
                </div>
    </div>
</section>



        
    </body>
</html>