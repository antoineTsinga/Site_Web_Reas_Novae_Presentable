<?php 
    session_start();
?>
<!DOCTYPE html>
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
                <li><a href="Tests_Psycho.php">Tests Psychotechniques</a></li> 
            </ul>
<br><br>
            <div id="corps">
                <div id="container">
                    <div id="description">
                        <h1>Tests Psychotechniques</h1>
                        <hr>
                        <p> 
                            Notre site, à l'aide des différents capteurs intégrés de l'appareil connecté au server, peut mesurer les trois facteurs les plus importants pour un joueur de jeu-vidéo, il permet notemment de realiser les mesures suivantes :
                        </p>
                        <ul>
                            <li>la mesure du stress</li>
                            <li>la mesure de son audition</li>
                            <li>la mesure de ses réflexes</li>
                        </ul>
                        <p>
                            Le choix des facteurs a été décidé après une longue recherche sur ce qui sépare un joueur moyen d'un joueur d'exception. Il ne vous reste plus qu'à choisir le test que vous voulez passer afin de determiner votre niveau en fonction de vos performences. Bonne concentration !
                        </p>
                    </div>
                    <div id="tests">
                        <div id="stress">
                            <figure>
                                <a href="stress.php">
                                <img src="../img/stress1.png"/>
                                <figcaption>Stress </figcaption>
                                </a>
                            </figure> 
                        </div>
                        <div id="audition">
                            <figure>
                                <a href="audition.php">
                                <img src="../img/audition3.png"/>
                                <figcaption>Audition </figcaption>
                                </a>
                            </figure>                    
                        </div>
                        <div id="reflexe">
                            <figure>
                                <a href="reflexe.php">
                                <img src="../img/oeil.png"/>
                                <figcaption>Réflexe </figcaption>  
                                </a> 
                            </figure>                 
                        </div>
                    </div>
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
    </body>
</html>