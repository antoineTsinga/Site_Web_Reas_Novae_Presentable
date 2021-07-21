<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/Forum.css">
		<title>Res Novae - Tests Psychotechniques</title>
	</head>

	<body>
		<div id="bloc_page">
            <?php
                if(isset($_SESSION['Id'])){
                     include'menuc.php';
                }
                else{
                   header('Location:Connexion.php');
                    die();
                }

            ?>
            <ul class="breadcrumb">
                <li><a href="Accueil.php">Accueil</a></li>
                <li><a href="Forum.php">Forum</a></li>
            </ul><br>
            <div id="corps">

                <div id="container">
                    <div class="sujets_forum">
                        <h2>Forum</h2>
                        <hr>
                        <p>Discutez avec nos internautes ici ! N'hesitez pas à consulter notre <a href="FAQ.php">Foire aux questions</a>, vous y trouverez peut-être des éléments de réponse ;)</p>

                        <div class="haut_table">
                            <a class="ajouter_sujet" href=#bouton_ajout>Ajouter un sujet</a>
                            <form action = "recherche.php" method = "get">
                               <input type = "search" name = "search">
                               <input id="bouton_recherche" type = "submit" name = "button_search" value = "Rechercher">
                            </form>
                        </div>
                        <div class="container_table_sujets">

                            <table id="table_sujets">

                                <tr id="tete_tableau">
                                    <td class="nom">Nom du sujet</td>
                                    <td class="nom">Createur</td>
                                    <td class="nom">Nombre de reponses</td>
                                    <td class="nom">Dernière activité</td>
                                    <td class="nom">Date de création</td>
                                </tr>
                                <?php
                                    include'database.php';
		                            global $db;
                                    // Récupération des 10 derniers messages
                                    $sujet = $db->query('SELECT idSujet, Titre_sujet, Nom, COUNT(idmessage), DATE_FORMAT(MAX(date_et_heure), \' %d/%m/%Y à %Hh%imin%ss\') AS date_et_heure, Date FROM (sujet LEFT OUTER JOIN utilisateur ON (sujet.Utilisateur_idUtilisateur = utilisateur.idUtilisateur)) LEFT OUTER JOIN reponse ON (sujet.idSujet = reponse.Sujet_idSujet ) GROUP by idSujet ORDER BY Date DESC LIMIT 0, 10');

                                    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

                                    while ($donnees = $sujet->fetch())
                                    {
                                        echo '<tr> <td class="nom">' . htmlspecialchars($donnees['Titre_sujet']) . '</td> <td class="nom">' . htmlspecialchars($donnees['Nom']) . '</td> <td class="nom">' . htmlspecialchars($donnees['COUNT(idmessage)']) . '</td> </td> <td class="nom">'.htmlspecialchars($donnees['date_et_heure']).' </td> <td class="nom">'.htmlspecialchars($donnees['Date']).' </td><td class="nom"> <a href=page_du_sujet.php?idSujet='.$donnees['idSujet'].'> consulter<a></td></tr>';
                                    }

                                    $sujet->closeCursor();

                                ?>
                            </table>
                        </div>
                    </div>

                    <div class="container_nouveau_sujet">

                        <button class="bouton_question" id="bouton_ajout">Ajouter un sujet </button>
                        <div class="panel">
                                <form class="zone_saisie" method="post" action="ajout_sujet.php">
                                    <div id="message">
                                        <p>
                                            <label for="sujet" >Sujet :</label>
                                            <input type="text" name="sujet" id="sujet" required />
                                        </p>
                                        <p>
                                            <label for="question">Message :</label>
                                            <textarea name="question" id="question" rows="20" cols="96" placeholder="" ></textarea>
                                        </p>
                                    </div>

                                    <div class="envoi" >
                                        <input type="submit" name="formsend" id="formsend" value="Envoyer" onclick="envoyer()" />
                                    </div>
                                    <script type="text/javascript">
    function envoyer(){
        var result = confirm("Voulez-vous vraiment publier cela ?");
        if (result == true) {
            alert("Le sujet a été publié avec succès.");
        }
        else {    
        alert("Vous avez annulé la publication");
        }
    }
</script>
                                </form>
                        </div >
                    </div>
                    <script src=../js/FAQ.js></script>
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
		</div>
	</body>
</html>
