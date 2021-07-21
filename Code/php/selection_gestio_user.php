<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/selection_gestio_user.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
        <title>Res Novae - Tests Psychotechniques</title>
    </head>

    <body>
<div id="bloc_page">
            <?php include("menu.php"); ?>
 <ul class="breadcrumb">
                <li><a href="Accueil.php">Accueil</a></li>
                <li><a href="Connexion.php">Se connecter</a></li>
                <li><a href="selection_gestio_user.php">Type d'utilisateur</a></li>
            </ul>

<br><br><br><br><br>


    <div class="container">

        <div class="container-onglets">
            <div class="onglets active" data-anim="1">Utilisateur</div>
            <div class="onglets" data-anim="2">Gestionnaire</div>
            <div class="onglets" data-anim="3">Administrateur</div>
        </div>

        <div class="contenu activeContenu" data-anim="1">
            <h3>S'inscrire en tant qu'utilisateur</h3>
            <hr>
            <p>Vous êtes un joueur professionel ? Ou un joueur lamda ? Vous voulez tester vos capacités auditives, de réactivité, de stress ? Alors le compte utilisateur est fait pour vous!<br><br> En vous inscrivant avec ce type de compte, vous aurez accès aux différents contenus que nous proposons et à notre pannel de tests. Vous pourrez aussi modifier vos données, observer vos résultats mais aussi les partager à d'autres pour vous comparer et déterminer vos points forts et faiblesses. </p><br><p>Si le jeu auxquel vous souhaitez vous entrainer est par équipe, vous pourrez tout aussi faire appel à des gestionnaires avec lequel vous formerez des équipes à l'image des équipes E-Sport. </p>
            
        
        
            <a href="Inscription.php">Rejoignez notre plateforme en tant qu'utilisateur.</a>

        </div>

        <div class="contenu" data-anim="2">
            <h3>S'inscrire en tant que gestionnaire</h3>
            
            <hr>


            <p>Vous êtes le manager d'une équipe ? Vous tenez à analyser les performances de vos joueurs ? Rejoignez notre plateforme en tant que gestionnaire. </p>  <p>En vous inscrivant en tant que gestionnaire, les activités de tests vous seront innaccessibles. ? Néanmoins, vous aurez la possibilité de prendre en charge des utilisateurs, de voir leurs résultats individuels et communs à la manière d'un manager ou coach d'une équipe composée d'utilisateurs. </p>
        
        <!-- <img src="images/coach.jpg"/>  -->
            <br/> <br><br>
            <a href="Inscription_gestionnaire.php">Rejoignez notre plateforme en tant que gestionnaire.</a>

        </div>
        <div class="contenu" data-anim="3">
            <h3>S'inscrire en tant qu'administrateur</h3>
            
            <hr>


            <p>Vous êtes membre d'Infinite Measures et voulez rejoindre notre équipe d'aministrateurs et maintenir la gestion et la sécurité des utilisateurs ?    <br><br>En vous inscrivant en tant qu'administrateur, les activités et options disponibles pour les utilisateurs et gestionnaires vous seront innaccessibles ? Néanmoins, vous aurez la possibilité si nécessaire d'ajouter, de supprimer ou modifer des comptes. </p>
        
        <!-- <img src="images/coach.jpg"/>  -->
            
            <a href="Inscription_admin.php">Rejoignez notre plateforme en tant qu'administrateur.</a>

        </div>


        </div>
            <script src="../js/Inscription_onglet.js"></script>
            <br/>
            <?php include("footer.php"); ?>
        </div>
    </body>
</html>