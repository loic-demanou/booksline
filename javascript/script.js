/*  pour tous les liens mènant hors du site */

var lien= document.getElementById('externe')
  for (var i = 0; i < lien.length; i++) {
   var liens = lien[i];
   lien.addEventListener('click', function (e) {
        var reponse = confirm("voulez-vous vraiment quitter ce site?");
    if (reponse== false) {
          e.preventDefault();
       return false;
    }

  })
  }
  