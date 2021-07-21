<?php
session_start();
include 'database.php';
global $db;

    $forme = '';
    $datef = '';
    $moyennef = 0;
    $incr = 1;



$moyenne_forme = $db->prepare('SELECT Score FROM `resultat` 
            INNER JOIN test
            ON resultat.test_idtest = test.idtest
            INNER JOIN utilisateur
            ON resultat.Utilisateur_idUtilisateur = utilisateur.idUtilisateur
            INNER JOIN categories_test
            ON test.id_categories_test = categories_test.id_categories
            INNER JOIN membres_equipe
            ON membres_equipe.idUtilisateur = utilisateur.idUtilisateur
            INNER JOIN gestionnaire
            ON gestionnaire.idGestionnaire = membres_equipe.idGestionnaire
            WHERE gestionnaire.idGestionnaire =? AND categories =?');

$moyenne_forme->execute(array($_SESSION['Id'],'Forme'));
while ($moyenne = $moyenne_forme->fetch()) {
    $moyennef = ($moyennef + $moyenne['Score'])/$incr;
    $incr++;
}



$reflexe = '';
$dater = '';
    $moyenner = 0;
    $incr = 1;

$resultat_reflexe = $db->prepare('SELECT Score,Date FROM `resultat` 
            INNER JOIN test
            ON resultat.test_idtest = test.idtest
            INNER JOIN utilisateur
            ON resultat.Utilisateur_idUtilisateur = utilisateur.idUtilisateur
            INNER JOIN categories_test
            ON test.id_categories_test = categories_test.id_categories
            WHERE Email =? AND categories =?
            ORDER BY Date DESC
            LIMIT 10');

$resultat_reflexe->execute(array($_SESSION['Email'],'Reactivite'));
while($row= $resultat_reflexe->fetch())
{
    $reflexe = $reflexe . '"'. $row['Score'].'",';
    $dater = $dater . '"'. $row['Date'] .'",';
}
$reflexe = trim($reflexe,",");
$dater = trim($dater,",");

$moyenne_reflexe = $db->prepare('SELECT Score FROM `resultat` 
            INNER JOIN test
            ON resultat.test_idtest = test.idtest
            INNER JOIN utilisateur
            ON resultat.Utilisateur_idUtilisateur = utilisateur.idUtilisateur
            INNER JOIN categories_test
            ON test.id_categories_test = categories_test.id_categories
            INNER JOIN membres_equipe
            ON membres_equipe.idUtilisateur = utilisateur.idUtilisateur
            INNER JOIN gestionnaire
            ON gestionnaire.idGestionnaire = membres_equipe.idGestionnaire
            WHERE gestionnaire.idGestionnaire =? AND categories =?');

$moyenne_reflexe->execute(array($_SESSION['Id'],'Reactivite'));

while ($moyenne = $moyenne_reflexe->fetch()) {
    $moyenner = ($moyenner + $moyenne['Score']) / $incr;
    $incr++;
}

$perception = '';
$datep = '';
$moyennep = 0;
    $incr = 1;

$resultat_perception = $db->prepare('SELECT Score,Date FROM `resultat` 
            INNER JOIN test
            ON resultat.test_idtest = test.idtest
            INNER JOIN utilisateur
            ON resultat.Utilisateur_idUtilisateur = utilisateur.idUtilisateur
            INNER JOIN categories_test
            ON test.id_categories_test = categories_test.id_categories
            WHERE Email =? AND categories =?
            ORDER BY Date DESC
            LIMIT 10');

$resultat_perception->execute(array($_SESSION['Email'],'Perception'));

while($row= $resultat_perception->fetch())
{
    $perception = $perception . '"'. $row['Score'].'",';
    $datep = $datep . '"'. $row['Date'] .'",';
}
$perception = trim($perception,",");
$datep = trim($datep,",");

$moyenne_perception = $db->prepare('SELECT Score FROM `resultat` 
            INNER JOIN test
            ON resultat.test_idtest = test.idtest
            INNER JOIN utilisateur
            ON resultat.Utilisateur_idUtilisateur = utilisateur.idUtilisateur
            INNER JOIN categories_test
            ON test.id_categories_test = categories_test.id_categories
            INNER JOIN membres_equipe
            ON membres_equipe.idUtilisateur = utilisateur.idUtilisateur
            INNER JOIN gestionnaire
            ON gestionnaire.idGestionnaire = membres_equipe.idGestionnaire
            WHERE gestionnaire.idGestionnaire =? AND categories =?');

$moyenne_perception->execute(array($_SESSION['Id'],'Perception'));
while ($moyenne = $moyenne_perception->fetch()) {
    $moyennep = ($moyennep + $moyenne['Score']) / $incr;
    $incr++;
}

?>


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
                            <div class="limenu"><a href="Monprofil.php">Mon profil</a></div>
                            <div class="limenu"><a href="resultat_equipe.php" >Résultats de l'équipe</a></div>
                            <!--<div class="limenu"><a href="Tests_Psycho.php" >Messagerie</a></div>-->
                            <div class="limenu"><a href="Rechercher_membre.php" >Rechercher un membre</a></div>
                            <div class="limenu"><a href="Aide.php" >Paramètres</a></div>
                    </div>
                        <div id="info_form">
                            <div id="info_personnel">
                                <h1 class="phrase"><?php echo $_SESSION['Prenom']; ?>, voici les résultats de vos joueurs:</h1>
                                <hr>
                            </div>
                            <div id="graphique">
                                <p>Score moyen de votre équipe :</p>
                                 <canvas id="myChart"></canvas>
                                 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
                                <script>
                                    var ctx = document.getElementById('myChart').getContext('2d')
                                    var data = {
                                                    labels: ['Forme', 'Réactivité', 'Perception'],
                                                    datasets: [{
                                                        data: [<?php echo $moyennef; ?>, <?php echo $moyenner; ?>, <?php echo $moyennep; ?>],
                                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                                        borderColor: 'rgb(255, 99, 132)',
                                                        pointBackgroundColor: 'rgb(255, 99, 132)',
                                                        pointBorderColor: '#fff',
                                                        pointHoverBackgroundColor: '#fff',
                                                        pointHoverBorderColor: 'rgb(255, 99, 132)',
                                                        label: 'Statistiques du Joueur',
                                                    }]
                                                }

                                    var options

                                    var config = {
                                        type : 'radar',
                                        data : data,
                                        options : options,
                                    }
                                    var myChart = new Chart(ctx,config)
                                </script>
                                
                            </div>
                            <div id="block_affiche">
                                <canvas width="300" height="210"></canvas>
                                <p>Membres de l'équipe</p>
                                <?php  
                                    include 'database.php';
                                    global $db;

                                    $avatar = $db->prepare('SELECT utilisateur.avatar FROM utilisateur
                                        INNER JOIN membres_equipe
                                        ON membres_equipe.idUtilisateur = utilisateur.idUtilisateur
                                        INNER JOIN gestionnaire
                                        ON membres_equipe.idGestionnaire = gestionnaire.idGestionnaire
                                        WHERE gestionnaire.idGestionnaire =?');
                                    $avatar->execute(array($_SESSION['Id']));

                                    $membres = $db->prepare('SELECT utilisateur.Nom,utilisateur.Prenom FROM utilisateur
                                        INNER JOIN membres_equipe
                                        ON membres_equipe.idUtilisateur = utilisateur.idUtilisateur
                                        INNER JOIN gestionnaire
                                        ON membres_equipe.idGestionnaire = gestionnaire.idGestionnaire
                                        WHERE gestionnaire.idGestionnaire =?');
                                    $membres->execute(array($_SESSION['Id']));

                                    while($affiche_membres = $membres->fetch() AND $affiche_avatar = $avatar->fetch()){
                                        $membref = 0;
                                            $membrer = 0;
                                            $membrep = 0;
                                            $incr = 1;

                                        $membre_forme = $db->prepare('SELECT Score FROM `resultat` 
                                                    INNER JOIN test
                                                    ON resultat.test_idtest = test.idtest
                                                    INNER JOIN utilisateur
                                                    ON resultat.Utilisateur_idUtilisateur = utilisateur.idUtilisateur
                                                    INNER JOIN categories_test
                                                    ON test.id_categories_test = categories_test.id_categories
                                                    INNER JOIN membres_equipe
                                                    ON membres_equipe.idUtilisateur = utilisateur.idUtilisateur
                                                    INNER JOIN gestionnaire
                                                    ON gestionnaire.idGestionnaire = membres_equipe.idGestionnaire
                                                    WHERE utilisateur.Nom = ? AND utilisateur.Prenom = ? AND categories =?');

                                        $membre_forme->execute(array($affiche_membres['Nom'],$affiche_membres['Prenom'],'Forme'));
                                        while ($moyenne = $membre_forme->fetch()) {
                                            $membref = ($membref + $moyenne['Score'])/$incr;
                                            $incr++;
                                        }
                                        $incr = 1;

                                        $membre_reactivite = $db->prepare('SELECT Score FROM `resultat` 
                                                    INNER JOIN test
                                                    ON resultat.test_idtest = test.idtest
                                                    INNER JOIN utilisateur
                                                    ON resultat.Utilisateur_idUtilisateur = utilisateur.idUtilisateur
                                                    INNER JOIN categories_test
                                                    ON test.id_categories_test = categories_test.id_categories
                                                    INNER JOIN membres_equipe
                                                    ON membres_equipe.idUtilisateur = utilisateur.idUtilisateur
                                                    INNER JOIN gestionnaire
                                                    ON gestionnaire.idGestionnaire = membres_equipe.idGestionnaire
                                                    WHERE utilisateur.Nom = ? AND utilisateur.Prenom = ? AND categories =?');

                                        $membre_reactivite->execute(array($affiche_membres['Nom'],$affiche_membres['Prenom'],'Reactivite'));
                                        while ($moyenne = $membre_reactivite->fetch()) {
                                            $membrer = ($membrer + $moyenne['Score'])/$incr;
                                            $incr++;
                                        }
                                        $incr = 1;

                                        $membre_perception = $db->prepare('SELECT Score FROM `resultat` 
                                                    INNER JOIN test
                                                    ON resultat.test_idtest = test.idtest
                                                    INNER JOIN utilisateur
                                                    ON resultat.Utilisateur_idUtilisateur = utilisateur.idUtilisateur
                                                    INNER JOIN categories_test
                                                    ON test.id_categories_test = categories_test.id_categories
                                                    INNER JOIN membres_equipe
                                                    ON membres_equipe.idUtilisateur = utilisateur.idUtilisateur
                                                    INNER JOIN gestionnaire
                                                    ON gestionnaire.idGestionnaire = membres_equipe.idGestionnaire
                                                    WHERE utilisateur.Nom = ? AND utilisateur.Prenom = ? AND categories =?');

                                        $membre_perception->execute(array($affiche_membres['Nom'],$affiche_membres['Prenom'],'Perception'));
                                        while ($moyenne = $membre_perception->fetch()) {
                                            $membrep = ($membrep + $moyenne['Score'])/$incr;
                                            $incr++;
                                        }


                                        if($affiche_avatar['avatar'] == NULL){
                                           echo "<button class=\"affiche\" style=\"text-align:center\"><img src=\"../img/circulaire.png\" width=\"120\" height=\"120\"><p> ".$affiche_membres['Nom']." ".$affiche_membres['Prenom']."</p>  
                                           </button>
                                            <div class=\"panel\"> <div align=\"justify\" class=\"box\"><p>Forme :".$membref."</p><p>Reactivite :".$membrer."</p><p>Perception :".$membrep."</p></div></div>";

                                        }
                                        else{
                                       echo "<button class=\"affiche\" style=\"text-align:center\"><img src=\"../img/membres/avatars/".$affiche_avatar['avatar']."\" width=\"120\" height=\"120\"><p> ".$affiche_membres['Nom']." ".$affiche_membres['Prenom']."</p></button>
                                       <div class=\"panel\"> <div align=\"justify\" class=\"box\"><p>Forme :".$membref."</p><p>Reactivite :".$membrer."</p><p>Perception :".$membrep."</p></div></div>";
                                   }
                                    }
                                ?>
                                <script src=../js/equipe.js></script>
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php include("footerc.php"); ?>

        </div>
    </body>
</html>

