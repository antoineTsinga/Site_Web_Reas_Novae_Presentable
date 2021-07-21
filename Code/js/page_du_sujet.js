
function rep(id_lien, id_message, idSujet){

  let event = document
    .getElementById(id_lien);


  document
    .getElementById("texte_rep")
    .innerHTML = event.parentElement.parentElement.nextElementSibling.children[0].textContent;

  document
    .getElementById("tete_rep")
    .innerHTML = "Vous repondez à " + "<span style='color: midnightblue'>" + event.parentElement.previousElementSibling.children[0].textContent + "</span>" + " qui à dit :</br></br>";

  document
    .getElementById("repac_message_rep").style.boxShadow = "0 0 10px rgba(0,0,0,0.5)";

  document
      .getElementsByClassName("zone_saisie")[0].action = "reponse_forum.php?idSujet=" +idSujet + "&id_message=" + id_message;


  }
