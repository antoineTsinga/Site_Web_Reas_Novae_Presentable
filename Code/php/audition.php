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
                <li><a href="audition.php">Test d'audition</a></li>
            </ul>
            <br><br>
            <div id="corps">
                <div id="container">
                    <div id="description">
                        <div id="titre_img">
                            <h1>Mesure de l'audition</h1>
                            <div id="image">
                                <div>
                                    <img src="../img/audition3.png">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p> 
                             Cette fonctionnalité de mesure de l'audition permet de juger la qualité d'audition du joueur. Cette mesure n'est composé que d'un seul test.</br> 
                        </p>
                        <ul>
                            <li>Reconnaissance de la tonalité <p>Un son sera produit par l'appareil et le joueur devra par l'intermédiaire du microphone, reproduire la même tonalité que le son émis. Ce test attribuera un score à l’utilisateur en fonction de la ressemblance avec la fréquence de la note. </p></li>
                        </ul>
                        <p>
                            Cette mesure permet de fournir une statistique "<span class="forme">Perception</span>" qui correspond à la qualité d'audition du joueur. Cette statistique peut devenir très intéressante en fonction du fait que le jeu demande plus ou moins d'attention au niveau des sons.
                        </p>
                    </div>
                    <div id="bouton_test"><a href="communication_Passerelle4.php">
                        Lancer le test</a>
                    </div>
                    </div>
                </div>
            </div>
        <?php include("footerc.php"); ?>
    </body>
</html>