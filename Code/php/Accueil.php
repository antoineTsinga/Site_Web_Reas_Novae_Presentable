<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/Accueil.css">
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
            </ul>
                <br><br>

            <div id="corps">
			<div id="tests_image">
                <div id="tests_description" style="font-size: 12pt">
                    <a href="Tests_Psycho.php" class="bouton_rouge">Tester ses aptitudes</a>
                </div>
            </div >
            <div id="description_et_savoir_plus">
                <div id="description">

                    <p> N'avez-vous jamais rêver de pouvoir suivre votre progression à tout moment et en toute simplicité ? N'est-ce pas difficile de s'améliorer quand on ne sait pas ce qui nous manque ?</p> <p>Le site Res Novae est fait pour vous ! Vous pouvez grâce à nos tests déterminer vos points forts et vos points faibles en temps réel. Peu importe le type de jeu, nous saurons vous dire les détails de vos performances afin de vous aider à progresser. Chers Joueurs, Joueuses et équipe ESports, nous sommes le soutien dont vous avez besoin !</p>
                </div>
            
                <div id="test">
                    <a href="A_propos.php">En savoir plus </a> 
                </div>
            </div>
        </div>
                        <!-- SCROLLER -->
                     
        <section class="scroll-container">
              <div class="scroll-element js-scroll slide-left">
                    <img src="../img/gamespot.jpg" width="670px" height="500px"  style="padding-left: 10px">

              </div>
              <div class="scroll-caption">
                    <div id="description_et_savoir_plus">
                        <h1>Rejoignez les plus grands et brisez vos limites ! </h1>
                        <br>
                        <p>Devenez joueur professionnel grâce à notre plateforme unique de tests. </p>
                </div>

              </div>
        </section>
        <section class="scroll-container">
              <div class="scroll-element js-scroll slide-right">
                    <img src="../img/gamehandshake.jpg" width="670px" height="500px" style="padding-left: 10px">
              </div>
              <div class="scroll-caption">
                    <div id="description_et_savoir_plus">
                     <h1>Developpez des relations, créez votre propre réseau !   </h1>
                     <br>
                     <p>Rejoignez une équipe ou créer votre propre équipe de joueurs.</p>
                     <p>Comparez vos résultats pour porgresser ensemble et en un rien de temps ! </p>
                 </div>

              </div>
        </section>

        <script src="../js/Accueil.js"></script>

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

