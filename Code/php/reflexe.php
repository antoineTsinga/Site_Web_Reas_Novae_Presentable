<?php 
    session_start();
    if(!isset($_SESSION['Id'])){
        header('Location:Connexion.php');
        die();
    }
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/Tests_Psycho.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
        <title>Res Novae - Tests Psychotechniques</title>
    </head>

    <body>
        <div id="bloc_page">
            <?php include("menuc.php"); ?>
             <ul class="breadcrumb">
                <li><a href="Accueil.php">Accueil</a></li>
                <li><a href="Tests_Psycho.php">Tests Psychotechniques</a></li>
                <li><a href="reflexe.php">Test de reflexes</a></li>
            </ul><br>
            <div id="corps">
                <div id="container">
                    <div id="description">
                        <div id="titre_img">
                            <h1>Mesure des réflexes</h1>
                            <div id="image">
                                <div>
                                    <img src="../img/oeil.png">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p> 
                             Cette fonctionnalité de mesure des réflexes permet de mesurer le temps de réaction du joueur face à différents stimulis. La mesure est composée de deux tests différents :</br> 
                        </p>
                        <ul>
                            <li>Réflexe sonore<p>Ce test est utilisé pour vérifier les réflexes de l'utilisateur face à des stimulis sonores.</p></li>
                            <li>Réflexe visuel<p>Ce test permet de vérifier les réflexes de l'utilisateur face à des stimulis visuels.</p></li>
                        </ul>
                        <p>
                            Ces différents test de réaction permettent de créer la statistique "<span class="forme">Réactivité</span>" qui correspond donc à la capacité du joueur à réagir rapidement à un changement de situation. C'est l'une des compétences fondamentale pour un joueur de haut niveau. Avoir de très bons réflexes est une necessité pour entrer dans la compétition esport.
                        </p>
                    </div>
                    <div id="bouton_test"><a href="communication_Passerelle3.php">
                        Lancer le test</a>
                    </div>
                     <!--<div id="bouton_test"><a href="communication_Passerelle2.php">
                        Allumer la LED</a>
                    </div>-->

                    </div>
                </div>
            </div>
        <?php include("footerc.php"); ?>
    </body>
</html>