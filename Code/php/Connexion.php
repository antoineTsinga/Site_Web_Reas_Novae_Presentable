<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/Connexion.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<title>Res Novae - Tests Psychotechniques</title>
	</head>

	<body>
		<div id="bloc_page">
			<?php include'menu.php'; ?>
            <ul class="breadcrumb">
                <li><a href="Accueil.php">Accueil</a></li>
                <li><a href="Connexion.php">Se connecter</a></li> 
            </ul>
<br>
            <div id="corps">
                <div id="container">
                    <h2>Connectez-vous pour disposer de l'ensemble des fonctionnalités !</h2>
                    <hr>
                    <fieldset>
                        <legend>Connexion</legend>
                        <form name="myForm" method="post" >
                        
                            <p class="nom">
                                <label for="pseudo">Votre adresse Email : </label>
                                <input type="email" name="email" id="email" placeholder="Saisissez votre addresse"/>
                            </p>

                            <p class="nom">
                               <label for="password">Votre mot de passe : </label>
                               <input type="password" name="mdp" id="mdp" placeholder="Saisissez votre mot de passe"/> 
                            </p>

                            <div id="connexion"><input type="submit" name="formlogin" id="formlogin" value="Se connecter" ></div>  
                            <?php include'login.php';?>
                        </form>

                        <div class="aligner">
                            <p><a href="Newpassword.php">Mot de passe oublié ?</p>
                            <p><a href="selection_gestio_user.php">Vous n'avez pas encore de compte ? Inscrivez-vous !</a><br/></p>
                        </div>
                    </fieldset>
                </div>       
            </div>
            <?php include'footer.php';?>
        </div>
    </body>
</html>

