<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/recherche.css">
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
                <?php
                if(isset($_GET['search'])) {?>
                <li><a href="recherche.php?search=<?php echo $_GET['search']; ?> ">Recherche</a></li>
                <?php } ?>
            </ul><br>
            <div id="corps">

                <div id="container">

                    <h2>Reslustat pour <?php echo $_GET['search']; ?> </h2>
                    <hr>
                    <div class="haut_table">
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
                                // Si la session n'existe pas
                                    require 'database.php';
                                    global $db;
                                    // Si les variables existent
                                    if(isset($_GET['search'])) {
                                        $s = htmlspecialchars($_GET['search']);
                                        $search = explode(" ", $s); // casse la chaine de caractère en une liste de mots les délimiteurs ici sont des espaces
                                        $sql = "SELECT idSujet,Titre_sujet, Nom, COUNT(idmessage), DATE_FORMAT(MAX(date_et_heure), '%d/%m/%Y à %Hh%imin%ss') AS date_et_heure, Date FROM (sujet LEFT OUTER JOIN utilisateur ON (sujet.Utilisateur_idUtilisateur = utilisateur.idUtilisateur)) LEFT OUTER JOIN reponse ON (sujet.idSujet = reponse.Sujet_idSujet )";
                                        $sq ="SELECT COUNT(*) FROM sujet";
                                        $i = 0;
                                        $nbr_mot_important = 0;
                                        foreach ($search as $mot){
                                                $nbr_mot_important++;
                                                if($i==0){ //d'abord mettre le WHERE avant le premier mot
                                                    $sql.=" WHERE ";
                                                    $sq.=" WHERE ";
                                                }
                                                else{
                                                    $sql.=" OR ";
                                                    $sq.=" OR ";
                                                }
                                                $sql.="Titre_sujet LIKE '%$mot%'";
                                                $sq.="Titre_sujet LIKE '%$mot%'";
                                                $i++;
                                        }
                                        $sql.=" GROUP by idSujet ORDER BY Date DESC LIMIT 0, 10";
                                        $sq.=" ORDER BY Date DESC LIMIT 0, 10";
                                        $re=$db->query($sq);

                                        $res = $re -> fetch();
                                            echo "<span style='color: red'>".$res[0]." Résultats trouvés</span>";

                                        $req=$db->query($sql);
                                        while ($results = $req -> fetch()){
                                                $i = 1;
                                                foreach ($search as $mot){
                                                    $i++;
                                                    if($i>4){$i=1;}
                                                    $results['Titre_sujet'] = str_ireplace($mot, '<span class ="surlign'.$i.'">'.$mot.'</span>',($results['Titre_sujet']));
                                                }
                                                 echo '<tr> <td class="nom">' . $results['Titre_sujet']. '</td> <td class="nom">' . htmlspecialchars($results['Nom']) . '</td> <td class="nom">' . htmlspecialchars($results['COUNT(idmessage)']) . '</td> </td> <td class="nom">'.htmlspecialchars($results['date_et_heure']).' </td> <td class="nom">'.htmlspecialchars($results['Date']).' </td><td class="nom"> <a href=page_du_sujet.php?idSujet='.$results['idSujet'].'> consulter<a></td></tr>';
                                            $j++;

                                        }
                                    }
                                    ?>
                            </table>
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
		</div>
	</body>
<style type="text/css">
    .surlign1{
        font-style: italic;
        background-color: #ffff00;
    }
    .surlign2{
        font-style: italic;
        background-color: #ff99ff;
    }.surlign3{
        font-style: italic;
        background-color: #ff9999;
    }
     .surlign4{
        font-style: italic;
        background-color: #9999ff;
    }
</style>

</html>

