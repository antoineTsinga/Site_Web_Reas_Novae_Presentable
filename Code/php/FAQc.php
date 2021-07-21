<?php 
session_start(); 
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="FAQ.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">

        <title>Res Novae - Tests Psychotechniques</title>
    </head>

    <body>
        
        <div id="bloc_page">
            <?php include("menuc.php"); ?>
            <div id="corps">
                <div id="container">
                    <div id="description">
                        <h1>Foire aux Questions</h1>
                        <hr>
                          <button class="bouton_question"><strong>Questions Générales</strong></button>
                            <div class="panel">
                            <div align="justify" class="box"><span class="question">Quel est le but du site ?</span><p>Le site sert de support aux équipes esports afin qu'elles aient la possibilité de tester les performances de leurs joueurs en temps réel.</p></div>
                            <div align="justify" class="box"><span class="question">Le site est-il accessible aux simples joueurs sans équipe et non-professionnels ?</span><p>Il est tout à fait possible d'utiliser le site en tant que joueur non-professionel si vous êtes dotés de l'appareil de tests mais certaines fonctionnalités ne sont ouvertes qu'aux grandes équipes Esport.</p></div>
                            <div align="justify" class="box"><span class="question">Je n'arrive pas à me connecter, que faire ?</span><p>Si votre connexion échoue, cela peut être dû à des identifiants et mots de passes incorrects. Si ce n'est pas le cas, rendez-vous sur la rubrique <a href="Contact.php">Contact</a> et envoyez un message à notre équipe en détaillant le type d'erreur que vous avez.</p></div>
                            <div align="justify" class="box"><span class="question">Peut-on faire un test sans avoir de compte ?</span><p>Non, il faut impérativement se connecter pour avoir accès à cette fonctionnalité.</p></div>
                            </div>
                              <br>
                              <button class="bouton_question"><strong>Questions : Joueur</strong></button>
                            <div class="panel">
                            <div align="justify" class="box"><span class="question">Comment faire des tests ?</span><p>Il suffit de se rendre sur la rubrique <a href="Tests_Psycho.php">Tests Psychotechniques</a> et de cliquer sur l'une des trois icones de tests. Les informations seront détaillés directement sur chaque page de test.</p></div>
                            <div align="justify" class="box"><span class="question">Existe-t-il une recommandation d'âge pour faire les tests ?</span><p>Les tests sont accessibles pour tous les âges à partir de 12 ans.</p></div>
                            </div>
                              <br>
                               <button class="bouton_question"><strong>Questions : Gestionnaire</strong></button>
                            <div class="panel">
                            <div align="justify" class="box"><span class="question">Comment ajouter un joueur à son équipe ?</span><p>En tant que gestionnaire, vous devez vous rendre sur le profil du joueur à l'aide de la barre de recherche et ensuite cliquez sur le bouton ajouter.</p></div>
                            </div>
                            <p>Si vous avez d'autres questions, n'hésitez pas à nous contacter via la rubrique <a href="Contact.php">Contact</a>.</p>
                </div>
                <script src=FAQ.js></script>
            </div>
        </div>
        <?php include("footerc.php"); ?>
    </body>
</html>