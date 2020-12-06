document.querySelector('#form').addEventListener('submit', function (e) {
  var mail = document.querySelector('#inputEmail')
  if (mail.value.lenght != 16) {
    alert('le email est incorrect!')
    e.preventDefault();
  }
  var passe = document.querySelector('#inputPassword')
  if (passe.value.lenght !=8) {
    alert('mot de passe incorrect')
    e.preventDefault();
  }
})
