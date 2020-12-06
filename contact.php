<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/contact.css">
        <title>contact</title>
    </head>
    <body>
    <?php
        
        require_once('header.php');

        ?>


<section>

<div class="enveloppe">
        
        <div class="infos">
            <strong><p class="contact-titre">CONTACT</p></strong> 
        <p>Vous pouvez nous contacter via les adresses suivantes, pour plus d'informations, nous serons honorés et ravi de vous aider: </p>
        
        
        <p class="coord"> <img src="images/phone.png" width="29px" height="29px" alt="">    683 921 074/ 659 360 163 </p>
        <p class="coord"><img src="images/envelo2.png" width="29px" height="29px" alt=""><a href="mailto:loicdemanou.9@gmail.com">loicdemanou.9@gmail.com</a></p>
       Social <a href="http://www.facebook.com"><img src="images/fb.jpg" alt="" width="45px" height="40px" class="fb"></a>
       <a href="http://www.twitter.com"><img src="images/twitter.png" alt="" height="40px" width="45px" class="twitter"></a>
    </div>

        <p class="phrase">Ou si vous souhaitez vous pouvez nous envoyer un message en remplissant le formulaire
        </p>
        <form action="post">
        <div class="total">
            <div class="form-contact"><p>
               <a href="images/iuc-localisation.PNG"> <img src="images/iuc-localisation - grd.PNG" width="350px" height="305px" alt="" class="img"></a>
            </p>
                <div class="champ-input">
                    <input type="text" class="input" placeholder="Nom*" required>
                    <input type="email" class="input" placeholder="Adresse Email*" required>
                    <input type="tel" class="input" placeholder="Numéro de téléphone*" required>
                    <input type="text" class="input" placeholder="Objet*" required>
                </div>
                <div class="message">
                    <textarea placeholder="Saisissez votre message ici" maxlength="855"></textarea>
                        <input type="submit" value="Envoyer">
                    </div>
                    <p class="txt-localisation">Localisation</p>

                </div>

            </div>
        </div>
    </form>
</div>
</section>


<?php
require_once("footer.php")
?>
    
</body>
</html>