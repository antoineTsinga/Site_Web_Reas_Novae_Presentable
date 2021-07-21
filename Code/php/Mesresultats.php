<?php 
    session_start();
    if(!isset($_SESSION['Id'])){
        header('Location:Connexion.php');
        die();
    }    
?>

<?php
include 'database.php';
global $db;

    $forme = '';
    $datef = '';
    $moyennef = 0;
    $incr = 1;

$resultat_forme = $db->prepare('SELECT Score,Date FROM `resultat` 
            INNER JOIN test
            ON resultat.test_idtest = test.idtest
            INNER JOIN utilisateur
            ON resultat.Utilisateur_idUtilisateur = utilisateur.idUtilisateur
            INNER JOIN categories_test
            ON test.id_categories_test = categories_test.id_categories
            WHERE Email =? AND categories =?
            ORDER BY Date DESC
            LIMIT 10');

$resultat_forme->execute(array($_SESSION['Email'],'Forme'));
while($row= $resultat_forme->fetch())
{
    $forme = $forme . '"'. $row['Score'].'",';
    $datef = $datef . '"'. $row['Date'] .'",';
}
$forme = trim($forme,",");
$datef = trim($datef,",");

$moyenne_forme = $db->prepare('SELECT Score FROM `resultat` 
            INNER JOIN test
            ON resultat.test_idtest = test.idtest
            INNER JOIN utilisateur
            ON resultat.Utilisateur_idUtilisateur = utilisateur.idUtilisateur
            INNER JOIN categories_test
            ON test.id_categories_test = categories_test.id_categories
            WHERE Email =? AND categories =?');

$moyenne_forme->execute(array($_SESSION['Email'],'Forme'));
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
            WHERE Email =? AND categories =?');

$moyenne_reflexe->execute(array($_SESSION['Email'],'Reactivite'));

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

$resultat_perception->execute(array($_SESSION['Email'],'Temperature'));

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
            WHERE Email =? AND categories =?');

$moyenne_perception->execute(array($_SESSION['Email'],'Temperature'));
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
                                <div class="limenu" ><a href="Monprofil.php" >Mon profil</a></div>
                                <div class="limenu"><a href="Mesresultats.php" >Mes résultats</a></div>
                                <!--<div class="limenu"><a href="" >Messagerie</a></div>-->
                                <div class="limenu"><a href="" >Paramètres</a></div>
                        </div>

                        <div id="info_form">
                            <div id="info_personnel">
                                <h1 class="phrase"><?php echo $_SESSION['Prenom']; ?>, voici vos statistiques générales:</h1>
                                <hr>
                            </div>
                            <div id="graphique">
                                <p>Vos moyennes aux tests: </br> </br>Forme = <?php echo $moyennef; ?></br></br>
                                Réactivité = <?php echo $moyenner; ?></br></br>
                                Temperature  = <?php echo $moyennep; ?></p>
                                 <canvas id="myChart"></canvas>
                                 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
                                <script>
                                    var ctx = document.getElementById('myChart').getContext('2d')
                                    var data = {
                                                    labels: ['Forme', 'Réactivité', 'Temperature'],
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
                            <div id="resultat_test">
                                <p>Voici vos 10 derniers résultats de test :</p>
                                <h2>Forme</h2>
                                <canvas id="graph_test"></canvas>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
                                <script>
                                    var ctx = document.getElementById('graph_test').getContext('2d')

                                    var data = {
                                                    labels: [<?php echo $datef; ?>],
                                                    datasets: [{
                                                        data: [<?php echo $forme; ?>
                                                        ],
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)'],
                                                        label: '10 derniers tests',
                                                    }]
                                                }

                                    var options = {
                                                scales: {
                                                  y: {
                                                    beginAtZero: true
                                                  }
                                                }
                                              }

                                    var config = {
                                        type : 'bar',
                                        data : data,
                                        options : options,
                                    }
                                    var graph_test = new Chart(ctx,config)
                                </script>
                                <h2>Réactivité</h2>
                                <canvas id="graph_test1"></canvas>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
                                <script>
                                    var ctx = document.getElementById('graph_test1').getContext('2d')

                                    var data = {
                                                    labels: [<?php echo $dater; ?>],
                                                    datasets: [{
                                                        data: [<?php echo $reflexe; ?>],
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)'],
                                                        label: '10 derniers tests',
                                                    }]
                                                }

                                    var options = {
                                                scales: {
                                                  y: {
                                                    beginAtZero: true
                                                  }
                                                }
                                              }

                                    var config = {
                                        type : 'bar',
                                        data : data,
                                        options : options,
                                    }
                                    var graph_test1 = new Chart(ctx,config)
                                </script>
                                <h2>Temperature</h2>
                                <canvas id="graph_test2"></canvas>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
                                <script>
                                    var ctx = document.getElementById('graph_test2').getContext('2d')

                                    var data = {
                                                    labels: [<?php echo $datep; ?>],
                                                    datasets: [{
                                                        data: [<?php echo $perception; ?>],
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)'],
                                                        label: '10 derniers tests',
                                                    }]
                                                }

                                    var options = {
                                                scales: {
                                                  y: {
                                                    beginAtZero: true
                                                  }
                                                }
                                              }

                                    var config = {
                                        type : 'bar',
                                        data : data,
                                        options : options,
                                    }
                                    var graph_test2 = new Chart(ctx,config)
                                </script>
                            </div>
                        </div>
                    </div>
                    <div id="bouton_test"><a href="communication_Passerelle.php">
                        Vérifier réception log</a>
                    </div>
                
                <!--<?php// include("communication_Passerelle.php"); ?>
                
                -->
            </div>
            <?php include("footerc.php"); ?>

        </div>
    </body>
</html>

