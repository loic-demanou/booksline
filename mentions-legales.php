<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/mentions-legales.css">
        <title>mentions-legales</title>
    </head>
    <body>
    <?php
        
        require_once('header.php');

        ?>


        <div class="mention-legal">
        <p class="titre-mention-legale">Mentions légales</p>
        <article>Booksline est  une plate-forme de vente et d'échange  d'ouvrages au Cameroun. 
        </article>
        <article><p>Par exception:</p>
            <ul>
            <li><p>Les "services" de BOOKSLINE interviennent en qualité intermédiaires techniques en mettant en relation
            les acheteurs et vendeurs tiers. A ce titre BOOKSLINE n'intervient pas dans le choix des contenus mis en lignes 
            par les vendeurs sur les "services"
        </p>
            </li>
            <li><p>Il convient de se référer aux conditions spécifiques de chaque service.</p>
            </li>
            </ul>
        <br>

        <p>Copyright Booksline, tous droits d'auteurs des textes et oeuvres réservés. <br>
            Booksline ne garanti en aucune façon l'exactitude, la précision, l'exhaustivité ou l'adéquation des informations
            mises à disposition sur le site, y compris l'ensemble des liens hypertextes ou toute autre liaison informatique
            utilisée, directement ou indirectement, à partir de ces sites.</p>
        <p>Les sites sont protégés par les droits d'auteurs. L'usage de tout ou partie des sites, notamment par téléchargement,
            reproduction, transmission ou représentation sur tous les supports et par tous les procédés, à d'autres fins que
            pour usage personnel et privé dans un but non commercial est strictement interdit.
        </p>
<p>Les dénominations sociales, marques et signes distinctifs reproduits sur les sites sont égalements protégés au titre 
    du droit des marques. La reproduction ou la représentation de tout ou partie d'un des signes précités doit faire 
    l'objet d'une autorisation écrite préalable des titulaires des marques et signes.
</p>
<p>De façon générale, toute reproduction ou représentation non autorisée de marques, logos, dessins, modèles, 
    d'oeuvres littéraires, musicales, audiovisuelles, photographiques, et plus généralement de tout élément susceptible 
    d'être protégé par un droit de propriété intellectuelle accessibles sur les sites est interdite et constituerait une 
    contrefaçon et, suivant le code de la propriété intellectuelle, à moins que cette 
    reproduction ou représentation ne soit exclusivement réservée à un usage strictement personnel et privé.
</p>
    </article>
    </div>


    <?php
            require_once("footer.php")
        ?>
    </body>
</html>