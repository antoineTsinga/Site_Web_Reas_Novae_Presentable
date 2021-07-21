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
?>

<?php 
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=A1CE");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);
//echo "Raw Data:<br />";
//echo("$data");

$data_tab = str_split($data,33);
//echo "Tabular Data:?><!--<br />--> " ;<?php
for($i=0, $size=count($data_tab); $i<$size; $i++){
echo "Trame $i: $data_tab[$i] <br />";
}

$trame = $data_tab[count($data_tab)-2];
// décodage avec des substring
$t = substr($trame,0,1);
$o = substr($trame,1,4);
// …
// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");

if ($c==1) {
	$capteur = "Cardiaque";

}
else if ($c==2) {
	$capteur = "Bouton";
}
elseif ($c==3) {
	$capteur = "Température";
}
?>

<!--
<h1> Données reçues de l'objet</h1>
<h2>Resultats du test :</h2>
<?php /* echo $capteur; ?>
<h2>Valeur trouvée :</h2>
<?php echo hexdec($v); ?>
<h2>Test effectué à la date</h2>
<?php echo $day; 
echo "/".$month;
echo "/".$year;
?>
<h2>A l'heure :</h2>
<?php echo $hour;
echo ":".$min;
echo ":".$sec;

*/
?>
-->

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
                            <fieldset>
                           
                            	<legend>Rechercher des membres</legend>
                                
                                
<table>
				
				<tr> 
					
					<td><p align="left" style="color: blue;">Type de capteur</p></td>
					<td><p align="left" style="color: blue;">Score</p></td>
					<td><p align="left" style="color: blue;">Date :</p></td>
					<td><p align="left" style="color: blue;">Heure :</p></td>
				</tr>
				<tr>
					<td> </td>
				</tr>
				<tr>		
					<td><p><?php echo $capteur; ?></p></td>			
					<td><p><?php echo hexdec($v); ?></p></td>
					<td><p><?php echo $day; 
echo "/".$month;
echo "/".$year; ?></p></td>
					
					<td><p><?php  echo $hour; echo ":".$min;
echo ":".$sec; ?></p></td>
					
				</tr>
				<tr>
					<td> </td>
				</tr>


	</table>
                                 
                            
                            </fieldset>
                            <div id="bouton_test"><a href="communication_Passerelle.php">
                        Vérifier réception log</a>
                    </div>
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

