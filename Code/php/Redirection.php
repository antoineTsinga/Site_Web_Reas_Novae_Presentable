
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
			<?php include'menu.php'?>
            <section>
                <div id="description">
                    Votre compte a été crée ! Redirection en cours...
                    <div id="bouton">
                </div>
                </div>
                <?php
					sleep(3);
  					header('Location: Connexion.php');
  					exit();
				?>
            </section>
            <?php include'footer.php' ?>
        </div>
    </body>
</html>
