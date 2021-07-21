<?php  

header("refresh:25; url=traitement_passerelle.php"); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/Mesresultats.css">
        <title>Res Novae - Tests Psychotechniques</title>
    </head>

    <body>
        <div id="bloc_page">

            <?php include("menuc.php"); ?>
            <div id="corps">
                    <div id="container" >
                        <div id="menu_vertical">
                                <div class="limenu" ><a href="Monprofil.php" >Mon profil</a></div>
                                <div class="limenu"><a href="Mesresultats.php" >Mes résultats</a></div>
                                <!--<div class="limenu"><a href="" >Messagerie</a></div>-->
                                <div class="limenu"><a href="" >Paramètres</a></div>
                        </div>

                        <div id="info_form">
                            <div id="info_personnel">
                                <h1 class="phrase">Veuillez suivre les instructions affichées sur la carte</h1>


                                <hr>
                            </div>
                            
                                                    </div>
                    </div>
                    
                
                <!--<?php // include("communication_Passerelle.php"); ?>
                
                -->
            </div>
            <?php include("footerc.php"); ?>

        </div>
    </body>
</html>
