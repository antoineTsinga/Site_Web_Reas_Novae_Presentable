<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/contact.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<title>Res Novae - Tests Psychotechniques</title>
	</head>

	<body>
		<div id="bloc_page">
			
            <?php
                if(isset($_SESSION['Id'])){
                     include'menuc.php';
                }
                else{
                    include'menu.php';
                }

            ?>
        <ul class="breadcrumb">
                <li><a href="Accueil.php">Accueil</a></li>
                <li><a href="Contact.php">Nous contacter</a></li> 
            </ul>
<br><br>
            <div id="corps">
                <div id="container">
                    <div id="description">
                        <div class="info">
                            <img src="../img/adresse.png" style="width:80px; block-size" />
                            <p>Adresse : 10 Rue de Vanves, 92130 Issy-les-Moulineaux, France</p>
                        </div>
                        <div class="info">
                            <img src="../img/mail.png" style="width:80px"/>
                            <p>Mail : resnovae20@gmail.com</p>
                        </div>
                        <div class="info">
                            <img src="../img/tel.jpg" style="width:80px"/>
                            <p>Téléphone : +33766573177</p>
                        </div>
                    </div>

                    <div id="contact">
                        <h2>Contactez-nous</h2>
                        <hr>
                        <p>Envoyez-nous directement un message à l'aide ce formulaire. Nous vous recontacterons dans les plus brefs délais.</p>
                        <fieldset>
                            <form name="myForm" method="post" action="traitement_contact.php" >
                                
                                <p class="info_perso">
                                    <label for="nom">Nom<span class="etoile_orange">*</span> :</label>
                                    <input type="text" name="nom" id="nom" required />
                                </p>
                                <p class="info_perso">
                                    <label for="prenom">Prénom<span class="etoile_orange">*</span></label>
                                    <input type="text" name="prenom" id="prenom" required />
                                </p>
                                <p class="info_perso">
                                    <label for="societe">Société</label>
                                    <input type="text" name="societe" id="societe" />
                                </p>
                                <p class="info_perso">
                                    <label for="email">E-mail<span class="etoile_orange">*</span> :</label>
                                    <input type="email" name="email" id="email" required />
                                </p>
                                <p class="info_perso">
                                    <label for="tel">Téléphone :</label>
                                    <input type="tel" name="telephone" id="tel" required />
                                </p>

                                <h4 class="hr">Votre message</h4>
                            
                                <div id="message">
                                    <p>
                                        <label for="objet" >Objet<span class="etoile_orange">*</span> :</label>
                                        <input type="text" name="objet" id="objet" required />
                                    </p>
                                    <p>
                                        <label for="question">Détails<span class="etoile_orange">*</span> :</label>
                                        <textarea name="question" id="question" rows="3" cols="96" placeholder="" ></textarea>
                                    </p>
                                </div>
                                
                                <div class="envoi">
                                    <input type="submit" name="formsend" id="formsend" value="Envoyer" onclick="envoyer()" />
                                </div>
                                <script type="text/javascript">
    function envoyer(){
        var result = confirm("Voulez-vous vraiment envoyer ce message ?");
        if (result == true) {
            alert("Le message a été envoyé avec succès.");
        }
        else {    
        alert("Vous avez annulé l'envoi de ce message.");
        }
    }
</script>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
            <?php
                if(isset($_SESSION['Id'])){
                     include'footerc.php';
                }
                else{
                    include'footer.php';
                }

            ?>
        </div>
    </body>
</html>