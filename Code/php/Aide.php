<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../aide1.css">
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
            <section>
                <div class="aligner">
                <br/><h1 style="font-size: 20pt">Besoin d'aide sur un sujet en particulier ?</h1>
                <h2 style="font-size: 16pt">Consultez notre <a href="FAQ.php">Forum Aux Questions</a> ou posez votre question ci-dessous !</h2></div>
                <form method="post" action="traitement.php"></form>
                <p><label for="objet" style="color:white">Objet</label><br/>
                <input type="text" name="objet" id="objet" required style="width: 450px" autofocus /></p>
                <label for="question"style="color:white">Détails</label><br/>
                <textarea name="question" id="question" rows="3" cols="96" placeholder="Ecrivez ici votre question"></textarea><br/>
                <p><input type="radio" name="publier_question" value="publier_question" id="publier_question"><label for="publier_question"style="color:white"> Publier une question <p style="color: grey">Vous avez besoin d'aide concernant une question technique ? Vous avez besoin d'assistance ? Sélectionnez cette option pour poser la question à la communauté.</p></label>
                <input type="radio" name="publier_discussion" value="publier_discussion" id="publier_discussion"><label for="publier_discussion"style="color:white"> Publier une discussion <p style="color: grey">Vous n'avez pas de question, mais vous aimeriez donner votre avis ? Vous avez des conseils ou des recommandations à partager ? Sélectionnez cette option pour lancer une discussion avec la communauté.</p></label></p>
                <input type="checkbox" name="avertir" value="avertir" id="avertir"><label for="avertir" style="color:white"> M'avertir lorsque quelqu'un répond à cette publication</label></p>
                <input type="submit" value="Envoyer" style="font-size: 11pt" />
            </section>

                 </section>
<br/>
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
