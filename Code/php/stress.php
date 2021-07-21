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
                <li><a href="stress.php">Test de mesures stress</a></li>
            </ul> <br>
            <div id="corps">
                <div id="container">
                    <div id="description">
                        <div id="titre_img">
                            <h1>Mesure du stress</h1>
                            <div id="image">
                                <div>
                                    <img src="../img/stress1.png">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p> 
                             Cette fonctionnalité de mesure du stress donne la possibilité de pouvoir mesurer le niveau de nervosité et de stress des joueurs. La mesure est composée de deux tests différents :</br> 
                        </p>
                        <ul>
                            <li>Calcul de la fréquence cardiaque<p>Pour utiliser le capteur cardiaque, vous devrez mettre votre doigt entre la lumière et le composant. Cela affichera donc votre fréquence cardiaque et votre niveau de stress</p></li>
                            <li>Calcul de la température de la peau<p>Le principe du capteur de température repose sur sa capacité à mesurer au contact et avec précision une température. En tant que joueur, vous devrez donc poser votre doigt sur le capteur qui en soutirera une température.</p></li>
                        </ul>
                        <p>
                            A la fin de la mesure, nos tests pourront donc fournir une statistique "<span class="forme">Forme</span>" qui correspond globalement au niveau mental du joueur. C’est très important, d’autant plus que l’état mental d’un joueur au moment de la compétition est ce qui fait la différence entre une défaite et une victoire.
                        </p>
                    </div>
                    <div id="bouton_test"><a href="communication_Passerelle2.php">
                        Lancer le test</a>
                    </div>
                    <!--<div id="bouton_test"><a href="">
                        Allumer la LED</a>
                    </div>-->

                    
                    </div>
                </div>
            </div>
        <?php include("footerc.php"); ?>
    </body>
</html>